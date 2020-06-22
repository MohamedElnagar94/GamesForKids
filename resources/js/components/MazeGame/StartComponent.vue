<template>
  <div id="app" class="h-screen flex flex-col">
    <!-- <img :src="src" class="vloume" @click="play()" alt /> -->
    <div class="top-bar flex items-center shadow-md px-4 h-12">
      <p class="flex-1 text-center text-lg bold">Level {{ level }}</p>
        <img src="/storage/Images/congrates.gif" class="celebrateimg" v-if="level == 8"/>

      <i class="material-icons hamburger cursor-pointer" @click="menuOpen = true">menu</i>
    </div>
    <div class="flex-1 flex flex-col h-full">
      <Maze v-if="maze" :maze="maze" class="flex-1" ref="maze" @win="win"/>
      <div v-if="intermission" class="intermission absolute pin h-full">
        <div class="flex flex-col justify-center items-center h-full winMessage">
          <p class="text-4xl font-semibold mb-1 bold">{{ getCongratulation() }}</p>
          <p class="text-6xl bold">Next level in {{ intermission }}</p>
        </div>
      </div>
    </div>
    <div class="w-100 text-center">
        <button class="btn btn-primary mt-3 playAgain" @click="forceRerender()" v-if="level == 8">Play Again</button>
    </div>
    <div v-if="menuOpen" class="menu-container absolute pin h-screen w-screen py-16">
      <div class="container mx-auto shadow-md flex flex-col h-full">
        <div class="menu-bar flex items-center px-4 h-12">
          <p class="text-2xl flex-1 text-center">Menu</p>
          <i class="material-icons close cursor-pointer" @click="menuOpen = false">close</i>
        </div>
        <Menu class="flex-1" padding="6"/>
      </div>
      <!--  audio -->
      <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>

      <!--  audio -->
    </div>
  </div>
</template>

<script>
import genMaze from './utils/genMaze.js'
import Maze from './MazeComponent.vue'
import Menu from './MenuComponent.vue'

const congratulations = [
  'Congratulations!',
  'Good job!',
  'Amazing!',
  'Outstanding!',
  'Too fast!',
  'Navigation expert!',
  'Speedy gonzales!!',
  'Keep it up!'
]
const congratsMap = []

export default {
  name:'StartComponent',
  components: {
    Maze, Menu
  },
  watch: {
    level () {
      if (this.offline)
        this.newMaze()
    },
    intermission () {
      if (this.intermission)
        setTimeout(() => this.intermission--, 1000)
    }
  },
  data () {
    return {
      error: null,
      maze: null,
      level: 1,
      intermission: 0,
      ws: null,
      offline: true,
      menuOpen: false,
      src: "/storage/Images/close.png"
    }
  },
  methods: {
    play: function(event) {
      var a = this.$refs.audioElm;
      if (a.paused) {
        a.play();
        this.src = "/storage/Images/open.png";
      } else {
        a.pause();
        this.src = "/storage/Images/close.png";
      }
    },
    
    onKeyDown (e) {
      if (this.$refs.maze && !this.intermission && !this.menuOpen)
        this.$refs.maze.onKeyDown(e)
        if (e.key === "ArrowUp" || e.key === "ArrowDown") {
          e.stopPropagation();
          e.preventDefault();
          console.log(e.key);
          return false;
        }
    },
    win () {
      this.intermission = 2
      if(this.level <= 8)
        this.level++
    },
    newMaze () {
      let s = this.level + 2
      this.maze = genMaze(s, s)
    },
    getCongratulation () {
      if (!congratsMap[this.level])
        congratsMap[this.level] = congratulations[Math.floor(Math.random() * congratulations.length)]
      return congratsMap[this.level]
    },
    onOpen () {
      // idk
    },
    onMessage (msg) {
      if (this.offline) return
      let data = msg.d
      switch (msg.e) {
        case 'NEW_MAZE':
          this.maze = data
        break
      }
    },
    goOnline () {
      let ws = this.ws = new WebSocket(`${location.protocol.replace('http', 'ws')}//${location.hostname}:8880`)
      ws.onopen = this.onOpen
      ws.onmessage = message => {
        try {
          this.onMessage(JSON.parse(message.data))
        } catch (err) {
          this.error = err
        }
      }
      this.offline = false
    },
    goOffline () {
      if (this.ws) {
        this.ws.close()
        this.ws = null
      }
      this.offline = true
    },
    forceRerender: function() {
      if (this.level == 8) {
        // this.newMaze()
        this.error = null
        this.maze= null
        this.level=1
        this.intermission= 0
        this.ws =null
        this.offline =true
        this.menuOpen = false
        if (e.key === "ArrowUp" || e.key === "ArrowDown") {
          e.stopPropagation();
          e.preventDefault();
          console.log(e.key);
          return false;
        }
      }
    }
    
  },
  created () {
    this.newMaze()
  },
  mounted () {
    window.addEventListener('keydown', e => {
      this.onKeyDown(e)
    })
  },
  beforeDestroy () {
    this.goOffline()
  }
}
</script>

<style lang="scss">
body {
  // overflow-y: hidden;
    
}
#app {
  // background: #36393f;
  color: #fff;
  font-family: Catamaran, Lato, Helvetica, Arial, sans-serif;
}
.top-bar {
  background: #444446;
  width: 70%;
  text-align: center;
  margin-left: 14%;
}
.intermission {
  background: #A96F4A;
}
.scroller {
  &::-webkit-scrollbar { width: 14px; height: 14px; }
  &::-webkit-scrollbar-thumb { background: #202225; }
  &::-webkit-scrollbar-track, &::-webkit-scrollbar-corner { background: #2f3136; }
  &::-webkit-scrollbar-thumb, &::-webkit-scrollbar-track {
    border: 3px solid #36393f;
    border-radius: 7px;
  }
  // overflow-y: scroll;
}
.material-icons {
  .menu-bar &, .top-bar & {
    color: #a6a7a8;
  }
  &.close:hover { color: #f04747; }
  &.hamburger:hover { color: #fff; }
  transition: .2s color ease;
  user-select: none;
}
.winMessage{
  position: absolute;
  top: 50%;
  left: 45%;
}
.bold{
  font-size: 24px;
  font-weight: bold;
}
.celebrateimg {
    position: absolute;
    /* text-align: center; */
    /* margin: 10px auto; */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 320px;
    z-index: 999;
}
.playAgain{
  top: 73%;
  left: 45%;
  position: absolute;
  font-weight: bold;
  font-size: 24px;
}
.vloume {
  width: 72px;
  height: 49px;
  position: absolute;
  top: 22%;
  left: 43px;
  cursor: pointer;
}

</style>

