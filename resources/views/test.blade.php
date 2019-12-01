<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
<!-- Custom styles for this template -->
<link href="album.css" rel="stylesheet">
</head>
<body>
{{--<header>--}}
{{--    <div class="collapse bg-dark" id="navbarHeader">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-8 col-md-7 py-4">--}}
{{--                    <h4 class="text-white">About</h4>--}}
{{--                    <p class="text-muted">Add some information about the album below, the author, or any other--}}
{{--                        background context. Make it a few sentences long so folks can pick up some informative tidbits.--}}
{{--                        Then, link them off to some social networking sites or contact information.</p>--}}
{{--                </div>--}}
{{--                <div class="col-sm-4 offset-md-1 py-4">--}}
{{--                    <h4 class="text-white">Contact</h4>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li><a href="#" class="text-white">Follow on Twitter</a></li>--}}
{{--                        <li><a href="#" class="text-white">Like on Facebook</a></li>--}}
{{--                        <li><a href="#" class="text-white">Email me</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="navbar navbar-dark bg-dark shadow-sm">--}}
{{--        <div class="container d-flex justify-content-between">--}}
{{--            <a href="#" class="navbar-brand d-flex align-items-center">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"--}}
{{--                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"--}}
{{--                     viewBox="0 0 24 24" focusable="false">--}}
{{--                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>--}}
{{--                    <circle cx="12" cy="13" r="4"/>--}}
{{--                </svg>--}}
{{--                <strong>Album</strong>--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"--}}
{{--                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
<div id="app">
    <v-card></v-card>
    <template id="v-card"> Hello world</template>


</div>
{{--    <main role="main">--}}


{{--        <section class="jumbotron text-center">--}}
{{--            <div class="container">--}}
{{--                <h1>Album example</h1>--}}
{{--                <p class="lead text-muted">Something short and leading about the collection below—its contents, the--}}
{{--                    creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it--}}
{{--                    entirely.</p>--}}
{{--                <p>--}}
{{--                    <a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
{{--                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </section>--}}


{{--        <div class="card-deck mb-3 text-center">--}}
{{--            <div class="list-group">--}}
{{--                <button type="button" class="list-group-item list-group-item-action active">--}}
{{--                    Выбор марки--}}
{{--                </button>--}}
{{--                <button v-for="mark in marks" v-bind:id="mark.id" type="button" v-on:click="getModels(mark.id)"--}}
{{--                        class="list-group-item list-group-item-action">--}}
{{--                    @{{mark.name}}--}}
{{--                </button>--}}

{{--            </div>--}}

{{--            <div class="list-group">--}}
{{--                <button type="button" class="list-group-item list-group-item-action active">--}}
{{--                    Выбор модели--}}
{{--                </button>--}}
{{--                <button v-for="model in models" v-bind:id="model.id" type="button"--}}
{{--                        v-on:click="getConfigurations(model.id)"--}}
{{--                        class="list-group-item list-group-item-action">--}}
{{--                    @{{model.name}}--}}
{{--                </button>--}}

{{--            </div>--}}

{{--            <div class="list-group">--}}
{{--                <button type="button"  class="list-group-item list-group-item-action active">--}}
{{--                    Выбор комлектации--}}
{{--                </button>--}}
{{--                <button v-for="conf in configurations" v-bind:id="conf.id" v-on:click="getMenu(conf.id)" type="button" class="list-group-item list-group-item-action">--}}
{{--                    @{{conf.name}}--}}
{{--                </button>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="menu"></div>--}}


{{--    </main>--}}

{{--    <footer class="text-muted">--}}
{{--        <div class="container">--}}
{{--            <p class="float-right">--}}
{{--                <a href="#">Back to top</a>--}}
{{--            </p>--}}
{{--            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>--}}
{{--            <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a--}}
{{--                        href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p>--}}
{{--        </div>--}}
{{--    </footer>--}}

{{--</div>--}}


</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>


<script src="https://vuejs.org/js/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/menu.js"></script>



<script>

    new Vue({
        el: "#app",
        data: {
            isShow: false,
            menuItem: null,
            marks: {},
            models: {},
            configurations: {}
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
                axios.get('api/get-menu?id=' + id)
                    .then(response => (this.menuList = response.data));
            }
        },
        mounted() {
            this.getCarMarks();
        }
    });
</script>
</body>
</html>