/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//javscript alert
import '../../node_modules/sweetalert';

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "pencil-in-box",
    require("./components/Numbers/PencilInBox/PencilInBox.vue").default
);


Vue.component("ballons", require("./components/Numbers/Ballons.vue").default);
Vue.component("cards-2-2", require("./components/Cards2by2.vue").default);
Vue.component("cards-2-3", require("./components/Cards2by3.vue").default);
Vue.component("cards-3-4", require("./components/Cards3by4.vue").default);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "order-component",
    require("./components/OrderNumberComponent.vue").default
);
Vue.component(
    "numbers-component",
    require("./components/Numbers/NumbersComponent.vue").default
);
Vue.component(
    "exam-numbers-component",
    require("./components/Numbers/ExamNumbersComponent.vue").default
);
Vue.component(
    "exam2-component",
    require("./components/Numbers/Exam2Component.vue").default
);
Vue.component(
    "result-component",
    require("./components/Numbers/ResultComponent.vue").default
);
Vue.component(
    "count-numbers-component",
    require("./components/Numbers/CountNumbers/CountNumbersComponent.vue")
        .default
);
Vue.component(
    "merge-sort-component",
    require("./components/Numbers/Sort/MergeSortComponent.vue").default
);
Vue.component(
    "insertion-sort-component",
    require("./components/Numbers/Sort/InsertionSortComponent.vue").default
);
Vue.component(
    "levels-component",
    require("./components/LevelsComponent.vue").default
);
Vue.component(
    "game-memory-component",
    require("./components/GameMemory/GameMemoryComponent.vue").default
);
Vue.component(
    "maze-game-component",
    require("./components/MazeGame/StartComponent.vue").default
);
Vue.component(
    "bubble-sort-component",
    require("./components/Numbers/Sort/BubbleSortComponent.vue").default
);
Vue.component(
    "collection-component",
    require("./components/CollectionComponent.vue").default
);
Vue.component(
    "sort-collection-component",
    require("./components/SortCollectionComponent.vue").default
);
Vue.component(
    "cards-collection-component",
    require("./components/CardsCollectionComponent.vue").default
);
Vue.component('binary-search-component', require('./components/Numbers/BinarySearch/BinarySearchComponent.vue').default);

Vue.component("puzzle2", require("./components/puzzle/Puzzle2.vue").default);
Vue.component("puzzle", require("./components/puzzle/Puzzle.vue").default);
Vue.component("puzzle3", require("./components/puzzle/Puzzle3.vue").default);
Vue.component("puzzle4", require("./components/puzzle/Puzzle4.vue").default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
