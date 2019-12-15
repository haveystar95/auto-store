@extends('layouts.app')



@section('content')

    <div class="container-fluid">


        <div class="main-card-block">
            <div class="card mb-3 block-card-product">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Характеристики</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Совместимость с другими авто</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Доставка и оплата</a>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active product-info-tab" id="home" role="tabpanel"
                         aria-labelledby="home-tab">


                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="{{$product['main_image']['uri_large']}}" class="card-img" alt="...">
                            </div>

                            <div class="col-md-6">
                                <div class="card-body card-body-content">
                                    <h5 class="card-title title-text-product">{{ $product['active_number'] }} </h5>
                                    <h5 class="card-title title-text-product">{{ $product['description'] }} </h5>


                                    <ul>
                                        @foreach ($product['attributes'] as $attribute)
                                            <li><p class="attribute-text"><strong>{{$attribute['name']}}
                                                        :</strong> {{ $attribute['value']}}</p></li>
                                        @endforeach
                                    </ul>

                                    <button class="btn btn-primary button-price"
                                            disabled> {{$product['price']}} </button>
                                    <br>

                                    <div id="show-modal"
                                         @click="buyClick({{$searchParams['productId']}}, {{$searchParams['menuId']}})"
                                         class="btn btn-success button-buy">Купить
                                    </div>
                                    <div class="btn btn-success button-buy"
                                         @click="buyClick({{$searchParams['productId']}}, {{$searchParams['menuId']}}, false)">
                                        В корзину
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>


        </div>

        <div v-if="showAlertAddToBucket" class="alert alert-success margin-t-80" role="alert">
            Товар успешно добавлен в корзину!
        </div>
    </div>







@endsection
