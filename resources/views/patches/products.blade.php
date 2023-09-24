<section class="elementor-section elementor-top-section elementor-element elementor-element-ed90b64 elementor-section-boxed elementor-section-height-default elementor-section-height-default sc_fly_static" data-id="ed90b64" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-row">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4a46daf sc_inner_width_none sc_content_align_inherit sc_layouts_column_icons_position_left sc_fly_static" data-id="4a46daf" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-980b36f sc_fly_static elementor-widget elementor-widget-trx_sc_title" data-id="980b36f" data-element_type="widget" data-widget_type="trx_sc_title.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="sc_title color_style_dark sc_title_default">
                                                                <span class="sc_item_subtitle sc_title_subtitle sc_align_center sc_item_subtitle_above sc_item_title_style_default">Customers’
                                                                    Choice</span>
                                                                <h1 class="sc_item_title sc_title_title sc_align_center sc_item_title_style_default sc_item_title_tag">
                                                                    <span class="sc_item_title_text">Check
                                                                        Our Products</span>
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-bd16a90 sc_height_small sc_fly_static elementor-widget elementor-widget-spacer" data-id="bd16a90" data-element_type="widget" data-widget_type="spacer.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-spacer">
                                                                <div class="elementor-spacer-inner">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-66f6adb sc_fly_static elementor-widget elementor-widget-trx_sc_extended_products" data-id="66f6adb" data-element_type="widget" data-widget_type="trx_sc_extended_products.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="sc_extended_products sc_extended_products_info_2">
                                                                <div class="sc_extended_products_content sc_item_content">
                                                                    <div class="woocommerce columns-4 ">
                                                                        <ul class="products products_style_info_2 columns-4">


                                                                            @foreach ($products as $product)
                                                                            <li class="product type-product post-{{ $product->id }} status-publish first instock product_cat-berries product_cat-fruits product_cat-organic product_tag-crop product_tag-organic product_tag-season product_tag-summer has-post-thumbnail shipping-taxable purchasable product-type-simple product_style_info_2">
                                                                                <div class="post_item post_layout_thumbs">
                                                                                    <div class="post_featured hover_shop">
                                                                                        <a href="#">
                                                                                            {{-- <a href="{{ route('product.show', $product->id) }}"> --}}
                                                                                               
                                                                                                <img width="430" height="430" src="{{asset("storage/" . $product->image)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $product->name }}" decoding="async" fetchpriority="high" />
                                                                                            </a>
                                                                                        <div class="mask">
                                                                                        </div>
                                                                                        <div class="icons">
                                                                                            <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart tinvwl-loop-button-wrapper" data-tinvwl_product_id="18184">
                                                                                                <div class="tinv-wishlist-clear">
                                                                                                </div>
                                                                                                <a role="button" tabindex="0" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-shortcode tinvwl-loop" data-tinv-wl-list="[]" data-tinv-wl-product="18184" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span class="tinvwl_add_to_wishlist-text">
                                                                                                    Add to Wishlist</span>
                                                                                                </a>
                                                                                                <div class="tinv-wishlist-clear">
                                                                                                </div>
                                                                                                <div class="tinvwl-tooltip">
                                                                                                    Add to Wishlist
                                                                                                </div>
                                                                                            </div>
                                                                                            {{-- href="?add-to-cart=18184" --}}
                                                                                            <a rel="nofollow"  aria-hidden="true" data-quantity="1" data-product-name="{{ $product->name }}" data-product-price="{{$product->price}}" data-product_id="{{ $product->id }}" data-product_sku="{{ $product->sku }}" class="shop_cart icon-shopping-cart button add_to_cart_button product_type_simple product_in_stock"><span class="icon-anim"></span></a>
                                                                                            <a href="{{ route('product.show', $product->id) }}" aria-hidden="true" class="shop_link">
                                                                                                <span class="icon-anim"></span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="post_data">
                                                                                        <div class="post_data_inner">
                                                                                            <div class="post_header entry-header">
                                                                                                <div class="post_tags product_tags">
                                                                                                    <a href="product-tag/crop.html" rel="tag">{{ $product->type }}</a>,
                                                                                                    {{-- <a href="product-tag/organic.html" rel="tag">Marketplace</a>,
                                                                                                    <a href="product-tag/season.html" rel="tag">season</a>,
                                                                                                    <a href="product-tag/summer.html" rel="tag">summer</a> --}}
                                                                                                </div>
                                                                                                <h2 class="woocommerce-loop-product__title">
                                                                                                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                                                                                </h2>
                                                                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                                                                    <span style="width:100%">Rated
                                                                                                        <strong class="rating">5.00</strong>
                                                                                                        out of 5
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{ $product->currency_symbol }}</span>{{ $product->price }}</bdi></span></span>
                                                                                            <a href="?add-to-cart=18184" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="18184" data-product_sku="285" aria-label="Add &ldquo;Strawberry&rdquo; to your cart" rel="nofollow">
                                                                                                Buy now
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            @endforeach


                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-f5276c7 sc_height_small sc_fly_static elementor-widget elementor-widget-spacer" data-id="f5276c7" data-element_type="widget" data-widget_type="spacer.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-spacer">
                                                                <div class="elementor-spacer-inner">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>