<script type="text/x-template" id="modal-order">


    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">

                        </slot>
                        <button class="btn btn-sm btn-base-bg"  @click="$emit('close')"><span
                                    aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" v-if="bucket['products'].length > 0">
                        <slot name="body">

                            <div v-for="item in bucket.products"
                                 class="card flex-md-row mb-4 shadow-sm h-md-250 row-bucket">
                                <img class="bd-placeholder-img card-img-left flex-auto d-none d-lg-block image-bucket"
                                     :src="item.body.main_image.uri_medium" alt="">

                                <div>
                                    <div class="btn-group bucket-counter">
                                        <button class="btn btn-info btn-counter"
                                                @click="changeCount(item.product_id, item.bucket_key, 'minus')">-
                                        </button>
                                        <div class="bucket-counter-text"><p>@{{item.count}}</p></div>
                                        <button class="btn btn-info btn-counter"
                                                @click="changeCount(item.product_id, item.bucket_key, 'plus')">+
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body  d-flex flex-column align-content-lg-end bucket-info-text">
                                    <p class="card-text mb-auto"> @{{item.body.description}}
                                        @{{item.body.active_number}}</p>
                                    <p class="card-text mb-auto"> Количество: @{{item.count}}</p>
                                    <div class="btn-group btn-group-bucket">
                                        <button type="button" class="btn btn-lg btn-primary price-bucket" disabled>@{{
                                            item.total_price}} грн.
                                        </button>
                                        <button type="button" class="btn btn-danger delete-bucket"
                                                @click="removeProduct(item.product_id, item.bucket_key)"> Удалить
                                        </button>

                                    </div>

                                </div>
                            </div>


                        </slot>
                    </div>

                    <div class="modal-footer footer-bucket">
                        <slot name="footer">
                            <button type="button" class="btn btn-lg btn-primary" disabled> Сумма к оплате: @{{
                                bucket.meta.total_price}} грн.
                            </button>
                            <button class="btn btn-lg btn-primary" @click="$emit('close')">
                                <a :href="/make-order/ + bucket.meta.bucket_key "> Оформить заказ</a>
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</script>