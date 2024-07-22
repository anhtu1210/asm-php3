@extends('client.layout.master')
@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
@endsection
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
                {!! $tb !!}
                <div class="row">
                    <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-name">Color</th>
                                        <th class="cart-product-name">Size</th>
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
                                        @foreach (session('cart') as $key => $item)
                                            @php
                                                $url = $item['img_thumbnail'];
                                                $price =
                                                    $item['price_sale'] == 0
                                                        ? $item['price_regular']
                                                        : $item['price_sale'];
                                                $subtotal = $price * $item['quantity'];

                                                if (!\Str::contains($url, 'http')) {
                                                    $url = \Illuminate\Support\Facades\Storage::url($url);
                                                }
                                            @endphp
                                            <tr data-id="{{ $key }}">
                                                <td class="product-thumbnail"><a href="#"><img
                                                            src="{{ $url }}" alt="img"></a></td>
                                                <td class="product-name"><a
                                                        href="product-details.html">{{ $item['name'] }}</a></td>
                                                <td class=""><span
                                                        style="width: 50px; height: 50px; background: {{ $item['color']['name'] }}; border: 0.2px solid black "
                                                        class="justify-content-center d-block"></span></td>
                                                <td class="">{{ $item['size']['name'] }}</td>
                                                <td class="product-price">
                                                    <span class="amount">{{ number_format($price) }}</span>
                                                </td>
                                                <td class="product-quantity text-center">
                                                    <div class="product-quantity mt-10 mb-10">
                                                        <div class="product-quantity-form">
                                                            <button type="button" class="cart-minus"><i
                                                                    class="far fa-minus"></i></button>

                                                            <input class="cart-input" type="number" min="1"
                                                                value="{{ $item['quantity'] }}">

                                                            <button type="button" class="cart-plus"><i
                                                                    class="far fa-plus"></i></button>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">{{ number_format($subtotal) }}</span>
                                                </td>
                                                <td class="product-remove">
                                                    <button class="btn btn-danger btn-sm cart_remove"><i
                                                            class="fa fa-trash-o"></i> Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td colspan="7">{{ number_format($totalAmount) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row ">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 ml-auto ">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span id="subtotal-amount">{{ number_format($totalAmount) }}</span></li>
                                        <li>Total <span id="total-amount">{{ number_format($totalAmount) }}</span></li>
                                    </ul>
                                    <a class="fill-btn" href="{{route('cart.checkout')}}">
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
    <script type="text/javascript">
        $(".cart-input").change(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của sự kiện

            var ele = $(this); // Lưu trữ phần tử hiện tại (ô nhập số lượng)

            $.ajax({
                url: '{{ route('cart.update') }}', // URL để gửi yêu cầu cập nhật
                method: "patch", // Phương thức HTTP để gửi yêu cầu (PATCH)
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token để bảo mật
                    id: ele.parents("tr").attr("data-id"), // Lấy ID của sản phẩm từ hàng cha
                    quantity: ele.parents("tr").find(".cart-input")
                        .val() // Lấy giá trị số lượng mới từ ô nhập
                },
                success: function(response) {
                    window.location.reload(); // Tải lại trang để cập nhật giỏ hàng hiển thị
                },
                error: function(response) {
                    alert(
                        'There was an error updating the quantity. Please try again.'
                    ); // Hiển thị thông báo lỗi nếu cập nhật thất bại
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('cart.delete') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
