

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">CART</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form method="post" action="{{ route('update_cart') }}" id="update-cart">
        @csrf
        <div class="offcanvas-body">
            <div class="sdie-modal">
                <?php $subtotal2 = 0;
                $addon_total2 =
                $total_variation2 = 0; 0;?>
                <div class="main-modal">
                    @foreach (session()->get('cart') as $key => $value)
                        <?php
                            $prod_image = App\Product::where('id', $value['id'])->first();
                        ?>
                        <div class="product-img">
                            <figure>
                                <img src="{{ asset($prod_image->image) }}" class="img-fluid" alt="">
                            </figure>
                            <div class="product-discription">
                                <h4>
                                    {{ $value['name'] }}
                                    <a onclick="window.location.href='{{ route('remove_cart', [$value['id']]) }}'"><i class="fa-solid fa-xmark"></i></a>
                                </h4>
                                <div class="counter">
                                    <div class="quantity">
                                        <a href="#" class=" minus-1"><span>-</span></a>
                                        <input name="row[]" type="number" class="quantity__input input-1" value="{{ $value['qty'] }}">
                                        <a href="#" class=" plus-1"><span>+</span></a>
                                    </div>
                                    <?php $t_var = 0;?>
                                    @foreach ($value['variation'] as $key => $values)
                                        <?php $t_var += $values['attribute_price']; ?>
                                    @endforeach
                                    <span>${{ number_format(($value['baseprice'] + $t_var) * $value['qty'], 2) }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" id="" value="<?php echo $value['id']; ?>">
                        <?php $subtotal2 += $value['baseprice'] * $value['qty'];
                        $total_variation2 += $value['variation_price']; ?>
                    @endforeach
                </div>

                <div class="subtotal">
                    <h5>Total <span>${{ number_format($subtotal2 + $total_variation2, 2) }}</span></h5>
                    <p>Shipping, taxes, and discounts calculated at checkout.</p>
                    <button type="submit" class="btn btn-bustom" style="color: red; background: white; border: 4px solid white;">Update</button>
                    <a href="{{route('checkout')}}" class="btn btn-bustom" style="color: red; background: white; border: 4px solid white;">Check out</a>
                </div>
            </div>
        </div>
    </form>
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

                                <input type="email" name="newemail" id="newemail" class="form-control" placeholder="Enter Your Email" required>
                                <button type="submit" style="background: #cb1e20;color:#fff;height: 50px;width: 50px; margin-top: 2px;"> > </button>

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
                                <a style="text-decoration:none; color:#fff;" href=""> {!! App\Http\Traits\HelperTrait::returnFlag(519) !!} </a>
                            </div>
                        </div>
                        <div class="location">
                            <div class="locate-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="locate-text">
                                <a style="text-decoration:none; color:#fff;" href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}"> {!! App\Http\Traits\HelperTrait::returnFlag(218) !!} </a>
                            </div>
                        </div>
                        <div class="location">
                            <div class="locate-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="locate-text">
                                <a style="text-decoration:none; color:#fff;" href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}"> {!! App\Http\Traits\HelperTrait::returnFlag(59) !!} </a>
                            </div>
                        </div>
                        <div class="location">
                            <div class="locate-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="locate-text">
                                <a style="text-decoration:none; color:#fff;" href="javasscript:void()"> {!! App\Http\Traits\HelperTrait::returnFlag(1974) !!} </a>
                            </div>
                        </div>

                        <div class="last-icon">
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(1960) !!}"> <i class="fa-brands fa-twitter">  </i> </a>
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(682) !!}"><i class="fa-brands fa-square-facebook"></i> </a>
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}"><i class="fa-brands fa-youtube"></i> </a>
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(1962) !!}"><i class="fa-solid fab fa-instagram"></i> </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="last-main">
                        <div class="last-text">
                            <p> {!! App\Http\Traits\HelperTrait::returnFlag(499) !!} </p>
                        </div>

                        <div class="last-text">
                                <a href="{{ route('about') }}">About Us  |</a>
                                <!-- <a href="#"> FAQ’s  </a> -->
                                <a href="{{ route('signin') }}">|  Login</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <div class="modal fade" id="productSearchModal" tabindex="-1" aria-labelledby="productSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body main-search">
                    <input type="text" id="productSearchInput" class="form-control" placeholder="Search for products...">
                    <button type="button" class="btn btn-bustom" id="productSearchButton">Search</button>
                </div>
            </div>
        </div>
    </div>
{{--<script>--}}
{{--</script>--}}
