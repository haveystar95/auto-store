@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded line-selected-auto">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
                    aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <template v-if="car">
                            <p> @{{ car.brand.name }} @{{ car.vehiclemodel.name }} @{{
                                car.enginetype }} @{{ car.ccm }}
                                <button v-if="menuId" class="btn btn-sm btn-dark" @click="showSelectCar">Выбрать другое
                                    авто
                                </button>
                            </p>

                        </template>
                        <template v-else>
                            <p> Авто не выбрано </p>

                        </template>


                    </li>
                </ul>
            </div>
        </nav>


        <div class="d-md-flex" id="selectAuto">
            <div v-if="confId" class="menu bg-light ">
                <ul class="ul-tree">
                    <tree-item
                            class="item"
                            :item="this.item"

                    ></tree-item>
                </ul>

            </div>

            <div v-if="menuId == null"
                 class="select-auto bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <h3 class="display-5 font-weight-normal">Выберите из списка авто</h3>
                <v-auto></v-auto>

            </div>

            <div v-show="menuId != null" class="text-black product-prew">
                <div>
                    <v-products-prew></v-products-prew>
                </div>
            </div>


        </div>


    </div>



@endsection





