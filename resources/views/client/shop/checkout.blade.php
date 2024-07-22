@extends('client.layout.master')
@section('content')
    <main>

        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Checkout</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ route('home') }}">Home</a></span></li>
                                        <li><span>checkout</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- checkout-area start -->
        <section class="checkout-area section-space">
            <div class="container">
                <form action="{{route('order.save')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3 class="mb-15">Billing Details</h3>
                                <div class="row g-5">
                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Name <span class="required">*</span></label>
                                            <input name="user_name" type="text" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input name="user_address" type="text" placeholder="Street address">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input name="user_email" type="email" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input name="user_phone" type="text" placeholder="sdt">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Note</label>
                                            <textarea name="user_note" id="" rows="10" placeholder="note here"></textarea>

                                        </div>
                                    </div>
                                    {{-- create btn --}}
                                    <div class="col-md-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Create a new account
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nhập mk</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="cbox_info" class="">
                                                            <label>Account password <span class="required">*</span></label>
                                                            <input name="password" type="password" placeholder="password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    {{-- end create btn --}}
                                </div>

                            </div>
                        </div>
                        {{-- bill  --}}
                        <div class="col-lg-6">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (session('cart') as $item)
                                                <tr class="cart_item">
                                                    @php
                                                        // dd(session('cart'));
                                                        $price =$item['price_sale'] == 0? $item['price_regular']: $item['price_sale'];
                                                                
                                                        $subtotal = $price * $item['quantity'];
                                                    @endphp
                                                    <td class="product-name">
                                                        {{ $item['name'] }}<strong class="product-quantity"> ×
                                                            {{ $item['quantity'] }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{ number_format($subtotal) }}VND</span>
                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul>
                                                        
                                                        <li>
                                                            <input type="radio">
                                                            <label>Free Shipping:</label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">{{number_format($totalAmount)}}VND</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="checkoutOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#bankOne" aria-expanded="true"
                                                    aria-controls="bankOne">
                                                    Direct Bank Transfer
                                                </button>
                                            </h2>
                                            <div id="bankOne" class="accordion-collapse collapse show"
                                                aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Make your payment directly into our bank account. Please use your
                                                    Order ID
                                                    as the payment reference. Your order won’t be shipped until the
                                                    funds have
                                                    cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="paymentTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#payment"
                                                    aria-expanded="false" aria-controls="payment">
                                                    Cheque Payment
                                                </button>
                                            </h2>
                                            <div id="payment" class="accordion-collapse collapse"
                                                aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Please send your cheque to Store Name, Store Street, Store Town,
                                                    Store
                                                    State / County, Store
                                                    Postcode.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="paypalThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#paypal"
                                                    aria-expanded="false" aria-controls="paypal">
                                                    PayPal
                                                </button>
                                            </h2>
                                            <div id="paypal" class="accordion-collapse collapse"
                                                aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    Pay via PayPal; you can pay with your credit card if you don’t have
                                                    a
                                                    PayPal account.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment mt-20">
                                        <button class="fill-btn" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Place order</span>
                                                <span class="fill-btn-hover">Place order</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end bill --}}
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
