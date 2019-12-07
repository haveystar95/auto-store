Vue.component("v-auto", {
    template: "#v-auto",
    data: function () {
        return {
            isShow: false,
            menuItem: null,
            marks: null,
            models: null,
            configurations: null
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
            this.isSetMenuList = false;
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


Vue.component("v-products-prew", {

    data: function () {
        return {
            products: {},
            currentPage: 1,
            limit: 25,
            offset: 0,
            totalPages:1,
            range: 3
        }

    },


    computed: {
        rows() {
            return this.products.objects.length
        },
        objects() {
            return this.products.objects;
        },

        pages() {
            let min;
            let max;

            if (this.currentPage <= this.range) {
                min = 1;
            } else {
                min = this.currentPage - this.range;
            }
            if (this.currentPage + this.range >= this.totalPages) {
                max = this.totalPages;
            } else {
                max = this.currentPage + this.range;
            }
            console.log(max)

            let pages = [];
            for (let i = min; i <= max; i++) {
                pages.push(i);
            }
            return pages;

        }

    },
    mounted() {
        bus.$on('getProductList', this.getProducts);
    },

    template: "#v-products-prew",
    methods: {
        getProducts() {
            axios.get('api/get-product-by-category?menu_id=' + app.menuId + '&ch_id=' + app.confId + '&limit=23' + '&offset=0')
                .then(response => {
                    this.products = response.data;
                    this.offset = this.products.meta['offset'];
                    this.currentPage = Math.ceil(this.offset + 1 / this.limit);
                    this.totalPages = Math.ceil(this.products.meta['total_count'] / this.limit);
                });


        }
    },


});


Vue.component('tree-item', {
    template: '#item-template',
    props: {
        item: Object
    },
    data: function () {
        return {
            isOpen: false,
            products: null
        }

    },
    computed: {
        isFolder: function () {
            return this.item.children &&
                this.item.children.length
        }
    },


    methods: {
        toggle: function (menu_id) {

            if (this.isFolder) {
                this.isOpen = !this.isOpen
            }
            if (menu_id > 1) {
                app.menuId = menu_id;

                bus.$emit('getProductList', menu_id);

            }

        },
        makeFolder: function () {
            if (!this.isFolder) {
                this.$emit('make-folder', this.item)
                this.isOpen = true
            }
        }
    }
})


const bus = new Vue();

var app = new Vue({
    el: '#app',

    data: {
        confId: null,
        isSetMenuList: false,
        item: {'name': 'Меню', 'children': null},
        products: null,
        menuId: null,
    },
    mounted() {
        bus.$on('mega', this.showMenu);
    },
    methods: {
        showMenu(id) {
            console.log('show menu ' + id);

            axios.get('api/get-menu?id=' + id)
                .then(response => (this.item.children = response.data.objects));
            this.isSetMenuList = true;
            this.confId = id;
        },
        isHasProducts: function () {
            if (this.products != null) {
                return true;
            } else {
                return false;
            }
        },
        isSetMenu: function () {
            if (this.menuId) {
                return true;
            } else {
                return false;
            }
        },

    }

});

