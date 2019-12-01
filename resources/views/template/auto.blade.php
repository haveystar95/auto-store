<script id="v-auto" type="x/template">
    <div>

        <div class="card-deck mb-3 text-center">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    Выбор марки
                </button>
                <button v-for="mark in marks" v-bind:id="mark.id" type="button" v-on:click="getModels(mark.id)"
                        class="list-group-item list-group-item-action">
                    @{{mark.name}}
                </button>

            </div>

            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    Выбор модели
                </button>
                <button v-for="model in models" v-bind:id="model.id" type="button"
                        v-on:click="getConfigurations(model.id)"
                        class="list-group-item list-group-item-action">
                    @{{model.name}}
                </button>

            </div>

            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    Выбор комлектации
                </button>
                <button v-for="conf in configurations" v-bind:id="conf.id" v-on:click="getMenu(conf.id)" type="button"
                        class="list-group-item list-group-item-action">
                    @{{conf.name}}
                </button>

            </div>
        </div>
    </div>

</script>