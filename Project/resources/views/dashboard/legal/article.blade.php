@extends('layouts.user')

@section('article-l')
    <!-- CONTENT =============================-->
    <section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">{{ $a->name }}</h1>
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
                <div class="col-md-8">
                    <div class="productbox">
                        {{-- <img src="{{ asset('images/product2-2.jpg') }}" alt=""> --}}
                        <img src="{{ asset($a->img) }}" alt="">
                        <div class="clearfix">
                        </div>
                        <br />
                        <div class="product-details text-left">
                            <p>
                                {{ $a->details }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('legal.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $a->id }}">
                        <input type="hidden" name="price" value="{{ $a->price }}">

                        <button type="submit" class="btn btn-buynow">{{ $a->price }} RSD</button>

                        <b>Product quantity</b>
                        <br>
                        <input type="text" name="prod_qty" value="1">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
