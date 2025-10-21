<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">CART</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form method="post" action="{{ route('update_cart') }}" id="update-cart">
        @csrf
        <div class="offcanvas-body">
            <div class="sdie-modal">
                <?php
$subtotal2 = 0;
$total_variation2 = 0;
                ?>
                <div class="main-modal">
                    @foreach (session()->get('cart') as $key => $value)
                                        <?php
                        // Incremented price ke saath product fetch karen
                        $prod_image = App\Product::find($value['id']);
                        $basePrice = $value['baseprice']; // price_with_increment session se
                        $qty = $value['qty'];
                        $variation_total = 0;
                                                                                                                            ?>
                                        <div class="product-img">
                                            <figure>
                                                <img src="{{ asset($prod_image->image) }}" class="img-fluid" alt="">
                                            </figure>
                                            <div class="product-discription">
                                                <h4>
                                                    {{ $value['name'] }}
                                                    @if (isset($value['id']))
                                                        <a href='{{ route('remove_cart', $value['id']) }}'>
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </a>
                                                    @endif
                                                </h4>
                                                <div class="counter">
                                                    <div class="quantity">
                                                        <a href="#" class="minus-1"><span>-</span></a>
                                                        <input name="row[]" type="number" class="quantity__input input-1"
                                                            value="{{ $qty }}">
                                                        <a href="#" class="plus-1"><span>+</span></a>
                                                    </div>

                                                    {{-- Variations --}}
                                                    @if (isset($value['variation']))
                                                        @foreach ($value['variation'] as $var_key => $var_val)
                                                            <?php            $variation_total += $var_val['attribute_price']; ?>
                                                        @endforeach
                                                    @endif

                                                    {{-- Total price for this item --}}
                                                    <span>${{ number_format(($basePrice) * $qty, 2) }}</span>
                                                </div>
                                                <span class="d-block" style="font-weight: 700; font-size: 16px;">Varaition price
                                                    ${{ number_format(($variation_total)) }}</span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="product_id" value="{{ $value['id'] }}">

                                        <?php
                        $subtotal2 += $basePrice * $qty;
                        $total_variation2 += $value['variation_price'] ?? 0;
                                                                                                                            ?>
                    @endforeach
                </div>

                <div class="subtotal">
                    <h5>Total <span>${{ number_format($subtotal2) }}</span></h5>
                    <p>Shipping, taxes, and discounts calculated at checkout.</p>
                    <button type="submit" class="btn btn-bustom"
                        style="color: red; background: white; border: 4px solid white;">Update</button>
                    <a href="{{ route('checkout') }}" class="btn btn-bustom"
                        style="color: red; background: white; border: 4px solid white;">Check out</a>
                </div>
            </div>
        </div>
    </form>

</div>

<div class="offcanvas offcanvas-start side-compliance" tabindex="-1" id="ada_compliance"
    aria-labelledby="ada_complianceLabel" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <img src="{{ asset('images/ada-compliance-side.png') }}" alt="">
    </div>
</div>


<div class="modaL_order2">
    <div class="modal fade upsell-popup" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdrop1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body"
                    style="background: #000 url(img/popup.html);background-size: cover;background-position: -100px 0;position: relative;">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-6">

                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="poppup-css">
                                <h5 class="popup-coupon-hd">Avail Profile Racing <span>50% Discount Now!</span></h5>
                            </div>
                            <form class="form_submission" id="contactform" method="post">

                                @csrf

                                <div class="row">


                                    <div class="col-lg-12">
                                        <div class="lable-txt">

                                            <input type="hidden" value="contact_form" name="form_name">

                                            <input placeholder="Name" type="text" name="fname" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="lable-txt">

                                            <input placeholder="Email *" type="text" name="email" required>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">

                                        <textarea name="notes" placeholder="Comment" id="" cols="30" rows="10"
                                            required></textarea>

                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn">
                                            Send </button>
                                        <br>

                                        <div id="contactformsresult"> </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="endl1">
                    <div class="endl-img">
                        <figure>
                            <img src="{{ asset($logo->img_path) }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                    <p>Promotions, new products and sales. Directly to your inbox.</p>
                    <div class="input-endl">

                        <form method="post" id="newForm">

                            @csrf

                            <input type="email" name="newemail" id="newemail" class="form-control"
                                placeholder="Enter Your Email" required>
                            <button type="submit"
                                style="background: #cb1e20;color:#fff;height: 50px;width: 50px; margin-top: 2px;"> >
                            </button>

                        </form>

                    </div>
                    <div id="newsresult"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="endl-2">
                    <p>Quick Links</p>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">HOME</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">ABOUT</a>
                        </li>
                        <li>
                            <a href="{{ route('product') }}">PRODUCT</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="endl-2">
                    <p>Information</p>
                    <ul>
                        <li>
                            <a href="{{ route('blog') }}"> BLOG </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"> CONTACT US </a>
                        </li>
                        <li>
                            <a href="{{ route('front.privacy') }}"> PRIVACY POLICY </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="endl-3">
                    <p class="for-size">Our Address</p>
                    <div class="location">
                        <div class="locate-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="locate-text">
                            <a style="text-decoration:none; color:#fff;" href="">
                                {!! App\Http\Traits\HelperTrait::returnFlag(519) !!} </a>
                        </div>
                    </div>
                    <div class="location">
                        <div class="locate-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="locate-text">
                            <a style="text-decoration:none; color:#fff;"
                                href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}">
                                {!! App\Http\Traits\HelperTrait::returnFlag(218) !!} </a>
                        </div>
                    </div>
                    <div class="location">
                        <div class="locate-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="locate-text">
                            <a style="text-decoration:none; color:#fff;"
                                href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}">
                                {!! App\Http\Traits\HelperTrait::returnFlag(59) !!} </a>
                        </div>
                    </div>
                    <div class="location">
                        <div class="locate-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="locate-text">
                            <a style="text-decoration:none; color:#fff;" href="javasscript:void()">
                                {!! App\Http\Traits\HelperTrait::returnFlag(1974) !!} </a>
                        </div>
                    </div>

                    <div class="last-icon">
                        <a target="_blank" style="text-decoration:none;"
                            href="{!! App\Http\Traits\HelperTrait::returnFlag(1960) !!}"> <i
                                class="fa-brands fa-twitter"> </i> </a>
                        <a target="_blank" style="text-decoration:none;"
                            href="{!! App\Http\Traits\HelperTrait::returnFlag(682) !!}"><i
                                class="fa-brands fa-square-facebook"></i> </a>
                        <a target="_blank" style="text-decoration:none;"
                            href="{!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}"><i
                                class="fa-brands fa-youtube"></i> </a>
                        <a target="_blank" style="text-decoration:none;"
                            href="{!! App\Http\Traits\HelperTrait::returnFlag(1962) !!}"><i
                                class="fa-solid fab fa-instagram"></i> </a>
                        <a target="_blank" style="text-decoration:none;" href="javascript:;">
                            <i class="fa-brands fa-tiktok"></i> </a>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                <div class="last-main">
                    <div class="last-text">
                        <p> {!! App\Http\Traits\HelperTrait::returnFlag(499) !!} </p>
                    </div>

                    <div class="last-text">
                        <a href="{{ route('about') }}">About Us |</a>
                        <!-- <a href="#"> FAQ’s  </a> -->
                        <a href="{{ route('signin') }}">| Login</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsletterModalLabel">Newsletter Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p id="modal-message"></p>
                <button id="unsubscribeBtn" class="btn btn-danger mt-3">Unsubscribe</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="productSearchModal" tabindex="-1" aria-labelledby="productSearchModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body main-search">
                <input type="text" id="productSearchInput" class="form-control" placeholder="Search for products...">
                <button type="button" class="btn btn-bustom" id="productSearchButton">Search</button>
            </div>
        </div>
    </div>
</div>