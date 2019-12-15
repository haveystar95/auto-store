<script type="text/x-template" id="v-products-prew">

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4" v-for="product in products.objects">
                    <div class="card mb-4 box-shadow p-3">
                        <img v-if="product.main_image != null" class="card-img-top"
                             data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                             :src="product.main_image.uri_medium"
                             data-holder-rendered="true">


                        <img v-else class="card-img-top"
                             data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                             src="https://banner2.kisspng.com/20180420/sww/kisspng-computer-icons-encapsulated-postscript-question-ma-hollow-question-mark-5ad983993c86c8.8392293915242044412479.jpg"
                             data-holder-rendered="true">


                        <div class="card-body card-product-item">
                            <p class="card-text">@{{ product.description }}. @{{ product.extendeddescription_pretext
                                }}</p>
                            <p>
                                <small class="text-muted text-center">@{{ product.price }}</small>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="btn-group card-product-button">
                                    <button type="button" class="btn btn-sm btn-light"><a
                                                :href="/show-product/ + product.erp_id + '/' + oldMenuId"
                                                target="_blank">Просмотреть</a>
                                    </button>
                                    <button id="show-modal"
                                         @click="buyButton(product.erp_id, oldMenuId)"
                                         class="btn btn-sm btn-info">Купить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <nav aria-label="..." v-if="totalPages > 1">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" @click="getProducts(currentPage-1)">Previous</a>
                    </li>

                    <template v-for="page in pages">
                        <li v-if="currentPage == page" class="page-item active" @click="getProducts(page)"><a
                                    class="page-link">@{{ page }}</a></li>
                        <li v-else class="page-item" @click="getProducts(page)"><a class="page-link">@{{ page }}</a>
                        </li>

                    </template>


                    {{--                    <li class="page-item active">--}}
                    {{--                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    <li class="page-item">
                        <a class="page-link" @click="getProducts(currentPage+1)">Next</a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
</script>