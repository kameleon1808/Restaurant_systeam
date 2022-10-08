@extends('layouts.user')

@section('shop')
    <!-- CONTENT =============================-->
    <section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">OUR PRODUCTS</h1>
                </div>
                <div class="wow-hr type_short">
                    <span class="wow-hr-h">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </div>
            <div class="row">
                @foreach ($art as $a)
                    <div class="col-md-4">
                        <div class="productbox">
                            <div class="fadeshop">
                                <div class="captionshop text-center" style="display: none;">
                                    <h3>{{ $a->name }}</h3>
                                    <p>
                                        {{ $a->details }}
                                    </p>
                                    <p>
                                        <a href="#" class="learn-more detailslearn"><i
                                                class="fa fa-shopping-cart"></i>
                                            Purchase</a>
                                        <a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i>
                                            Details</a>
                                    </p>
                                </div>
                                <span class="maxproduct">
                                    {{-- <img src="{{ asset('images/product2-2.jpg') }}" alt=""> --}}
                                    <img src="{{ asset($a->img) }}" alt="">
                                </span>
                            </div>
                            <div class="product-details">
                                <a href="shop/{{ $a->slug }}">
                                    <h1>{{ $a->name }}</h1>
                                </a>
                                <span class="price">
                                    <span class="edd_price">{{ $a->price }} RSD</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.productbox -->
                @endforeach


            </div>
        </div>
        </div>
    </section>
@endsection
