@extends('layouts.user')

@section('cart-l')
    <!-- CONTENT =============================-->
    <section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">MAKE PAYMENT</h1>
                </div>
                <div class="wow-hr type_short">
                    <span class="wow-hr-h">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </div>
            <form action="{{ route('legal.create') }}" method="post">
                @csrf
                <div id="edd_checkout_wrap" class="col-md-8 col-md-offset-2">
                    <div id="edd_checkout_cart_wrap">

                        <table id="edd_checkout_cart" class="ajaxed">
                            <thead>
                                <tr class="edd_cart_header_row">
                                    <th class="edd_cart_item_name">
                                        Item Name
                                    </th>
                                    <th class="edd_cart_item_name">
                                        Item Qty
                                    </th>
                                    <th class="edd_cart_item_price">
                                        Item Price
                                    </th>
                                    <th class="edd_cart_actions">
                                        Actions
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
                                            <span class="edd_checkout_cart_item_title">{{ $a->name }}</span>
                                        </td>
                                        <td class="edd_cart_item_price">
                                            <input type="hidden" name="prod_qty[]" value="{{ $a->prod_qty }}">
                                            {{ $a->prod_qty }}
                                        </td>
                                        <td class="edd_cart_item_price">
                                            <input type="hidden" name="price[]" value="{{ $a->price }}">
                                            {{ $a->price }} RSD
                                        </td>
                                        <td class="edd_cart_actions">
                                            <form action="{{ route('legal.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $a->id }}">
                                                <button class="edd_cart_remove_item_btn" type="submit">Remove</button>
                                            </form>
                                        </td>

                                        <td class="edd_cart_actions">
                                            <form action="{{ route('legal.update-qty') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $a->id }}">
                                                <input type="hidden" name="article_id" value="{{ $a->article_id }}">
                                                {{-- <input type="hidden" name="price" value="{{ $a->price }}"> --}}

                                                <input type="numeric" name="new_qty" value="{{ $a->prod_qty }}">

                                                <button class="edd_cart_remove_item_btn" type="submit">Change qty</button>
                                            </form>
                                        </td>

                                        <input type="hidden" name="cart_id[]" value="{{ $a->id }}">

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
                                        Total: <span class="edd_cart_amount" data-subtotal="11.99"
                                            data-total="11.99">{{ $sum_prices }} RSD</span>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div id="edd_checkout_form_wrap" class="edd_clearfix">
                        <fieldset id="edd_checkout_user_info">
                            <legend>Personal Info</legend>
                            <p id="edd-email-wrap">
                                <label class="edd-label" for="edd-email">
                                    Email Address <span class="edd-required-indicator">*</span></label>
                                <input class="edd-input required" type="email" name="email" id="edd-email"
                                    value="{{ auth()->guard()->user()->email }}">
                            </p>
                            <p id="edd-first-name-wrap">
                                <label class="edd-label" for="edd-first">
                                    Full name <span class="edd-required-indicator">*</span>
                                </label>
                                <input class="edd-input required" type="text" name="name" id="edd-first"
                                    value="{{ auth()->guard()->user()->name }}" required="">
                            </p>
                            <p id="edd-first-name-wrap">
                                <label class="edd-label" for="edd-first">
                                    Company name <span class="edd-required-indicator">*</span>
                                </label>
                                <input class="edd-input required" type="text" name="company_name" id="edd-first"
                                    value="{{ auth()->guard()->user()->company_name }}" required="">
                            </p>
                            <p id="edd-last-name-wrap">
                                <label class="edd-label" for="edd-last">
                                    Address </label>
                                <input class="edd-input" type="text" name="address" id="edd-last"
                                    value="{{ auth()->guard()->user()->address }}">
                            </p>
                            <p id="edd-last-name-wrap">
                                <label class="edd-label" for="edd-last">
                                    Comments </label>
                                <input class="edd-input" type="text" name="comments" id="edd-last" value="">
                            </p>
                        </fieldset>
                        <fieldset id="edd_purchase_submit">
                            <p id="edd_final_total_wrap">
                                <strong>Purchase Total:</strong>
                                <span class="edd_cart_amount" data-subtotal="11.99"
                                    data-total="11.99">{{ $sum_prices }}
                                    RSD</span>
                            </p>
                            <input type="hidden" name="edd_action" value="purchase">
                            <input type="hidden" name="edd-gateway" value="manual">

                            @if ($sum_art > 150)
                                <td>
                                    <button type="button" class="btn btn-danger">It is not possible to order more than
                                        150
                                        dishes at the same time</button>
                                </td>
                            @elseif ($sum_art == 0)
                                <td>
                                    <button type="button" class="btn btn-danger">Cart is empty</button>
                                </td>
                            @else
                                <td>
                                    <input type="submit" class="edd-submit button" id="edd-purchase-button"
                                        name="edd-purchase" value="Purchase">
                                </td>
                            @endif

                        </fieldset>
                        <input type="hidden" name="total_price" value="{{ $sum_prices }}">
                        {{-- <input type="hidden" name="total_price" value="{{ }}"> --}}

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
