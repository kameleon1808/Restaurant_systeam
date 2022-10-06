@extends('layouts.user')

@section('user-home')
    <!-- BUTTON =============================-->
    <div class="item content">
        <div class="container text-center">
            <a href="{{ url('user/shop') }}" class="homebrowseitems">Browse All Products
                <div class="homebrowseitemsicon">
                    <i class="fa fa-star fa-spin"></i>
                </div>
            </a>
        </div>
    </div>
    <!-- LATEST ITEMS =============================-->
    <section class="item content">
        <div class="container">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">RANDOM ITEMS</h1>
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
                    <!-- /.productbox -->
                    <div class="col-md-4">
                        <div class="productbox">
                            <div class="fadeshop">
                                <span class="maxproduct">
                                    {{-- <img src="{{ asset('images/product2-3.jpg') }}" alt=""> --}}
                                    <img src="{{ asset($a->img) }}" alt="">

                                </span>
                            </div>
                            <div class="product-details">
                                <a href="shop/{{ $a->slug }}">
                                    <h1>{{ $a->name }}</h1>
                                </a>
                                <span class="price">
                                    <span class="edd_price">{{ $a->price }} RSD</span><br>
                                    <a href="shop/{{ $a->slug }}" type="button" class="btn btn-info">Info</a>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
        </div>
    </section>
@endsection
