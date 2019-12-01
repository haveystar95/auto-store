Vue.component("v-auto", {
    template: "#v-auto",
    data: function () {
        return {
            isShow: false,
            menuItem: null,
            marks: {},
            models: {},
            configurations: {}
        }
    },
    methods: {
        getCarMarks: function () {

            axios.get('api/get-car-marks')
                .then(response => (this.marks = response.data));

        },
        getModels: function (id) {
            this.models = {};
            this.configurations = null;
            axios.get('api/get-car-models?id=' + id)
                .then(response => (this.models = response.data));
        },
        getConfigurations: function (id) {
            axios.get('api/get-car-configurations?id=' + id)
                .then(response => (this.configurations = response.data));
        },
        getMenu: function (id) {
            bus.$emit('mega', id);

        }
    },
    mounted() {
        this.getCarMarks();
    }
});


Vue.component("v-menu", {

    template: "#v-menu",
    data: function () {
        return {
            isOpen: false,
            items: {children:null, name:'Menu'},
            isSetI: false
        }


    },
    props: {
        items: Object,
    },
    computed: {
        isFolder: function () {
            return this.items.children &&
                this.items.children.length
        },
        isSetMenu: function () {
            return this.isSetI;
        }
    },
    methods: {
        showMenu(id) {
            console.log(id)

            axios.get('api/get-menu?id=' + id)
                .then(response => (this.items.children = response.data.objects));
            this.isSetI = true;
        },
        toggle: function () {
            if (this.isFolder) {
                this.isOpen = !this.isOpen
            }
        },
    },
    mounted() {
        bus.$on('mega', this.showMenu);
    }
});
const bus = new Vue();


var app = new Vue({
    el: '#app',

    data: {
        message: 'Hello Vue!',
        confId: null
    }
});
