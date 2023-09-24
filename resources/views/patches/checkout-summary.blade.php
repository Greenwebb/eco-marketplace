<div class="post_content entry-content">
    <div class="woocommerce">
        <div class="woocommerce-notices-wrapper"></div>
        <div class="woocommerce-form-coupon-toggle">

            <div class="woocommerce-info">
                Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a> </div>
        </div>

        <form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none" data-inited-validation="1">

            <span class="cart-coupon-inner">
                <input type="text" name="coupon_code" class="input-text fill_inited" placeholder="Coupon Code" id="coupon_code" value="">
                <button type="submit" class="apply_coupon" name="apply_coupon" value="Apply Coupon">Apply Coupon</button>
            </span>

            <p>If you have a coupon code, please apply it below.</p>

            <div class="clear"></div>
        </form>
        <div class="woocommerce-notices-wrapper"></div>
        <div class="woocommerce_status_bar">
            <div class="bar_cart active"><span class="num">1</span>Shopping Cart</div>
            <div class="bar_payment active"><span class="num">2</span>Payment &amp; Delivery Options</div>
            <div class="bar_order"><span class="num">3</span>Order Received</div>
        </div>
    </div>
</div>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="https://agricola.axiomthemes.com/checkout/" enctype="multipart/form-data" novalidate="novalidate" data-inited-validation="1">
    <div id="customer_details" style="width: 100%; padding-bottom: 3%; padding-left:8%; padding-right:8%;">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3>Billing details</h3>
                <div class="woocommerce-billing-fields__field-wrapper">
                    <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10"><label for="billing_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name"></span></p>
                    <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20"><label for="billing_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name"></span></p>
                    <p class="form-row form-row-wide" id="billing_company_field" data-priority="30"><label for="billing_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization"></span></p>
                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40"><label for="billing_country" class="">Country / Region&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">

                            <select name="billing_country" id="billing_country" class="country_to_state country_select select2-hidden-accessible filled fill_inited" autocomplete="country" data-placeholder="Select a country / region…" data-label="Country / Region" tabindex="-1" aria-hidden="true">
                                @include('components.options.countries')
                            </select>

                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-label="Country / Region" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="United States (US)">United States (US)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>

                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="Country / Region" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="United States (US)">United States (US)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                            <noscript>
                                <button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button>
                            </noscript>
                        </span>
                    </p>
                    <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1"></span></p>
                    <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60"><label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2"></span></p>
                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70"><label for="billing_city" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2"></span></p>
                    <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80"><label for="billing_state" class="">State&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
                        
                    <select name="billing_state" id="billing_state" class="state_select select2-hidden-accessible filled fill_inited" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" data-label="State" tabindex="-1" aria-hidden="true">
                                
                    </select>
                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-label="State" role="combobox"><span class="select2-selection__rendered" id="select2-billing_state-container" role="textbox" aria-readonly="true" title="New York">New York</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="State" role="combobox"><span class="select2-selection__rendered" id="select2-billing_state-container" role="textbox" aria-readonly="true" title="New York">New York</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span></p>
                    <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90"><label for="billing_postcode" class="">ZIP Code&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code"></span></p>
                    <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone" class="">Phone&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="tel" class="input-text fill_inited" name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel"></span></p>
                    <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110"><label for="billing_email" class="">Email address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="email" class="input-text fill_inited" name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username"></span></p>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="woocommerce-shipping-fields">
                <h3 id="ship-to-different-address">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                        <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" name="ship_to_different_address" value="1"> <span>Ship to a different address?</span>
                    </label>
                </h3>

                <div class="shipping_address" style="display: none;">
                    <div class="woocommerce-shipping-fields__field-wrapper">
                        <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10"><label for="shipping_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_first_name" id="shipping_first_name" placeholder="" value="" autocomplete="given-name"></span></p>
                        <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20"><label for="shipping_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_last_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name"></span></p>
                        <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30"><label for="shipping_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_company" id="shipping_company" placeholder="" value="" autocomplete="organization"></span></p>
                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40"><label for="shipping_country" class="">Country / Region&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
                        <select name="shipping_country" id="shipping_country" class="country_to_state country_select select2-hidden-accessible filled fill_inited" autocomplete="country" data-placeholder="Select a country / region…" data-label="Country / Region" tabindex="-1" aria-hidden="true">
                            @include('components.options.countries')
                        </select>
                        
                        <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="Country / Region" role="combobox"><span class="select2-selection__rendered" id="select2-shipping_country-container" role="textbox" aria-readonly="true" title="United States (US)">United States (US)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button></noscript></span></p>
                            <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50"><label for="shipping_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name" value="" autocomplete="address-line1"></span></p>
                            <p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60"><label for="shipping_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2"></span></p>
                            <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70"><label for="shipping_city" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_city" id="shipping_city" placeholder="" value="" autocomplete="address-level2"></span></p>
                            <p class="form-row form-row-wide address-field validate-required validate-state" id="shipping_state_field" data-priority="80"><label for="shipping_state" class="">State&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
                            <select name="shipping_state" id="shipping_state" class="state_select select2-hidden-accessible filled fill_inited" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" data-label="State" tabindex="-1" aria-hidden="true">
                                    
                            </select>
                            
                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="State" role="combobox"><span class="select2-selection__rendered" id="select2-shipping_state-container" role="textbox" aria-readonly="true" title="New York">New York</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span></p>
                            <p class="form-row form-row-wide address-field validate-required validate-postcode" id="shipping_postcode_field" data-priority="90"><label for="shipping_postcode" class="">ZIP Code&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text fill_inited" name="shipping_postcode" id="shipping_postcode" placeholder="" value="" autocomplete="postal-code"></span></p>
                    </div>
                </div>
            </div>
            <div class="woocommerce-additional-fields">
                <div class="woocommerce-additional-fields__field-wrapper">
                        <label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label>
                        <br>
                        <textarea name="order_comments" class="input-text fill_inited" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="4" cols="60"></textarea>
                        
                </div>
            </div>
        </div>
        <button type="button" style="float: right" class="button alt next-stage">Next</button>

    </div>

    <div id="order_review" class="woocommerce-checkout-review-order" style="display: flex; width:100%; gap: 10%; padding-bottom: 3%; padding-left:8%; padding-right:8%;">
        <div class="shop_table woocommerce-checkout-review-order-table shop_table_checkout_review" style="position: relative; width:90%">
            <h3 id="order_review_heading">Your order</h3>
            <table class="shop_table_in">
                <tbody>
                    <tr class="cart_item">
                        <td class="product-name">
                            Onion <strong class="product-quantity">×&nbsp;1</strong>
                        </td>
                        <td class="product-total">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">K</span>15.00</bdi>
                            </span>
                        </td>
                    </tr>
                    <tr class="cart_item">
                        <td class="product-name">
                            Bok Choy&nbsp; <strong class="product-quantity">×&nbsp;2</strong>
                        </td>
                        <td class="product-total">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">K</span>80.00</bdi>
                            </span>
                        </td>
                    </tr>
                    <tr class="cart-subtotal">
                        <td>Subtotal</td>
                        <td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">K</span>95.00</bdi></span></td>
                    </tr>
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Shipping</th>
                        <td data-title="Shipping">
                            <ul id="shipping_method" class="woocommerce-shipping-methods">
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method" checked="checked"><label for="shipping_method_0_flat_rate1">Flat rate</label>
                                </li>
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping2" value="free_shipping:2" class="shipping_method"><label for="shipping_method_0_free_shipping2">Free shipping</label>
                                </li>
                                <li>
                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_local_pickup3" value="local_pickup:3" class="shipping_method"><label for="shipping_method_0_local_pickup3">Local pickup</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="order-total">
                        <td>Total</td>
                        <td>
                            <strong>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">K</span>95.00</bdi>
                                </span>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="blockUI" style="display:none"></div> --}}
            {{-- <div class="blockUI blockOverlay" style="z-index: 1000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background: rgb(255, 255, 255); opacity: 0.6; cursor: default; position: absolute;"></div> --}}
            {{-- <div class="blockUI blockMsg blockElement" style="z-index: 1011; display: none; position: absolute; left: 220px; top: 231px;"></div> --}}
        </div>
        
        
        <div id="payment" class="woocommerce-checkout-payment" style="position: relative; zoom: 1;">
            <h3 id="order_review_heading_payment">Payment</h3>
            <ul class="wc_payment_methods payment_methods methods">
                <li class="wc_payment_method payment_method_cod">
                    <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">

                    <label for="payment_method_cod">Cash on delivery </label>
                    <div class="payment_box payment_method_cod">
                        <p>Pay with cash upon delivery.</p>
                    </div>

                </li>
                <li class="wc_payment_method payment_method_elegro">
                    <input id="payment_method_elegro" type="radio" class="input-radio" name="payment_method" value="elegro" data-order_button_text="">

                    <label for="payment_method_elegro">
                        <img src="data:image/png;base64,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">
                        <img src="https://i0.wp.com/zambianobserver.com/wp-content/uploads/2022/08/Airtel.png?fit=3000%2C2000&ssl=1">
                        <img src="data:image/png;base64,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">
                        <img src="https://financialit.net/sites/default/files/mastercard_early_1990s_logo_2.png">
                        <img src="https://play-lh.googleusercontent.com/7Xf3TAnATLxShaqLFDwVSXZCRZTZFxmq8zUFkT0t1Za7IhODS-V7NxOrTu0XS06FuQ0">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png">

                    </label>
                </li>
            </ul>
            <div class="form-row place-order">
                <noscript>
                    Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so. <br /><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                </noscript>
                <div class="woocommerce-terms-and-conditions-wrapper">
                    <div class="woocommerce-privacy-policy-text"></div>
                </div>
                @auth
                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                @else  
                    <a href="http://localhost:8000/login?source=marketplace&destination=marketplace" class="button alt" name="woocommerce_checkout_place_order" >Place order</a>
                @endauth
                <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="d162cd3d41"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">
            </div>
            {{-- <div class="blockUI" style="display:none"></div> --}}
            {{-- <div class="blockUI blockOverlay" style="z-index: 1000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background: rgb(255, 255, 255); opacity: 0.6; cursor: default; position: absolute;"></div> --}}
            {{-- <div class="blockUI blockMsg blockElement" style="z-index: 1011; display: none; position: absolute; left: 220px; top: 191.5px;"></div> --}}
        
            <div style="display: flex; justify-content: center; padding:4%;">
                <button type="button" style="background-color:rgb(217, 216, 206)" class="button alt prev-stage">Prev</button>
            </div>
        </div>

    </div>
</form>