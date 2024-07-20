@extends('client.layout.master')
@section('content')
    <!-- Body main wrapper start -->
    <main>
        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="{{ asset('theme/client/assets/imgs/bg/breadcrumb-bg.jpg') }}">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Cart</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Cart</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- Cart area start  -->
        <div class="cart-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if (session()->has('cart'))
                                        @foreach (session('cart') as $item)
                                            @php
                                                $url = $item['img_thumbnail'];
                                                $price = $item['price_sale'] == 0 ? $item['price_regular'] : $item['price_sale'];
                                                $subtotal = $price * $item['quantity'];
                                                $total += $subtotal;

                                                if (!\Str::contains($url, 'http')) {
                                                    $url = \Illuminate\Support\Facades\Storage::url($url);
                                                }
                                            @endphp
                                            <tr data-id="{{ $item['id'] }}">
                                                <td class="product-thumbnail"><a href="#"><img src="{{ $url }}" alt="img"></a></td>
                                                <td class="product-name"><a href="product-details.html">{{ $item['name'] }}</a></td>
                                                <td class="product-price">
                                                    <span class="amount">{{ $price }}</span>
                                                </td>
                                                <td class="product-quantity text-center">
                                                    <div class="product-quantity mt-10 mb-10">
                                                        <div class="product-quantity-form">
                                                            <button type="button" class="cart-minus"><i class="far fa-minus"></i></button>
                                                            <input class="cart-input" type="number" min="1" value="{{ $item['quantity'] }}" data-price="{{ $price }}">
                                                            <button type="button" class="cart-plus"><i class="far fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ $subtotal }}</span></td>
                                                <td class="product-remove"><a href="#" class="remove-item"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    {{-- <div class="coupon d-flex align-items-center">
                                        <input id="coupon_code" class="input-text" name="coupon_code" placeholder="Coupon code" type="text">
                                        <button class="fill-btn" id="apply-coupon" type="button">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">apply coupon</span>
                                                <span class="fill-btn-hover">apply coupon</span>
                                            </span>
                                        </button>
                                    </div> --}}
                                    <div class="coupon2">
                                        <button class="fill-btn" id="update-cart" type="button">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Update cart</span>
                                                <span class="fill-btn-hover">Update cart</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span id="subtotal-amount">${{ $total }}</span></li>
                                        <li>Total <span id="total-amount">${{ $total }}</span></li>
                                    </ul>
                                    <a class="fill-btn" href="checkout.html">
                                        <span class="fill-btn-inner">
                                            <span class="fill-btn-normal">Proceed to checkout</span>
                                            <span class="fill-btn-hover">Proceed to checkout</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart area end  -->

    </main>
    <!-- Body main wrapper end -->
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusButtons = document.querySelectorAll('.cart-minus');
        const plusButtons = document.querySelectorAll('.cart-plus');
        const inputs = document.querySelectorAll('.cart-input');
        const subtotalAmountElement = document.getElementById('subtotal-amount');
        const totalAmountElement = document.getElementById('total-amount');

        function updateTotals() {
            let total = 0;
            inputs.forEach(input => {
                const price = parseFloat(input.getAttribute('data-price'));
                const quantity = parseInt(input.value, 10);
                const subtotalElement = input.closest('tr').querySelector('.product-subtotal .amount');
                const subtotal = price * quantity;
                subtotalElement.textContent = subtotal.toFixed(2);
                total += subtotal;
            });
            subtotalAmountElement.textContent = total.toFixed(2);
            totalAmountElement.textContent = total.toFixed(2);
        }

        minusButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.nextElementSibling;
                let value = parseInt(input.value, 10);
                if (value > parseInt(input.min, 10)) {
                    value--;
                    input.value = value;
                    updateTotals();
                }
            });
        });

        plusButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                let value = parseInt(input.value, 10);
                value++;
                input.value = value;
                updateTotals();
            });
        });

        inputs.forEach(input => {
            input.addEventListener('change', function() {
                updateTotals();
            });
        });

        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const row = this.closest('tr');
                row.remove();
                updateTotals();
            });
        });

        document.getElementById('update-cart').addEventListener('click', function() {
            // Gửi yêu cầu cập nhật giỏ hàng lên server
            // Ví dụ: sử dụng AJAX để gửi dữ liệu giỏ hàng cập nhật
            alert('Cart updated');
        });

        
    });
</script>
@endsection