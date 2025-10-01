@component('mail::message')
# Don’t forget your cart!

Hello,

You added some items to your cart but didn’t finish checkout.

@foreach(json_decode($cart->cart_data, true) as $item)
- **{{ $item['name'] }}** (Qty: {{ $item['qty'] }}) - ${{ $item['baseprice'] }}
@endforeach

@component('mail::button', ['url' => url('/cart')])
Complete Your Checkout
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
