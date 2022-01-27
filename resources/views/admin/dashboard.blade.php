@extends('layouts.app')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    All Purchased Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">

            @if ($message = Session::get('error'))
            @include('components.alert')
            @endif

            <table class="table">
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                        </td>
                        <td>
                            <p class="">
                                <strong>{{ $checkout->camp->title }}</strong>
                            </p>
                            <p>
                                {{ $checkout->created_at->format('M d, Y') }}
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-bolder">
                                <strong> {{ $checkout->user->name }}
                                </strong>
                            </p>
                            <p>
                                <strong>Rp{{ number_format($checkout->camp->price) }}K
                                </strong>
                            </p>
                        </td>
                        <td>
                            @if ($checkout->is_paid)
                            <strong class="text-success">Payment Success</strong>
                            @else
                            <strong class="text-warning">Waiting for Payment</strong>
                            @endif
                        </td>
                        <td>
                            <a href="https://wa.me/089129793791212?text=Hi, saya ingin berdiskusi tentang bootcamp {{ $checkout->title }}"
                                class="btn btn-primary">
                                Contact Support
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="font-weight-bold">
                        <td colspan="5">
                            <h3> You have not enroll class yet</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection