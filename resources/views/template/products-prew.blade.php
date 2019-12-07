<script type="text/x-template" id="v-products-prew">

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4" v-for="product in products.objects">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                             data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                             :src="product.main_image.uri_medium"
                             data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text">@{{ product.description }}. @{{ product.extendeddescription_pretext }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Просмотреть</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Купить</button>
                                </div>
                                <small class="text-muted">@{{ product.price }}</small>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <nav aria-label="..." v-if="totalPages > 1">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>

                    <li v-for="page in pages" class="page-item" v-if="currentPage == page">@{{ page }}</li>




{{--                    <li class="page-item active">--}}
{{--                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
</script>