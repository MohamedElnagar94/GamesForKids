<template>
    <div class="h-full">
        <svg class="maze" width="100%" height="100%" :viewBox="`0 0 ${maze.length *2 +1} ${maze[0].length * 2 +1}`" shape-rendering="crispEdges">
            <defs>
                <pattern id="imgpattern" x="0" y="0" width="1" height="1"
                        viewBox="0 0 1024 576" preserveAspectRatio="xMidYMid slice">
                    <image width="1024" height="576" xlink:href="/storage/Images/boy.gif"/>
                </pattern>
                <pattern id="imggold" x="0" y="0" width="1" height="1"
                        viewBox="0 0 1024 576" preserveAspectRatio="xMidYMid slice">
                    <image width="1024" height="576" xlink:href="/storage/Images/gold.jpg"/>
                </pattern>
            </defs>
            <rect x="0" y="0" :width="maze.length * 2 + 1" :height="maze[0].length * 2 +1"  fill="#494949" />
            <path fill="#B46B42" v-for="i in walls.length" :key="i" :d="walls[i - 1]"  />
            <rect class="start" x="1" y="0" width="1" height="1" fill="#43b581" />
            
            <rect class="end" :x="maze[0].length * 2" :y="maze.length *2 -1" width="1" height="1" fill="url(#imggold)" />
            <rect class="player" :x="player.x" :y="player.y"  width="1" height="1" fill="url(#imgpattern)"/>

        </svg>
    </div>
</template>

<script>
export default {
    name:'MazeComponent',
    props:{
        maze:{type:Array,required:true}
    },
    watch: {
        maze() {
            this.player.x= 1
            this.player.y= 0
            this.createWalls()

        }
    },
    data(){
        return{
            player:{x:1,y:0},
            walls:[]
        }
    },
    methods: {
        isWall: function(x, y, noBounds){
            if(x < 0 || y < 0 || x > this.maze[0].length * 2 || y > this.maze.length * 2)
                return !noBounds
            if(x % 2 && y % 2)
                return false
            if(x === 1 && y === 0)
                return false
            if(x === this.maze[0].length * 2 && y === this.maze.length * 2 -1)
                return false
            let wallX = !(x % 2)
            let wallY = !(y % 2)
            let corner = wallX && wallY
            if(corner){
                return true
            }else if(wallX){
                if(x)
                    return !this.maze[(y - 1) / 2][x / 2 -1][1]
                else
                    return !this.maze[(y - 1) / 2][0][3]

            }else if(wallY){
                if(y)
                    return !this.maze[y / 2 -1][(x - 1) / 2][2]
                else
                    return !this.maze[0][(x - 1) /2][0]
            }
        },
        onKeyDown: function(e){
            switch(e.code){
                case 'KeyW':
                case 'ArrowUp':
                    if(!this.isWall(this.player.x, this.player.y - 1))
                        this.player.y--
                break
                case 'KeyD':
                case 'ArrowRight':
                    if(!this.isWall(this.player.x + 1, this.player.y))
                        this.player.x++
                break
                case 'KeyS':
                case 'ArrowDown':
                    if(!this.isWall(this.player.x , this.player.y + 1))
                        this.player.y++
                break
                case 'KeyA':
                case 'ArrowLeft':
                    if(!this.isWall(this.player.x -1,this.player.y))
                        this.player.x--
                break
            }
            if(this.player.x === this.maze[0].length * 2 && this.player.y === this.maze.length *2 -1){
                this.win()
            }
        },
        createWalls: function(){
            this.walls = []
            for(let i = 0 ; i < 2; i++){
                let start ={x: i * 2, y : 0}
                let pos = { ...start}
                let wall = `M${start.x},${start.y}`
                while(true){
                    let walls = this.isWall(pos.x - 1, pos.y - 1, true) *8
                        + this.isWall(pos.x, pos.y - 1, true) *4
                        + this.isWall(pos.x - 1, pos.y, true) *2
                        + this.isWall(pos.x, pos.y, true) *1 
                    switch(walls){
                        case 0b0001:
                        case 0b0101:
                        case 0b1101:
                            pos.y++
                        break
                        case 0b0100:
                        case 0b1100:
                        case 0b1110:
                            pos.x++
                        break
                        case 0b1000:
                        case 0b1010:
                        case 0b1011:
                            pos.y--
                        break
                        case 0b0010:
                        case 0b0011:
                        case 0b0111:
                            pos.x--
                        break
                    }
                    wall += `L${pos.x},${pos.y}`
                    if(start.x === pos.x && start.y === pos.y){
                        break
                    }
                }
                let minifiedWall = wall
                    .replace(/([ML])(\d+),(\d+)(?: L\d+,\3)+( L\d+,\3)/g, '$1$2,$3$4')
                    .replace(/([ML])(\d+),(\d+)(?: L\2,\d+)+( L\2,\d+)/g, '$1$2,$3$4')
                this.walls.push(minifiedWall + 'Z')
            }
        },
        win: function(){
            this.$emit('win')
        }
    },
    created(){
        this.createWalls()
    }
}
</script>

<style  scoped>
.maze{
    height: 570px;
    
}
.runboy{
    position: absolute;
}
.player{
    background-image: url('/storage/Images/boy.gif');
}
</style>