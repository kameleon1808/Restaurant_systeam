@extends('layouts.user')

@section('order-l')
    <section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">YOUR LAST ORDER</h1>
                </div>
                <div class="wow-hr type_short">
                    <span class="wow-hr-h">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </div>

            <div id="edd_checkout_wrap" class="col-md-8 col-md-offset-2">
                <div id="edd_checkout_cart_wrap">

                    <table id="edd_checkout_cart" class="ajaxed">
                        <thead>
                            <tr class="edd_cart_header_row">
                                <th class="edd_cart_item_name">
                                    Items Name
                                </th>
                                <th class="edd_cart_item_name">
                                    Items Qty
                                </th>
                                <th class="edd_cart_item_price">
                                    Total Price
                                </th>
                                <th class="edd_cart_actions">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $a)
                                <tr class="edd_cart_item" id="edd_cart_item_0_25" data-download-id="25">
                                    <td class="edd_cart_item_name">
                                        <div class="edd_cart_item_image">
                                            <img width="25" height="25"
                                                src="{{ asset('images/scorilo2-70x70.jpg') }}" alt="">
                                        </div>
                                        <input type="hidden" name="article_name[]" value="{{ $a->name }}">
                                        <span class="edd_checkout_cart_item_title">{{ $a->article_name }}</span>
                                    </td>
                                    <td class="edd_cart_item_price">
                                        <input type="hidden" name="prod_qty[]" value="{{ $a->prod_qty }}">
                                        {{ $a->prod_qty }}
                                    </td>
                                    <td class="edd_cart_item_price">
                                        <input type="hidden" name="price[]" value="{{ $a->price }}">
                                        {{ $a->price }} RSD
                                    </td>
                                    <input type="hidden" name="cart_id[]" value="{{ $a->id }}">
                                    <td class="edd_cart_actions">
                                        <form action="{{ route('legal.cancel') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{!! $a->id !!}">
                                            <button class="edd_cart_remove_item_btn" type="submit">Cancel</button> <br>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($order_loc->isNotEmpty())
                                            @if ($order_loc[0]->boss_id != null)
                                                <form action="{{ route('legal.locate') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{!! $a->id !!}">
                                                    <input type="hidden" name="order_loc_id"
                                                        value="{{ $order_loc[0]->id }}">
                                                    <button class="edd_cart_remove_item_btn" type="submit">Locate</button>
                                                    <br>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="edd_cart_footer_row edd_cart_discount_row" style="display:none;">
                                <th colspan="5" class="edd_cart_discount">
                                </th>
                            </tr>
                            <tr class="edd_cart_footer_row">
                                <th colspan="5" class="edd_cart_total">
                                    {{-- Locate order: 
                                    <span class="edd_cart_amount" data-subtotal="11.99" data-total="11.99">ses</span> --}}
                                    @foreach ($order_loc as $o)
                                        @if ($o->delievered == 0)
                                            @if ($o->boss_id != null)
                                                @if ($o->request != null or $o->location != null)
                                                    @if ($o->location != null)
                                                        <a href="https://yandex.ru/maps/?whatshere[point]={{ $order_loc[0]->location }}&whatshere[zoom]=17"
                                                            class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                                            Lokacija {{ $o->created_at }}
                                                        </a>
                                                    @else
                                                        <button type="submit"
                                                            class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                                            Location is still pending
                                                        </button>
                                                    @endif
                                                @else
                                                    <button type="submit"
                                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                                        A locate request was not sent
                                                    </button>
                                                @endif
                                            @else
                                                <button type="submit"
                                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                                    Your order is still not in the delivery process
                                                </button>
                                            @endif
                                        @else
                                            <button type="submit"
                                                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                                You have not created any orders
                                            </button>
                                        @endif
                                    @endforeach
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
