@extends('layouts.app')

@section('content')
<section class="checkout">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    YOUR FUTURE CAREER
                </p>
                <h2 class="primary-header">
                    Start Invest Today
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="item-bootcamp">
                            <img src="{{ asset('images/item_bootcamp.png') }}" alt="" class="cover">
                            <h1 class="package text-uppercase">
                                {{ $camp->title }}
                            </h1>
                            <p class="description">
                                {{ $camp->description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('checkout.store', $camp->slug) }}" class="basic-form" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Full Name</label>
                                <input name="name" type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} "
                                    value="{{ old('name') ?: Auth::user()->name }}" />
                                @if ($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email Address</label>
                                <input name="email" type="text"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ old('email') ?: Auth::user()->email }}" />
                                @if ($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Occupation</label>
                                <input name="occupation" type="text"
                                    class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                    value="{{ old('occupation') ?: Auth::user()->occupation }}" />
                                @if ($errors->has('occupation'))
                                <strong class="text-danger">{{ $errors->first('occupation') }}</strong>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Card Number</label>
                                <input name="card_number" type="number"
                                    class="form-control {{ $errors->has('card_number') ? 'is-invalid' : '' }}"
                                    value="{{ old('card_number') }}" />
                                @if ($errors->has('card_number'))
                                <strong class="text-danger">{{ $errors->first('card_number') }}</strong>
                                @endif
                            </div>
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">Expired</label>
                                        <input name="expired" type="month"
                                            class="form-control {{ $errors->has('expired') ? 'is-invalid' : '' }}"
                                            value="{{ old('expired') }}" />
                                        @if ($errors->has('expired'))
                                        <strong class="text-danger">{{ $errors->first('expired') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">CVC</label>
                                        <input name="cvc" type="text"
                                            class="form-control {{ $errors->has('cvc') ? 'is-invalid' : '' }}" />
                                        @if ($errors->has('cvc'))
                                        <strong class="text-danger">{{ $errors->first('cvc') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                            <p class="text-center subheader mt-4">
                                <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure and
                                encrypted.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection