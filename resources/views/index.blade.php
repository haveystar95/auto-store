@extends('layouts.app')

<div class="container-fluid">
    <div id="app">


        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Auto Store</h1>
                <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing
                    efforts with this example based on Apple’s marketing pages.</p>
                <a class="btn btn-outline-secondary" href="#selectAuto">Выбрать авто</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>


        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3" id="selectAuto">


            <div class="select-auto bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <h3 class="display-5 font-weight-normal">Выберите из списка авто</h3>
                <v-auto></v-auto>

            </div>


            <div v-if="isSetMenuList" class="menu bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5">
                <ul class="ul-tree">
                    <tree-item
                            class="item"
                            :item="this.item"

                    ></tree-item>
                </ul>

            </div>


        </div>


        <div>
            <v-products-prew></v-products-prew>
        </div>

    </div>

</div>
@include('template.auto')
@include('template.item-template')
@include('template.products-prew')






