@extends('client.layout.master')
@section('content')
    <!-- Body main wrapper start -->
    <main>

        <!-- Breadcrumb area start  -->
        <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
            <div class="breadcrumb__thumb"
                data-background="{{ asset('theme/client/assets/imgs/bg/breadcrumb-bg-furniture.jpg') }}"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper text-center">
                            <h2 class="breadcrumb__title">Product Details</h2>
                            <div class="breadcrumb__menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="index.html">Home</a></span></li>
                                        <li><span>Product Details</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area start  -->

        <!-- Product details area start -->
        <div class="product__details-area section-space-medium">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="product__details-thumb-wrapper d-sm-flex align-items-start mr-50">
                            {{-- anh gallery --}}
                            <div class="product__details-thumb-tab mr-20">
                                <nav>
                                    <div class="nav nav-tabs flex-nowrap flex-sm-column" id="nav-tab" role="tablist">
                                        {{-- <button class="nav-link active" id="img-1-tab" data-bs-toggle="tab"
                                            data-bs-target="#img-1" type="button" role="tab" aria-controls="img-1"
                                            aria-selected="true">
                                            <img src="{{ asset('theme/client/assets/imgs/product/details/details-04.png') }}"
                                                alt="product-sm-thumb">
                                        </button> --}}
                                        {{-- <button class="nav-link" id="img-2-tab" data-bs-toggle="tab" data-bs-target="#img-2"
                                            type="button" role="tab" aria-controls="img-3" aria-selected="false">
                                            <img src="{{ asset('theme/client/assets/imgs/product/details/details-05.png')}}" alt="product-sm-thumb">
                                        </button>
                                        <button class="nav-link" id="img-3-tab" data-bs-toggle="tab" data-bs-target="#img-3"
                                            type="button" role="tab" aria-controls="img-3" aria-selected="false">
                                            <img src="{{ asset('theme/client/assets/imgs/product/details/details-06.png')}}" alt="product-sm-thumb">
                                        </button> --}}
                                    </div>
                                </nav>
                            </div>

                            <div class="product__details-thumb-tab-content">
                                <div class="tab-content" id="productthumbcontent">
                                    <div class="tab-pane fade show active" id="img-1" role="tabpanel"
                                        aria-labelledby="img-1-tab">
                                        <div class="product__details-thumb-big w-img">
                                            @php
                                                $url = $product->img_thumbnail;

                                                if (!\Str::contains($url, 'http')) {
                                                    $url = \Illuminate\Support\Facades\Storage::url($url);
                                                }
                                            @endphp
                                            <img src="{{ $url }}" alt="">
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="img-2" role="tabpanel" aria-labelledby="img-2-tab">
                                        <div class="product__details-thumb-big w-img">
                                            <img src="{{ asset('theme/client/assets/imgs/product/details/details-05.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="img-3" role="tabpanel" aria-labelledby="img-3-tab">
                                        <div class="product__details-thumb-big w-img">
                                            <img src="{{ asset('theme/client/assets/imgs/product/details/details-06.png')}}" alt="">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="product__details-content pr-80">
                            <div class="product__details-top d-sm-flex align-items-center mb-15">
                                <div class="product__details-tag mr-10">
                                    <a href="#">Construction</a>
                                </div>
                                <div class="product__details-rating mr-10">
                                    <a href="#"><i class="fa-solid fa-star"></i></a>
                                    <a href="#"><i class="fa-solid fa-star"></i></a>
                                    <a href="#"><i class="fa-regular fa-star"></i></a>
                                </div>
                                <div class="product__details-review-count">
                                    <a href="#">10 Reviews</a>
                                </div>
                            </div>
                            <h3 class="product__details-title text-capitalize">{{ $product->name }}</h3>
                            <div class="product__details-price">
                                @php
                                    if ($product->price_sale == 0) {
                                        echo "<span class='new-price'>$product->price_regular</span>";
                                    } else {
                                        echo "<span class='old-price'>$product->price_regular</span>";
                                        echo "<span class='new-price'>$product->price_sale</span>";
                                    }
                                @endphp


                            </div>
                            <p>{{ $product->description }}</p>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-check-label mb-3 mt-3"><b>Color</b></label>
                                        @foreach ($colors as $id => $name)
                                            <div class="form-check">
                                                <input style=" background: {{ $name }};" type="radio"
                                                    class="form-check-input" id="radio_color_{{ $id }}"
                                                    name="product_color_id" value="{{ $id }}">
                                                <label class="form-check-label"
                                                    for="radio_color_{{ $id }}">{{ $name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-3">
                                        <label class="form-check-label mb-3 mt-3"><b>Size</b></label>
                                        @foreach ($sizes as $id => $name)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input"
                                                    id="radio_size_{{ $id }}" name="product_size_id"
                                                    value="{{ $id }}">
                                                <label class="form-check-label"
                                                    for="radio_size_{{ $id }}">{{ $name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- <div class="mb-3 mt-3">
                                    <label for="quantity" class="form-label">Quantity:</label>
                                    <input type="number" class="form-control" min="1" required value="1"
                                        id="quantity" placeholder="Enter quantity" name="quantity">
                                </div> --}}

                                <div class="product__details-action mb-35">
                                    <div class="product__quantity">
                                        <div class="product-quantity-wrapper">

                                            <div class="">
                                                <button class="cart-minus"><i class="fa-light fa-minus"></i></button>
                                                <input class="cart-input" type="text" min="1"
                                                    required value="1" id="quantity" placeholder="Enter quantity"
                                                    name="quantity">
                                                <button class="cart-plus"><i class="fa-light fa-plus"></i></button>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="product__add-cart">
                                        <button type="submit">
                                            <a href="javascript:void(0)" class="fill-btn cart-btn">
                                                <span class="fill-btn-inner">
                                                    <span class="fill-btn-normal">Add To Cart<i
                                                            class="fa-solid fa-basket-shopping"></i></span>
                                                    <span class="fill-btn-hover">Add To Cart<i
                                                            class="fa-solid fa-basket-shopping"></i></span>
                                                </span>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="product__add-wish">
                                        <a href="#" class="product__add-wish-btn"><i
                                                class="fa-solid fa-heart"></i></a>
                                    </div>
                                </div>
                            </form>
                            <div class="product__details-meta mb-20">
                                <div class="sku">
                                    <span>SKU:</span>
                                    <a href="#">{{ $product->sku }}</a>
                                </div>
                                <div class="categories">
                                    <span>Categories:</span> <a href="#"></a>
                                </div>
                                <div class="tag">
                                    <span>Tags:</span> <a href="#"> {{ $product->tag }}</a>
                                </div>
                            </div>
                            <div class="product__details-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-behance"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__details-additional-info section-space-medium-top">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-lg-4">
                            <div class="product__details-more-tab mr-15">
                                <nav>
                                    <div class="nav nav-tabs flex-column " id="productmoretab" role="tablist">
                                        <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-description" type="button" role="tab"
                                            aria-controls="nav-description" aria-selected="true">Description</button>
                                        <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-additional" type="button" role="tab"
                                            aria-controls="nav-additional" aria-selected="false">Additional Information
                                        </button>
                                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-review" type="button" role="tab"
                                            aria-controls="nav-review" aria-selected="false">Reviews (3)</button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8 col-lg-8">
                            <div class="product__details-more-tab-content">
                                <div class="tab-content" id="productmorecontent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab">
                                        <div class="product__details-des">
                                            {!! $product->content !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-additional" role="tabpanel"
                                        aria-labelledby="nav-additional-tab">
                                        <div class="product__details-info">
                                            <ul>
                                                <li>
                                                    <h4>Weight</h4>
                                                    <span>2 lbs</span>
                                                </li>
                                                <li>
                                                    <h4>Dimensions</h4>
                                                    <span>12 × 16 × 19 in</span>
                                                </li>
                                                <li>
                                                    <h4>Product</h4>
                                                    <span>Purchase this product on rag-bone.com</span>
                                                </li>
                                                <li>
                                                    <h4>Color</h4>
                                                    <span>Gray, Black</span>
                                                </li>
                                                <li>
                                                    <h4>Size</h4>
                                                    <span>S, M, L, XL</span>
                                                </li>
                                                <li>
                                                    <h4>Model</h4>
                                                    <span>Model </span>
                                                </li>
                                                <li>
                                                    <h4>Shipping</h4>
                                                    <span>Standard shipping: $5,95</span>
                                                </li>
                                                <li>
                                                    <h4>Care Info</h4>
                                                    <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                                                </li>
                                                <li>
                                                    <h4>Brand</h4>
                                                    <span>Kazen</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                        aria-labelledby="nav-review-tab">
                                        <div class="product__details-review">
                                            <h3 class="comments-title">03 reviews for “Wide Cotton Tunic extreme hammer”
                                            </h3>
                                            <div class="latest-comments mb-50">
                                                <ul>
                                                    <li>
                                                        <div class="comments-box d-flex">
                                                            <div class="comments-avatar mr-10">
                                                                <img src="{{ asset('theme/client/assets/imgs/user/user-01.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div
                                                                    class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                                    <div class="avatar-name">
                                                                        <h5>Siarhei Dzenisenka</h5>
                                                                        <div class="comments-date">
                                                                            <span>March 27, 2018 9:51 am</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-rating">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fal fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p>This is cardigan is a comfortable warm classic piece.
                                                                    Great to layer
                                                                    with a light top and you can dress up or down given the
                                                                    jewel
                                                                    buttons. I’m 5’8” 128lbs a 34A and the Small fit fine.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="comments-box d-flex">
                                                            <div class="comments-avatar mr-10">
                                                                <img src="{{ asset('theme/client/assets/imgs/user/user-02.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div
                                                                    class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                                    <div class="avatar-name">
                                                                        <h5>Siarhei Dzenisenka</h5>
                                                                        <div class="comments-date">
                                                                            <span>March 27, 2018 9:51 am</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-rating">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p>I bought this beautiful pale gray cashmere sweater for my
                                                                    daughter-in-law for her birthday. She loves it and can
                                                                    wear it with
                                                                    almost anything!</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="comments-box d-flex">
                                                            <div class="comments-avatar mr-10">
                                                                <img src="{{ asset('theme/client/assets/imgs/user/user-03.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div
                                                                    class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                                    <div class="avatar-name">
                                                                        <h5>Siarhei Dzenisenka</h5>
                                                                        <div class="comments-date">
                                                                            <span>March 27, 2018 9:51 am</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-rating">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fal fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p>Amazing club. Sure the secruity is very tight but
                                                                    actually made me
                                                                    and my friends feel secure. You just have to go along
                                                                    with the
                                                                    secruity. Bar staff and cloakroom staff really friendly.
                                                                    Coming out
                                                                    at 7am into bright London sunshine in Smithfields is an
                                                                    amazing
                                                                    London experience</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__details-comment section-space-medium-bottom">
                                                <div class="comment-title mb-20">
                                                    <h3>Add a review</h3>
                                                    <p>Your email address will not be published. Required fields are marked
                                                        *</p>
                                                </div>
                                                <div class="comment-rating mb-20">
                                                    <span>Overall ratings</span>
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="comment-input-box">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-xxl-12">
                                                                <div class="comment-input">
                                                                    <textarea placeholder="Your review"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div class="comment-input">
                                                                    <input type="text" placeholder="Your Name*">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div class="comment-input">
                                                                    <input type="email" placeholder="Your Email*">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-12">
                                                                <div class="comment-agree d-flex align-items-center mb-25">
                                                                    <input class="z-check-input" type="checkbox"
                                                                        id="z-agree">
                                                                    <label class="z-check-label" for="z-agree">Save my
                                                                        name, email, and
                                                                        website in this browser for the next time I
                                                                        comment.</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-12">
                                                                <div class="comment-submit">
                                                                    <button type="submit" class="fill-btn">
                                                                        <span class="fill-btn-inner">
                                                                            <span class="fill-btn-normal">submit now</span>
                                                                            <span class="fill-btn-hover">submit now</span>
                                                                        </span>
                                                                    </button>
                                                                </div>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Product details area end -->

    </main>
    <!-- Body main wrapper end -->
@endsection
