<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin">
    <meta name="author" content="Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset(!empty($favicon->img_path) ? $favicon->img_path : '') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ config('app.name') }}</title>
    <!-- ============================================================== -->
    <!-- All CSS LINKS IN BELOW FILE -->
    <!-- ============================================================== -->
    @include('layouts.front.css')
    @yield('css')
    <style>
        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 16px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #dd1017;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: white;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: red !important;
            border-color: red !important;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: red !important;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        span.page-link {
            color: white !important;
        }

        button.activee {
            background: #cb1e20 !important;
            color: #fff !important;
        }

        .ada-compliance-svg {
            position: fixed;
            z-index: 99999;
            bottom: 30px;
            left: 30px;
            background: rgb(111, 189, 63) !important;
            border-radius: 60%;
            cursor: pointer;
        }

        div#ada_compliance {
            z-index: 999999;
        }

        div#ada_compliance .offcanvas-header {
            position: absolute;
            z-index: 0;
            top: 5px;
            right: 27px;
        }

        div#ada_compliance .offcanvas-body {
            padding: 0;
        }

        div#ada_compliance .offcanvas-body img {
            width: 100%;
        }

        div#ada_compliance .offcanvas-header button {
            filter: brightness(0) invert(1);
        }

        .upsell-popup .modal-dialog {
            max-width: 50%;
        }

        .upsell-popup .modal-dialog .modal-content {
            background: #141414;
        }

        #staticBackdrop1 .modal-body {
            background: linear-gradient(98deg, black, #cb1e20) !important;
        }

        #staticBackdrop1 .modal-body:after {
            width: 50%;
            content: "";
            height: 85%;
            background: url({{asset('images/upsell-popup.jpg')}}) 0 0 / cover no-repeat;
            position: absolute;
            top: 50%;
            left: -3.125rem;
            transform: translateY(-50%);
            border-radius: 1.875rem;
            box-shadow: rgba(50, 50, 93, .25) 0 3.125rem 6.25rem -1.25rem, rgba(0, 0, 0, .3) 0 1.875rem 3.75rem -1.875rem;
        }

        .modaL_order2 .modal-body .poppup-css {
            background: hsl(0deg 0% 0% / 80%);
            padding: .9375rem !important;
            text-align: center;
            border-radius: .625rem;
        }

        .modaL_order2 form input {
            width: 100%;
            margin: .3125rem 0;
            padding: .625rem 1.125rem;
            border: none;
            border-radius: .4375rem;
            outline: 0;
            font-size: 1rem;
            background: transparent;
            border: 1px solid white;
            color: white;
        }

        .modaL_order2 form textarea {
            width: 100%;
            border-radius: .4375rem;
            padding: 1.0625rem;
            font-size: 1rem;
            margin: .3125rem 0 0;
            resize: none;
            height: 8.3125rem;
            background: transparent;
            border: 1px solid white;
            color: white;
        }

        .modaL_order2 form textarea::placeholder {
            color: white;
        }

        .modaL_order2 form input::placeholder {
            color: white;
        }

        .modaL_order2 .modal-header {
            padding: 0;
            position: relative;
            border: none;
            z-index: 100000;
        }

        .modaL_order2 .btn-close {
            position: absolute;
            right: 0;
            border: none;
            outline: 0;
            cursor: pointer;
            box-shadow: .125rem .0625rem 1.6875rem #000;
            width: 1.875rem;
            height: 1.875rem;
            border-radius: 50%;
            background: #ab191b;
            color: #ffff;
            top: -0.8125rem;
            opacity: 1;
        }

        #staticBackdrop1 .modal-body:before,
        .modaL_order2 .modal-body h5 span,
        .modaL_order2 form button {
            background: linear-gradient(to right, #000, #bb1b1d);
            color: white;
        }

        .modaL_order2 .modal-body h5 span {
            padding: .625rem;
            border-radius: .5rem;
            display: block;
        }

        .modaL_order2 .modal-body h5 {
            color: #fff;
            font-size: 1.5rem;
            text-transform: capitalize;
            text-align: center;
            margin-bottom: .5625rem;
        }

        .modaL_order2 form button {
            border: none;
            outline: 0;
            width: 100%;
            border-radius: .375rem;
            display: block;
            margin: .3125rem auto 0;
            padding: .5625rem 0;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: .125rem .0625rem 1.6875rem #4a1c12;
            color: #fff;
            text-transform: uppercase;
        }

        @media(max-width:1440px) {
            div#ada_compliance .offcanvas-header {
                right: 14px;
            }

            .upsell-popup .modal-dialog {
                max-width: 60%;
            }
        }

        @media(max-width:1199px) {
            .upsell-popup .modal-dialog {
                max-width: 80%;
            }

            .last-icon {
                display: flex;
                align-items: center;
            }

            .last-icon a {
                width: 20%;
            }

            .last-icon i {
                height: 35px;
                width: 35px;
            }
        }

        @media(max-width:991px) {
            #staticBackdrop1 .modal-body:after {
                left: 5px;
                width: 50%;
                height: 80%;
                background-position: top;
            }

            .modaL_order2 .modal-body h5 {
                font-size: 1.2rem;
            }

            h5.popup-coupon-hd {}

            .modaL_order2 .modal-body h5 span {
                margin-top: 10px;
            }

            .modaL_order2 .modal-body .poppup-css {
                padding: 0.5rem !important;
            }

            .last-icon {
                flex-wrap: wrap;
                gap: 10px;
            }

            .last-icon a {
                width: 25%;
            }
        }

        @media(max-width:991px) {
            .opt-sec5-text p span {
                display: unset;
            }

            .opt-sec5-main {
                width: 250px;
                height: 205px;
            }

            .opt-sec5-img img {
                width: 100%;
                height: 200px;
            }

            .opt-sec5-text {
                top: 75px;
            }

            .section4 {
                height: 400px;
            }
        }

        @media(max-width:767px) {

            #staticBackdrop1 .modal-body {
                padding-top: 300px;
            }

            #staticBackdrop1 .modal-body:after {
                top: 140px;
                height: 35%;
                width: 95%;
                left: 12px;
            }

            .last-icon {
                flex-wrap: nowrap;
                margin-top: 20px;
            }

            .last-icon i {
                width: 60px;
                height: 60px;
                font-size: 20px;
            }
        }

        @media(max-width:575px) {
            .section3 {
                padding: 50px 0px;
            }

            .opt-sec5-main {
                width: 190px;
                margin: auto;
            }

            .upsell-popup .modal-dialog {
                max-width: 100%;
            }
        }
    </style>
</head>

<body class="responsive">


    <div class="cart-icon-btn">
        <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight" class="offcanvasRight">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>

    <div class="ada-compliance-svg" data-bs-toggle="offcanvas" data-bs-target="#ada_compliance"
        aria-controls="ada_compliance">
        <img src="{{ asset('images/body_bl.svg') }}" class="img-fluid" alt="">
    </div>

    @include('layouts/front.header')


    @yield('content')


    @include('layouts/front.footer')
    <!-- ============================================================== -->
    <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
    <!-- ============================================================== -->
    @include('layouts/front.scripts')
    @yield('js')
    <script>
        $(document).ready(function () {
            @if (session()->has('added-to-cart') && session()->get('added-to-cart') == true)
                <?php    session()->remove('added-to-cart'); ?>
                $('.offcanvasRight').each((i, item) => {
                    item.click();
                    item.trigger('click');
                });
            @endif
        });
    </script>
    <!-- <script>
        $(document).ready(function () {
            setInterval(function () {
                if (!$('#staticBackdrop1').hasClass('show')) {
                    $('#staticBackdrop1').modal('show');
                }
            }, 20000);
        });
    </script> -->
    <script>
        $(document).ready(function () {

            setTimeout(function () {

                var offcanvas1 = document.getElementById('ada_compliance');
                var offcanvas2 = document.getElementById('offcanvasRight');

                var isOpen1 = offcanvas1.classList.contains('show');
                var isOpen2 = offcanvas2.classList.contains('show');

                if (!isOpen1 && !isOpen2) {

                    var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop1'));
                    myModal.show();
                } else {

                    $('#ada_compliance, #offcanvasRight').on('hidden.bs.offcanvas', function () {
                        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop1'));
                        myModal.show();
                    });
                }
            }, 20000);
        });
    </script>



</body>

</html>