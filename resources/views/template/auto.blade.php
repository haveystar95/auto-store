<script id="v-auto" type="x/template">
    <div>

        <div v-if="marks" class="card-deck mb-3 text-center">
            <div class="list-group">
                <button type="button" class="button-car-table">
                    Выбор марки
                </button>
                <div class=" block-auto-table">

                <button v-for="mark in marks" v-bind:id="mark.id" type="button" v-on:click="getModels(mark.id)"
                        class="list-group-item list-group-item-action button-car-table-items">
                    @{{mark.name}}
                </button>
                </div>

            </div>

            <div v-if="models" class="list-group">
                <button type="button" class=" button-car-table">
                    Выбор модели
                </button>
                <div class=" block-auto-table">

                <button v-for="model in models" v-bind:id="model.id" type="button"
                        v-on:click="getConfigurations(model.id)"
                        class="list-group-item list-group-item-action button-car-table-items">
                    @{{model.name}}
                </button>
                </div>

            </div>

            <div v-if="configurations" class="list-group ">
                <button type="button" class=" button-car-table">
                    Выбор комлектации
                </button>
                <div class=" block-auto-table">
                    <button v-for="conf in configurations" v-bind:id="conf.id" v-on:click="getMenu(conf.id)" type="button"
                            class="list-group-item list-group-item-action button-car-table-items">
                        @{{conf.name}}
                    </button>
                </div>


            </div>
        </div>
    </div>

</script>