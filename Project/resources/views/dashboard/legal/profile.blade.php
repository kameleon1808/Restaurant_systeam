@extends('layouts.user')

@section('profile-l')
    <section class="item content">
        <div class="container toparea">
            <div id="edd_checkout_wrap" class="col-md-8 col-md-offset-2">

                <div id="edd_checkout_form_wrap" class="edd_clearfix">
                    <fieldset id="edd_checkout_user_info">
                        <form action="{{ route('legal.updateInformation') }}" method="POST">
                            @csrf
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
                                    Phone number </label>
                                <input class="edd-input" type="text" name="phone" id="edd-last"
                                    value="{{ auth()->guard()->user()->phone }}">
                            </p>

                            <input type="submit" class="edd-submit button" id="edd-purchase-button" name="edd-purchase"
                                value="Change information">
                        </form><br>

                        <form action="{{ route('legal.update') }}" method="post">
                            @csrf
                            <label class="edd-label" for="edd-last">Your old password </label>
                            <input class="edd-input" type="password" name="pwd" placeholder="******">
                            <label class="edd-label" for="edd-last">Your new password </label>
                            <input class="edd-input" type="password" name="pwd_new" placeholder="******">

                            <input type="submit" class="edd-submit button" id="edd-purchase-button" name="edd-purchase"
                                value="Change password">
                        </form>

                        <br>

                        <form action="{{ route('legal.delete') }}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-danger" name="edd-purchase" value="Delete profile">
                        </form>


                    </fieldset>
                </div>
            </div>
        </div>
    </section>
@endsection
