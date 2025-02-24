@extends('layouts.main')

@section('css')
    <style>
        .inner-drop {
            padding-left: 1rem;
            display: none;
            text-transform: uppercase;
        }

        .inner-drop-2 {
            padding-left: 1rem;
            display: none;
        }

        .category ul li a {
            text-transform: uppercase;
        }

        .cart-btn a.btn.btn-custom {
            color: #c0c0c0;
            border: 1px solid #c0c0c0;
            border-radius: 0;
            width: 100% !important;
            padding: 12px 0px;
            margin-top: 16px;
        }

        .inner-product-details select {
            background-color: transparent;
            width: 100% !important;
            color: #c0c0c0;
            border-radius: unset;
            height: 50px !important;
        }

        .inner-product-details button {
            background-color: transparent;
            width: 100% !important;
            color: #c0c0c0;
            border-radius: unset;
            height: 50px !important;
            border: 1px solid #c0c0c0;
        }


        table {

            color: #fff;

        }

        tbody,
        th,
        td {
            border: 1px solid #fff;
            padding: 5px;
        }

        p {
            color: #fff;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
            color: #fff !important;
        }

        h2 {
            display: none;
        }

        h3 strong {
            color: #fff !important;
        }

        .activeee {
            background: #000;
            color: #fff;
            border: 1px solid #fff;

        }


        .activee {

            background: #000;
            color: #fff;
            border: 1px solid #fff;

        }
    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->

    <!-- <section class="heading-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-headings">
                        <h2>PRODUCTS</h2>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <section class="inner-product-sec">
        <div class="container">
            <div class="row">


                <?php
                
                use App\Product;
                
                $get_category = DB::table('categories')->get();
                $route_category = Request::segment(3);
                $route_subcategory = Request::segment(4);
                $route_child_subcategory = Request::segment(5);
                
                ?>

                <div class="col-md-3">

                    <div class="category">
                        <h4>Category</h4>
                        <ul>

                            @foreach ($get_category as $key1 => $val_category)
                                @if ($val_category->id != 2)
                                    {{-- Category ID 2 ko hide karna --}}
                                    <li class="inner-shop">
                                        <a href="{{ URL('product/' . $val_category->id) }}" style="<?php if ($route_category == $val_category->id) {
                                            echo 'color:red';
                                        } ?>">
                                            {{ $val_category->name }}
                                        </a>

                                        <?php $get_subcategory = DB::table('subcategories')->where('category', $val_category->id)->get(); ?>

                                        @foreach ($get_subcategory as $key2 => $val_subcategory)
                                            <div class="inner-drop" style="<?php if ($route_category == $val_subcategory->category) {
                                                echo 'display:block;';
                                            } ?>">
                                                <ul>
                                                    <li class="inner-shop-2">
                                                        <a href="{{ URL('product/' . $val_category->id . '/' . $val_subcategory->id) }}"
                                                            style="<?php if ($route_subcategory == $val_subcategory->id) {
                                                                echo 'color:red';
                                                            } ?>">
                                                            {{ $val_subcategory->subcategory }}
                                                        </a>

                                                        <?php $get_childsubcategory = DB::table('childsubcategories')->where('subcategory', $val_subcategory->id)->get(); ?>

                                                        @foreach ($get_childsubcategory as $key2 => $val_childsubcategory)
                                                            <div class="inner-drop-2" style="<?php if ($route_subcategory == $val_childsubcategory->subcategory) {
                                                                echo 'display:block;';
                                                            } ?>">
                                                                <ul>
                                                                    <li>
                                                                        <a href="{{ URL('product/' . $val_category->id . '/' . $val_subcategory->id . '/' . $val_childsubcategory->id) }}"
                                                                            style="<?php if ($route_child_subcategory == $val_childsubcategory->id) {
                                                                                echo 'color:red';
                                                                            } ?>">
                                                                            {{ $val_childsubcategory->childsubcategory }}
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </li>
                                @endif
                            @endforeach


                        </ul>
                    </div>

                </div>

                <?php
                $get_multiple_images = DB::table('product_imagess')->where('product_id', $get_product_detail->id)->get();
                ?>

                <div class="col-lg-5">
                    <div class="inner-img">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <img src="{{ asset($get_product_detail->image) }}"
                                        style="height: 430px;width: 430px;" />
                                </div>

                                @foreach ($get_multiple_images as $key => $val_images)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($val_images->image) }}" style="height: 430px;width: 430px;" />
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset($get_product_detail->image) }}"
                                        style="height: 100px; width: 100px;" />
                                </div>
                                @foreach ($get_multiple_images as $key => $val_images)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($val_images->image) }}" style="height: 100px; width: 100px;" />
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <br><br>
                    <hr style="border:1px solid #5f5f5f;">

                    <div class="col-lg-12">

                        <div class="inner-producttt">

                            <div class="productmain">
                                <button class="clicktabs activee" onclick="opencity(event , 'porduct1')" id="showonly">
                                    Description </button>
                                <button class="clicktabs" onclick="opencity(event , 'porduct2')"> Additional Information
                                </button>
                            </div>

                            <br>

                            <div class="contentinfo">

                                <div class="cycleinfo" id="porduct1">

                                    {!! $get_product_detail->description !!}

                                </div>


                                <div class="cycleinfo" id="porduct2" style="display:none;">

                                    {!! $get_product_detail->additional_information !!}

                                </div>


                            </div>


                        </div>

                    </div>



                </div>





                <?php
                $custom_ordering_products_map = [
                    116 => [50, 51, 52, 53, 55, 56, 25, 26],
                    126 => [50, 51, 52, 53, 55, 56, 25, 26],
                    146 => [50, 26],
                    148 => [50, 24, 55, 27, 25, 26],
                    151 => [50, 7, 26],
                    153 => [50, 58, 55, 27, 25, 26],
                    155 => [50, 51, 55, 27, 25, 26],
                    157 => [66, 5, 27, 25, 26],
                    165 => [50, 67, 53, 27],
                    167 => [50, 67, 52, 27],
                    5 => [9, 10],
                    201 => [21, 14],
                    236 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    246 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    262 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    313 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    315 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    318 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    321 => [50, 79, 7, 25, 26, 74, 75],
                    322 => [36, 51, 79, 37, 27, 25, 38, 74, 75],
                    326 => [24, 79, 25, 26, 27, 28, 74, 75],
                    333 => [24, 77, 27, 28, 74, 75],
                    340 => [50, 67, 77, 52, 53, 74, 75],
                    373 => [14, 9, 97],
                    388 => [14, 9, 97],
                    388 => [97, 80],
                    260 => [14, 11],
                    270 => [87, 86],
                    418 => [9, 14],
                    428 => [14, 9],
                    265 => [14, 9],
                    293 => [14, 58, 44, 27],
                    295 => [14, 58, 44, 27],
                    295 => [14, 58, 44, 27, 60],
                    143 => [14, 58, 60, 44],
                    143 => [14, 58, 44, 27, 61, 26],
                    133 => [14, 58, 44, 27],
                    135 => [14, 58, 44, 27, 25, 26],
                    131 => [14, 57, 27, 25, 38],
                    460 => [83, 5],
                ];
                
                $custom_ordering_products_array = null;
                if (array_key_exists($get_product_detail->id, $custom_ordering_products_map)) {
                    $custom_ordering_products_array = $custom_ordering_products_map[$get_product_detail->id];
                }
                
                if ($get_product_detail->id == 455) {
                    $productAttributes_id = DB::table('product_attributes')->select('product_id', 'attribute_id')->where('product_id', $get_product_detail->id)->groupBy('attribute_id')->orderBy('attribute_id', 'desc')->get();
                } else {
                    $productAttributes_id = DB::table('product_attributes')
                        ->select('product_id', 'attribute_id')
                        ->where('product_id', $get_product_detail->id)
                        ->groupBy('attribute_id')
                        ->when(!is_null($custom_ordering_products_array), function ($q) use ($custom_ordering_products_array) {
                            return $q->orderByRaw('FIELD(attribute_id, ' . implode(',', $custom_ordering_products_array) . ')');
                        })
                        ->get();
                }
                // dump($productAttributes_id);
                ?>



                <div class="col-lg-4">

                    <form method="POST" action="{{ route('save_cart') }}" id="add-cart">

                        @csrf

                        <input type="hidden" name="product_id" id="product_id" value="{{ $get_product_detail->id }}">

                        <div class="inner-product-details">
                            <!-- <h4>TECHDEV-PROFILERACING</h4> -->
                            <h3 style="font-family: PEPSI_pl;"> {{ $get_product_detail->product_title }} </h3>
                            @if ($get_product_detail->id === 332)
                                <?php
                                $product = Product::find(335);
                                ?>
                                <h3 id="h3_original">${{ $get_product_detail->price }} <?php if ($get_product_detail->maximum_price != '' && $get_product_detail->maximum_price != '0') {
                                    echo ' - $' . $get_product_detail->maximum_price;
                                } ?></h3>
                            @else
                                <h3 id="h3_original">${{ $get_product_detail->price }} <?php if ($get_product_detail->maximum_price != '' && $get_product_detail->maximum_price != '0') {
                                    echo ' - $' . $get_product_detail->maximum_price;
                                } ?></h3>
                            @endif
                            <h3 id="h3_additional" hidden>${{ $get_product_detail->price }} <?php if ($get_product_detail->maximum_price != '' && $get_product_detail->maximum_price != '0') {
                                echo ' - $' . $get_product_detail->maximum_price;
                            } ?></h3>
                            <input type="hidden" name="exist_price" id="exist_price" value=0>


                            @foreach ($productAttributes_id as $key => $val_product_attribute)
                                <h6> {{ App\Attributes::find($val_product_attribute->attribute_id)->name }} </h6>

                                <?php
                                
                                $get_attribute_values = DB::table('product_attributes')->where('attribute_id', $val_product_attribute->attribute_id)->where('product_id', $val_product_attribute->product_id)->get();
                                
                                ?>



                                <input type="hidden" name="select_price"
                                    class="select_price{{ App\Attributes::find($val_product_attribute->attribute_id)->id }}"
                                    value=0>
                                <select
                                    class="form-control select_option{{ App\Attributes::find($val_product_attribute->attribute_id)->id }} get_option"
                                    name="variation[{{ App\Attributes::find($val_product_attribute->attribute_id)->name }}]">

                                    <option value="">Choose an option</option>
                                    @foreach ($get_attribute_values as $key => $val_attr_value)
                                        <option data-price="{{ $val_attr_value->price }}"
                                            value="{{ $val_attr_value->value }}">
                                            {{ App\AttributeValue::find($val_attr_value->value)->value }} </option>
                                    @endforeach

                                </select>

                                @if ($get_product_detail->id === 332)
                                    <div class="bundled_product bundled_product_summary product bundled_item_optional">
                                        <div class="bundled_product_images images" style="opacity: 1;">
                                            <figure class="bundled_product_image woocommerce-product-gallery__image"><a
                                                    href="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677.jpg"
                                                    class="image zoom" title="Elite Freewheel Tool Gallery Photo copy(1)"
                                                    data-rel="photoSwipe"><img width="100" height="100"
                                                        style="margin-top: 15px;"
                                                        src="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-300x300.jpg"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                        alt="" title="Elite Freewheel Tool Gallery Photo copy(1)"
                                                        data-caption=""
                                                        data-large_image="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677.jpg"
                                                        data-large_image_width="487" data-large_image_height="380"
                                                        decoding="async" loading="lazy"
                                                        srcset="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-300x300.jpg 300w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-100x100.jpg 100w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-150x150.jpg 150w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-45x45.jpg 45w"
                                                        sizes="auto, (max-width: 300px) 100vw, 300px"></a></figure>
                                        </div>
                                        <div class="details">
                                            <h4 class="bundled_product_title product_title"><span
                                                    class="bundled_product_title_inner"><span class="item_title">ELITE
                                                        FREEWHEEL TOOL</span><span class="item_qty"></span><span
                                                        class="item_suffix"></span></span> <span
                                                    class="bundled_product_title_link"><a
                                                        class="bundled_product_permalink"
                                                        href="https://www.profileracing.com/product/elite-freewheel-tool/"
                                                        target="_blank" aria-label="View product"></a></span></h4>
                                            <label class="bundled_product_optional_checkbox">

                                                <input class="bundled_product_checkbox" type="checkbox"
                                                    id="add_price_checkbox" name="bundle_selected_optional_1"
                                                    value="{{ $product->price }}">
                                                <span class="price"><span
                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"
                                                                style="color: #fff;">Add For $
                                                                {{ $product->price }}</span></bdi></span></span></label>
                                            <div class="cart" data-title="ELITE FREEWHEEL TOOL"
                                                data-product_title="ELITE FREEWHEEL TOOL" data-visible="yes"
                                                data-optional_suffix="" data-optional="yes" data-type="simple"
                                                data-bundled_item_id="1" data-custom_data="[]" data-product_id="62592"
                                                data-bundle_id="8693">
                                                <div class="bundled_item_wrap">
                                                    <div class="bundled_item_cart_content" style="">
                                                        <div class="bundled_item_cart_details"></div>
                                                        <div class="bundled_item_after_cart_details bundled_item_button">
                                                            <input class="bundled_qty" type="hidden"
                                                                name="bundle_quantity_1" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <script>
                                        document.getElementById('add_price_checkbox').addEventListener('change', function() {
                                            let priceElement = document.getElementById('h3_original');
                                            let basePrice = parseFloat("{{ $get_product_detail->price }}"); // Laravel se price lena
                                            let additionalPrice = parseFloat(this.value);

                                            if (this.checked) {
                                                priceElement.innerText = `$${(basePrice + additionalPrice).toFixed(2)}`;
                                            } else {
                                                priceElement.innerText = `$${basePrice.toFixed(2)}`;
                                            }
                                        });
                                    </script>
                                @endif

                                <h3 class="span_selected_option_price text-white"></h3>
                            @endforeach


                            <h6>Quantity</h6>
                            <div class="quantity">
                                <a href="#" class=" minus-1"><span>-</span></a>
                                <input name="qty" type="text" class="quantity__input input-1" readonly=""
                                    value="1">
                                <a href="#" class=" plus-1"><span>+</span></a>
                            </div>

                            <br>

                            <div class="cart-btn">
                                <button type="submit" class="btn btn-custom" id="addCart"
                                    style="background: red; color: white; font-weight: bold; font-size: 23px;">
                                    Add to cart
                                    <!-- <a href="#" class="btn btn-custom white">Buy it now</a> -->
                            </div>

                        </div>

                    </form>

                </div>








            </div>



        </div>
    </section>
@endsection

@section('js')
    <script>
        let temp_id;
        let temp_price_id;
        var temp_price = 0;
        var select_price = 0;
        var f_select_price;
        var totalPrice = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
    </script>

    <script>
        function updateOptionPrice(selector) {
            var text = selector.attr('class');
            var regex = /\d+/;
            var number = text.match(regex)[0];

            var selectedOption = selector.find('option:selected');
            var optionPrice = selectedOption.data('price');

            // Check if the selected option is the first option (Choose an option)
            if (selectedOption.index() === 0) {
                selector.next('.span_selected_option_price').html('').hide();
                return; // Stop execution if "Choose an option" is selected
            }

            // Check if a valid option is selected
            if (optionPrice !== undefined) {
                var amount = parseFloat(optionPrice).toFixed(2);

                if (amount == '0.00') {
                    selector.next('.span_selected_option_price').html('$0.00').show();
                } else {
                    $('.select_price' + number).val(amount);
                    selector.next('.span_selected_option_price').html('$' + amount).show();
                }

                var totalPrice = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
                $('.select_price' + number).each(function() {
                    totalPrice = (parseFloat(totalPrice) + parseFloat($(this).val())).toFixed(2);
                });

                $('#h3_original').prop('hidden', true);
                $('#h3_additional').prop('hidden', false);
            } else {
                selector.next('.span_selected_option_price').html('$0.00').show();
            }
        }

        @foreach ($productAttributes_id as $key => $val_product_attribute)
            var dropdown = $('.select_option{{ App\Attributes::find($val_product_attribute->attribute_id)->id }}');

            // Initialize on page load
            updateOptionPrice(dropdown);

            // Add event listener for changes
            dropdown.on('change', function() {
                updateOptionPrice($(this));
            });
        @endforeach
    </script>






    <script type="text/javascript">
        var t_price = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
        // var temp_p = 0;
        // $('.get_option').on('change', function () {
        //     temp_p = 0;
        //     $('.span_selected_option_price').each(function() {
        //         if($(this).text() != ''){
        //             var stringWithoutDollarSign = $(this).text().replace("$", "");
        //             temp_p += parseFloat(stringWithoutDollarSign);
        //         }else if($(this).text() == ''){
        //             var stringWithoutDollarSign = 0;
        //             temp_p += parseFloat(stringWithoutDollarSign);
        //         }
        //     });
        //     t_price = parseFloat('{{ $get_product_detail->price }}') + temp_p; // Update t_price
        //     $('#exist_price').val(t_price);
        //     $('#h3_additional').html('$' + t_price.toFixed(2));
        // });
        function updateTotalPrice() {
            var temp_p = 0;

            // Iterate through each span and calculate the total additional price
            $('.span_selected_option_price').each(function() {
                if ($(this).text() != '') {
                    var stringWithoutDollarSign = $(this).text().replace("$", "");
                    temp_p += parseFloat(stringWithoutDollarSign);
                } else if ($(this).text() == '') {
                    temp_p += 0; // Default to 0 if the text is empty
                }
            });

            // Update total price
            var t_price = parseFloat('{{ $get_product_detail->price }}') + temp_p;
            $('#exist_price').val(t_price);
            $('#h3_additional').html('$' + t_price.toFixed(2));
        }

        updateTotalPrice();

        $('.get_option').on('change', function() {
            updateTotalPrice();
        });

        $(document).ready(function() {
            $(".inner-shop").click(function() {
                $(".inner-drop").show()
            })
        });

        $(document).ready(function() {
            $(".inner-shop-2").click(function() {
                $(".inner-drop-2").show()
            })
        });

        // $('.select_option').on('change', function () {
        //     let option_label = $(this).find('option:selected').text();
        //     if (option_label.includes('+$')) {
        //         let amount = parseFloat(option_label.split('+$')[1]);
        //         let price = parseFloat({{ $get_product_detail->price }});
        //         let additional_price = (amount + price).toFixed(2);
        //         $(this).next('.span_selected_option_price').html('$' + amount.toFixed(2));
        //         $('#h3_original').prop('hidden', true);
        //         $('#h3_additional').prop('hidden', false);
        //         $('#h3_additional').html('$' + additional_price);
        //     } else {
        //         $(this).next('.span_selected_option_price').html('');
        //         $('#h3_original').prop('hidden', false);
        //         $('#h3_additional').prop('hidden', true);
        //     }
        // });



        function opencity(evt, cityName) {

            var a, cycleinfo, clicktabs;

            cycleinfo = document.getElementsByClassName("cycleinfo");

            for (i = 0; i < cycleinfo.length; i++) {
                cycleinfo[i].style.display = "none";
            }
            clicktabs = document.getElementsByClassName("clicktabs");
            for (i = 0; i < clicktabs.length; i++) {
                clicktabs[i].className = clicktabs[i].className.replace("activee", " ")
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " activee"
        }
    </script>
@endsection
