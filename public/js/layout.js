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

            axios.get('/api/get-car-marks')
                .then(response => (this.marks = response.data));

        },
        getModels: function (id) {
            this.models = {};
            this.configurations = null;
            axios.get('/api/get-car-models?id=' + id)
                .then(response => (this.models = response.data));
        },
        getConfigurations: function (id) {
            this.isSetMenuList = false;
            axios.get('/api/get-car-configurations?id=' + id)
                .then(response => (this.configurations = response.data));
        },
        getMenu: function (id) {
            bus.$emit('menu', id);
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
            limit: 15,
            offset: 0,
            totalPages: 1,
            range: 3,
            oldMenuId: null
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
        getProducts(numPage = this.currentPage) {
            console.log('product prew');
            this.offset = numPage * this.limit - this.limit;

            if (this.oldMenuId != app.menuId) {
                console.log('old menu');

                this.offset = 0;
            }


            axios.get('/api/get-product-by-category?menu_id=' + app.menuId + '&ch_id=' + app.confId + '&limit=' + this.limit + '&offset=' + this.offset)
                .then(response => {
                    this.products = response.data;
                    this.currentPage = Math.ceil((this.offset + 1) / this.limit);
                    this.totalPages = Math.ceil(this.products.meta['total_count'] / this.limit);
                    this.oldMenuId = app.menuId;
                });


        },
        buyButton: function (productId, menuId) {
            bus.$emit('buy', productId, menuId)
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
            console.log('tugle');
            if (this.isFolder) {
                this.isOpen = !this.isOpen
            }
            if (menu_id > 1) {
                console.log('send bus');

                app.menuId = menu_id;
                bus.$emit('getProductList');
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


Vue.component('modal', {
    template: '#modal-order',
    props: {
        bucket: {}
    },
    mounted() {
        app.getBucketByKey();
    },
    methods: {
        removeProduct: function (productId, bucketKey) {
            axios.get('/api/remove-item-bucket?product_id=' + productId + '&bucketKey=' + bucketKey)
                .then(response => (app.bucket = response.data));
        },
        changeCount: function (productId, bucketKey, action) {
            axios.get('/api/change-count-item-bucket?product_id=' + productId + '&bucketKey=' + bucketKey + '&action=' + action)
                .then(response => (app.bucket = response.data));
        },
    }
});

const bus = new Vue();

var app = new Vue({
    el: '#app',

    data: {
        confId: null,
        isSetMenuList: false,
        item: {'name': 'Меню', 'children': null},
        products: null,
        menuId: null,
        car: null,
        showModal: false,
        bucket: {},
        showAlertAddToBucket: false
    },
    computed: {
        bucketCount: function () {
            var products = this.bucket['products'];
            if (products) {
                return products.length;
            } else {
                return 0;
            }

        }
    },

    mounted() {
        bus.$on('menu', this.showMenu);
        bus.$on('buy', this.buyClick);

        var confId = this.getCookie('confId');
        if (confId) {
            this.showMenu(confId);
        }

        this.refreshBucket();
    },
    methods: {
        showMenu(id) {
            this.menuId = id;
            axios.get('/api/set-car?id=' + id)
                .then(response => (app.car = response.data));

            axios.get('/api/get-menu?id=' + id)
                .then(response => (this.item.children = response.data.objects));
            this.isSetMenuList = true;
            document.cookie = "confId=" + id + "; path=/;";
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
        showSelectCar: function () {
            this.menuId = null;
            this.car = null;
            this.confId = null;
            this.item = {'name': 'Меню', 'children': null};
            bus.$on('mega', this.showMenu);

        },
        getCookie(key) {
            var value =
                decodeURIComponent(
                    document.cookie.replace(
                        new RegExp(
                            "(?:(?:^|.*;)\\s*" +
                            encodeURIComponent(key).replace(/[\-\.\+\*]/g, "\\$&") +
                            "\\s*\\=\\s*([^;]*).*$)|^.*$"
                        ),
                        "$1"
                    )
                ) || null;

            if (
                value &&
                value.substring(0, 1) === "{" &&
                value.substring(value.length - 1, value.length) === "}"
            ) {
                try {
                    value = JSON.parse(value);
                } catch (e) {
                    return value;
                }
            }
            return value;
        },


        buyClick: function (productId, menuId, modal = true) {
            var bucketKey = this.generateBucketKey();
            axios.get('/api/add-product-to-bucket?product_id=' + productId + '&menu_id=' + menuId + '&bucketKey=' + bucketKey)
                .then(response => (this.bucket = response.data));
            this.showModal = modal;
            this.showAlertAddToBucket = true;
            setTimeout(function () {
                this.showAlertAddToBucket = false;
            }.bind(this), 2000)


        },
        generateBucketKey: function () {
            var bucketKey = this.getCookie('bucketKey');
            if (!bucketKey) {
                bucketKey = Math.floor(Math.random() * Math.floor(9999999999));
                document.cookie = "bucketKey=" + bucketKey + "; path=/;";
            }
            return bucketKey;
        },
        getBucketByKey: function () {
            var bucketKey = this.generateBucketKey();
            axios.get('/api/get-bucket-by-key?' + 'bucketKey=' + bucketKey)
                .then(response => (this.bucket = response.data));
        },

        refreshBucket: function () {
            this.getBucketByKey();
            this.intervalid1 = setInterval(function () {
                this.getBucketByKey();
            }.bind(this), 5000);
        }

    }

});

