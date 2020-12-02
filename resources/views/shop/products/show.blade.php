@extends('shop.layouts.master')


@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Smartphone & Tablets</a></li>
            <li><a href="#">Chicken swinesha</a></li>

        </ul>

        <div class="row">

            <!--Left Part Start -->
            <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
                <div class="module category-style">
                    <h3 class="modtitle"><i class="fa fa-tasks"></i>Categories</h3>
                    <div class="modcontent">
                        <div class="box-category">
                            <ul id="cat_accordion" class="list-group">
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Smartphone & Tablets</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: block;">
                                        <li><a href="category.html">Men's Watches</a></li>
                                        <li><a href="category.html">Women's Watches</a></li>
                                        <li><a href="category.html">Kids' Watches</a></li>
                                        <li><a href="category.html">Accessories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a class="cutom-parent" href="category.html">Electronics</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Cycling</a></li>
                                        <li><a href="category.html">Running</a></li>
                                        <li><a href="category.html">Swimming</a></li>
                                        <li><a href="category.html">Football</a></li>
                                        <li><a href="category.html">Golf</a></li>
                                        <li><a href="category.html">Windsurfing</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Shoes</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Watches</a>  <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Men's Watches</a></li>
                                        <li><a href="category.html">Women's Watches</a></li>
                                        <li><a href="category.html">Kids' Watches</a></li>
                                        <li><a href="category.html">Accessories</a></li>
                                    </ul>
                                </li>
                                <li class="hadchild"><a href="category.html" class="cutom-parent">Jewellery</a>    <span class="button-view  fa fa-plus-square-o"></span>
                                    <ul style="display: none;">
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                        <li><a href="category.html">Sub Categories</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="category.html" class="cutom-parent">Health &amp; Beauty</a>  <span class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Kids &amp; Babies</a>    <span class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Sports</a>  <span class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Home &amp; Garden</a><span class="dcjq-icon"></span></li>
                                <li class=""><a href="category.html" class="cutom-parent">Wines &amp; Spirits</a>  <span class="dcjq-icon"></span></li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="module product-simple best-seller">
                    <h3 class="modtitle">
                        <span><i class="fa fa-diamond fa-hidden"></i>Latest products</span>
                    </h3>
                    <div class="modcontent">
                        <div class="so-extraslider" >
                            <!-- Begin extraslider-inner -->
                            <div class=" extraslider-inner">
                                <div class="item ">
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Mandouille short ">
                                                    <img src="/shop/image/catalog/demo/product/80/8.jpg" alt="Mandouille short">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Mandouille short">Mandouille short </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$76.00 </span>&nbsp;

                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Xancetta bresao ">
                                                    <img src="/shop/image/catalog/demo/product/80/7.jpg" alt="Xancetta bresao">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Xancetta bresao">
                                                    Xancetta bresao
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$80.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$89.00 </span>&nbsp;



                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Sausage cowbee ">
                                                    <img src="/shop/image/catalog/demo/product/80/6.jpg" alt="Sausage cowbee">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Sausage cowbee">
                                                    Sausage cowbee
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>

                                            <div class="content_price price">
                                                <span class="price product-price">
                                                                $66.00
                                                            </span>
                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="#" target="_self" title="Chicken swinesha ">
                                                    <img src="/shop/image/catalog/demo/product/80/5.jpg" alt="Chicken swinesha">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="#" target="_self" title="Chicken swinesha">
                                                    Chicken swinesha
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">$45.00 </span>&nbsp;&nbsp;

                                                <span class="price-old">$56.00 </span>&nbsp;



                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
                                </div>

                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>
                <div class="module banner-left hidden-xs ">
                    <div class="banner-sidebar banners">
                        <div>
                            <a title="Banner Image" href="#">
                                <img src="/shop/image/catalog/banners/banner-sidebar.jpg" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">

                <div class="product-view row">
                    <div class="left-content-product">

                        <div class="content-product-left class-honizol col-md-6 col-sm-12 col-xs-12">
                            <div class="large-image">
                                @php
                                    $firstMedia = $product->getFirstMedia('images');
                                @endphp
                                <img itemprop="image" class="product-image-zoom" src="{{ $firstMedia->getUrl('main') }}" data-zoom-image="{{ $firstMedia->getUrl('main') }}" title="Chicken swinesha" alt="Chicken swinesha">
                            </div>
                            <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=I3Lo4ysUf80"><i class="fa fa-youtube-play"></i></a>

                            <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach($product->getMedia('images') as $media)
                                    <a data-index="{{ $loop->index }}" class="img thumbnail " data-image="{{ $media->getUrl('main') }}" title="Chicken swinesha">
                                        <img src="{{ $media->getUrl('small-thumb') }}" title="Chicken swinesha" alt="Chicken swinesha">
                                    </a>
                                @endforeach
                            </div>

                        </div>

                        <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                            <div class="title-product">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <!-- Review ---->
                            <div class="box-review">
                                <div class="rating">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                <a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">2 reviews</a>
                                <span class="order-num">Orders (0)</span>
                            </div>
                            <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                <span class="price-new"><span itemprop="price" id="price-special">$110.00</span></span>
                                <span class="price-old" id="price-old">$242.00</span>
                                <span class="label-product label-sale">
                                -55%
                                </span>

                            </div>

                            <div class="product-box-desc">
                                <div class="inner-box-desc">

                                    <div class="brand"><span>Brand:</span><a href="#"> SamSung</a>		</div>
                                    <div class="model"><span>Product Code:</span> 23UC97</div>
                                    <div class="stock"><span>Availability:</span> <i class="fa fa-check-square-o"></i> In Stock</div>

                                </div>
                            </div>

                            <div class="short_description form-group">
                                <h3>OverView</h3>

                                {{ $product->description }}
                            </div>
                            <div id="product" data-variants="{{ json_encode($variants) }}" class="add-to-cart-form">
                                <h4>Available Options</h4>
                                @foreach($product->optionTypes as $key => $option)
                                <div class="form-group required">
                                    <label class="control-label">{{ $option->presentation }}</label>
                                    <div id="input-option{{ $option->hash_key }}" data-option-type-id="{{ $option->hash_key }}" class="option-variant product-variants-variant">
                                        @foreach($option->values as $value)
                                            <div class="radio  radio-type-button">
                                                <label>
                                                    <input class="product-variants-variant-values-radio"
                                                           type="radio"
                                                           name="variant_option_value_id_{{ $option->hash_key }}"
                                                           id="variant_option_value_id_{{ $option->hash_key }}_{{ $value->hash_key }}"
                                                           value="{{ $value->hash_key }}"
                                                           data-option-type-index="{{ $key }}"
                                                           @if($key == 0 && $loop->index == 0)
                                                               checked="checked"
                                                           @endif
                                                    >
                                                    <span class="option-content-box" data-title="Small +$30.00" data-toggle="tooltip" data-original-title="" title="">
                                                    <span class="option-name">{{ $value->presentation }} </span>
                                                </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                @push('css')
                                    <style>
                                        .product-variants-variant-values-radio {
                                            opacity: 0;
                                            position: fixed;
                                        }
                                        input[type="radio"], input[type="checkbox"] {
                                            box-sizing: border-box;
                                            padding: 0;
                                        }
                                        .color-select-label {
                                            cursor: pointer;
                                        }
                                        input:checked + label svg .color-select-border {
                                            stroke: #4c4c4c !important;
                                        }
                                        .color-select-border--selected {
                                            stroke: #4c4c4c;
                                        }
                                        .color-select-border {
                                            stroke: #e2e2e2;
                                        }
                                        .product-variants-variant-values-radio:disabled + label {
                                            color: #e4e5e6;
                                            cursor: not-allowed;
                                            opacity: 0.5;
                                        }
                                    </style>
                                @endpush
                                <li>
                                    <input type="radio" name="variant_option_value_id_1" id="variant_option_value_id_1_6" value="6" class="product-variants-variant-values-radio" data-option-type-index="0" data-presentation="#228C22" data-variant-id="1540" data-is-color="true" />

                                    <label class="m-1 m-sm-2 m-md-1 color-select-label" tabindex="0" aria-label="#228C22" for="variant_option_value_id_1_6">

                                        <svg class="color-select" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle class="color-select-border " cx="16" cy="16" r="15" stroke-width="2"/>
                                                <g transform="translate(2 2)">
                                                    <circle cx="14" cy="14" fill="#228C22" fill-rule="evenodd" r="12"/>
                                                    <circle cx="14" cy="14" r="13" stroke="#fff" stroke-width="2"/>
                                                </g>
                                            </g>
                                        </svg>

                                    </label>        </li>
                                <li>
                                    <input type="radio" name="variant_option_value_id_1" id="variant_option_value_id_1_2" value="2" class="product-variants-variant-values-radio" data-option-type-index="0" data-presentation="#800080" data-variant-id="1538" data-is-color="true" checked="checked" />

                                    <label class="m-1 m-sm-2 m-md-1 color-select-label" tabindex="0" aria-label="#800080" for="variant_option_value_id_1_2">

                                        <svg class="color-select" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle class="color-select-border " cx="16" cy="16" r="15" stroke-width="2"/>
                                                <g transform="translate(2 2)">
                                                    <circle cx="14" cy="14" fill="#800080" fill-rule="evenodd" r="12"/>
                                                    <circle cx="14" cy="14" r="13" stroke="#fff" stroke-width="2"/>
                                                </g>
                                            </g>
                                        </svg>

                                    </label>        </li>
                                <input type="hidden" name="variant_id" id="variant_id" value="">

                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">

                                            <input class="form-control" type="text" name="quantity"
                                                   value="1">
                                            <input type="hidden" name="product_id" value="50">
                                            <span class="input-group-addon product_quantity_down">−</span>
                                            <span class="input-group-addon product_quantity_up">+</span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                        <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg add-to-cart-button" onclick="cart.add('42', '1');" data-original-title="Add to Cart">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                   onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                   onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end box info product -->

                        </div>

                    </div>
                </div>
                <!-- Product Tabs -->
                <div class="producttab clearfix">
                    <div class="tabsslider horizontal-tabs col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Shipping Methods</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade active in">
                                <p>
                                    The 43-inch Sam Sung Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work.<br>
                                    <br>
                                    The Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a pure digital

                                <h3>
                                    <b>Features:</b></h3>
                                <p>
                                    Unrivaled display performance</p>
                                <ul>
                                    <li>
                                        30-inch (viewable) active-matrix liquid crystal display provides breathtaking image quality and vivid, richly saturated color.</li>

                                </ul>
                                <p>
                                    Simple setup and operation</p>

                                <h3>
                                    Technical specifications</h3>

                                <p>
                                    <b>Resolutions</b></p>
                                <ul>
                                    <li>
                                        2560 x 1600 pixels (optimum resolution)</li>
                                    <li>
                                        2048 x 1280</li>
                                    <li>
                                        1920 x 1200</li>
                                </ul>
                                <p>
                                    <b>Display colors (maximum)</b></p>
                                <ul>
                                    <li>
                                        16.7 million</li>
                                </ul>

                            </div>
                            <div id="tab-review" class="tab-pane fade">
                                <form>
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong>Super Administrator</strong></td>
                                                <td class="text-right">29/07/2015</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>Best this product opencart</p>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right"></div>
                                    </div>
                                    <h2 id="review-title">Write a review</h2>
                                    <div class="contacts-form">
                                        <div class="form-group"> <span class="icon icon-user"></span>
                                            <input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                        </div>
                                        <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                                            <textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                        </div>
                                        <span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>

                                        <div class="form-group">
                                            <b>Rating</b> <span>Bad</span>&nbsp;
                                            <input type="radio" name="rating" value="1"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="2"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="3"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="4"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="5"> &nbsp;<span>Good</span>

                                        </div>
                                        <div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-4" class="tab-pane fade">
                                <a href="#">Monitor</a>,
                                <a href="#">Apple</a>
                            </div>
                            <div id="tab-5" class="tab-pane fade">
                                <h3 class="custom-color">Take a trivial example which of us ever undertakes</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore
                                    magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo
                                    dolores et ea rebum. Stet clita kasd
                                    gubergren, no sea takimata sanctus est
                                    Lorem ipsum dolor sit amet. Lorem ipsum
                                    dolor sit amet, consetetur sadipscing
                                    elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam
                                    erat, sed diam voluptua. </p>
                                <p>At vero eos et accusam et justo duo dolores
                                    et ea rebum. Stet clita kasd gubergren,
                                    no sea takimata sanctus est Lorem ipsum
                                    dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr.</p>
                                <ul class="marker-simple-list two-columns">
                                    <li>Nam liberempore</li>
                                    <li>Cumsoluta nobisest</li>
                                    <li>Eligendptio cumque</li>
                                    <li>Nam liberempore</li>
                                    <li>Cumsoluta nobisest</li>
                                    <li>Eligendptio cumque</li>
                                </ul>
                                <p>Sed diam nonumy eirmod tempor invidunt
                                    ut labore et dolore magna aliquyam erat,
                                    sed diam voluptua. At vero eos et accusam
                                    et justo duo dolores et ea rebum. Stet
                                    clita kasd gubergren, no sea takimata
                                    sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->

                <!-- Related Products -->
                <div class="related titleLine products-list grid module ">
                    <h3 class="modtitle"><i class="fa fa-tags"></i>Related Products  </h3>

                    <div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="20" data-items_column0="4" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/9.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/9.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/10.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/10.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/11.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/11.jpg"  alt="image"></div>
                                        </div>
                                        <div class="product-image-container">
                                            <a  href="product.html" target="_self" title="Cupim should">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/9.jpg"  class="img-responsive" alt="image">
                                            </a>
                                        </div>

                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">
                                        <ul class="colorswatch">
                                            <li class="item-img active" data-src="/shop/image/catalog/demo/product/electronic/600x600/9.jpg"><a href="javascript:void(0);" title="gray"><img src="/shop/image/demo/colors/gray.jpg"  alt="image"></a></li>
                                            <li class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/10.jpg"><a href="javascript:void(0);" title="pink"><img src="/shop/image/demo/colors/pink.jpg"  alt="image"></a></li>
                                            <li class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/11.jpg"><a href="javascript:void(0);" title="black"><img src="/shop/image/demo/colors/black.jpg"  alt="image"></a></li>
                                        </ul>
                                        <div class="caption">
                                            <h4><a href="product.html" title="Cupim should " target="_self">Cupim should </a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(1)</a>
                                                </div>
                                                <div class="order-num">Orders (0)</div>
                                            </div>
                                            <div class="price">
                                                <span class="price-new">$254.00 </span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/21-1.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/21-1.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/21-2.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/21-2.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/21-3.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/21-3.jpg"  alt="image"></div>
                                        </div>
                                        <div class="product-image-container">
                                            <a href="product.html" target="_self" title="Doenpuis consuat ">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/21.jpg" class="img-1 img-responsive" alt="image">

                                            </a>
                                        </div>
                                        <div class="box-label"> <span class="label-product label-sale"> -13% </span><span class="label-product label-new"> New </span></div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4><a href="product.html" title="Doenpuis consuat " target="_self">Doenpuis consuat </a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(3)</a>
                                                </div>
                                                <div class="order-num">Orders (3)</div>
                                            </div>
                                            <div class="price"> <span class="price-new">$66.00</span>
                                                <span class="price-old">$76.00</span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/4.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/4.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/3.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/3.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/2.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/2.jpg"  alt="image"></div>
                                        </div>
                                        <div class="product-image-container">
                                            <a href="product.html" target="_self" title="Drutick lanaeger">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/4.jpg" class="img-1 img-responsive" alt="image">
                                            </a>
                                        </div>

                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4><a href="product.html" title="Ercitation incididunt" target="_self">Ercitation incididunt</a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(0)</a>
                                                </div>
                                                <div class="order-num">Orders (4)</div>
                                            </div>
                                            <div class="price"> <span class="price-new">$180.00</span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/5-1.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/5-1.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/5-2.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/5-2.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/5-3.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/5-3.jpg"  alt="image"></div>
                                        </div>
                                        <div class="product-image-container">
                                            <a href="product.html" target="_self" title="Fatback picanha">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/5.jpg" class="img-1 img-responsive" alt="image">
                                            </a>
                                        </div>
                                        <div class="box-label"> <span class="label-product label-sale"> -13% </span></div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">
                                        <ul class="colorswatch">
                                            <li class="item-img active" data-src="/shop/image/catalog/demo/product/electronic/600x600/5-3.jpg"><a href="javascript:void(0);" title="red"><img src="/shop/image/demo/colors/red.jpg"  alt="image"></a></li>
                                            <li class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/5-1.jpg"><a href="javascript:void(0);" title="blue"><img src="/shop/image/demo/colors/blue.jpg"  alt="image"></a></li>
                                        </ul>
                                        <div class="caption">
                                            <h4><a href="product.html" title="Fatback picanha" target="_self">Fatback picanha</a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(0)</a>
                                                </div>
                                                <div class="order-num">Orders (0)</div>
                                            </div>
                                            <div class="price"> <span class="price-new">$210.00</span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/6-1.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/6-1.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/6-2.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/6-2.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/6-3.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/6-3.jpg"  alt="image"></div>
                                        </div>
                                        <div class="product-image-container">
                                            <a href="product.html" target="_self" title="Jalapeno dolore">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/6.jpg" class="img-1 img-responsive" alt="image">
                                            </a>
                                        </div>
                                        <div class="box-label"><span class="label-product label-new"> New </span></div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4><a href="product.html" title="Jalapeno dolore" target="_self">Jalapeno dolore</a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(0)</a>
                                                </div>
                                                <div class="order-num">Orders (2)</div>
                                            </div>
                                            <div class="price"> <span class="price-new">$60.00</span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-layout">
                                <div class="product-item-container">
                                    <div class="left-block left-b">
                                        <div class="product-card__gallery product-card__left">
                                            <div class="item-img thumb-active" data-src="/shop/image/catalog/demo/product/electronic/600x600/9.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/9.jpg"  alt="image"></div>
                                            <div class="item-img" data-src="/shop/image/catalog/demo/product/electronic/600x600/13.jpg"><img src="/shop/image/catalog/demo/product/electronic/90x90/13.jpg"  alt="image"></div>

                                        </div>
                                        <div class="product-image-container">
                                            <a href="product.html" target="_self" title="Pariatur porking">
                                                <img src="/shop/image/catalog/demo/product/electronic/600x600/12.jpg" class="img-1 img-responsive" alt="image">
                                            </a>
                                        </div>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span></span></a>
                                        <!--end quickview-->
                                    </div>
                                    <div class="right-block right-b">

                                        <div class="caption">
                                            <h4><a href="product.html" title="Pariatur porking" target="_self">Pariatur porking</a></h4>
                                            <div class="rate-history">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o  fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                    <a class="rating-num" href="#" target="_blank">(0)</a>
                                                </div>
                                                <div class="order-num">Orders (0)</div>
                                            </div>
                                            <div class="price"> <span class="price-new">$78.00</span>
                                            </div>
                                            <div class="button-group so-quickview cartinfo--static">
                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">  <i class="fa fa-shopping-basket"></i>
                                                    <span>Add to cart </span>
                                                </button>
                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i><span></span>
                                                </button>
                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-refresh"></i><span></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end Related  Products-->
            </div>

        </div>

    </div>
    <template class="availability-template availability-template-not-available-in-currency">
        <span class="add-to-cart-form-general-availability-value add-to-cart-form-general-availability-value--danger">This product is not available in the selected currency.</span>

    </template>

    <template class="availability-template availability-template-in-stock">
        <span class="add-to-cart-form-general-availability-value">In Stock</span>

    </template>

    <template class="availability-template availability-template-backorderable">
        <span class="add-to-cart-form-general-availability-value add-to-cart-form-general-availability-value--warning">Backordered</span>

    </template>

    <template class="availability-template availability-template-out-of-stock">
        <span class="add-to-cart-form-general-availability-value add-to-cart-form-general-availability-value--danger">Out of Stock</span>

    </template>

@stop
@push('js')
    @php
        $mediaLists = $product->getMedia('images')->map(function ($media) {
            return ['src' => $media->getUrl()];
        })->toArray();
    @endphp
    <script>
        var mediaList = @json($mediaLists)
    </script>
    <script src="/shop/js/product_detail.js">


    </script>
@endpush
