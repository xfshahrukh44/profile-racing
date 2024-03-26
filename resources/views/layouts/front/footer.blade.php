<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="endl1" data-aos="fade-up"
                    data-aos-duration="3000">
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
                    <div class="endl-2" data-aos="fade-down"
                    data-aos-duration="3000">
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
                    <div class="endl-2" data-aos="fade-up"
                    data-aos-duration="3000">
                        <p>Information</p>
                        <ul>
                            <li>
                                <a href="{{ route('blog') }}"> BLOG </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}"> CONTACT US </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-12">
                    <div class="endl-3" data-aos="fade-down"
                    data-aos-duration="3000">
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
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="locate-text">
                                <a style="text-decoration:none; color:#fff;" href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}"> {!! App\Http\Traits\HelperTrait::returnFlag(59) !!} </a>
                            </div>
                        </div>
                        <div class="location">
                            <div class="locate-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="locate-text">
                                <a style="text-decoration:none; color:#fff;" href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}"> {!! App\Http\Traits\HelperTrait::returnFlag(218) !!} </a>
                            </div>
                        </div>

                        <div class="last-icon">
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(1960) !!}"> <i class="fa-brands fa-twitter">  </i> </a>
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(682) !!}"><i class="fa-brands fa-square-facebook"></i> </a>
                            <a target="_blank" style="text-decoration:none;" href="{!! App\Http\Traits\HelperTrait::returnFlag(1963) !!}"><i class="fa-brands fa-youtube"></i> </a>
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
