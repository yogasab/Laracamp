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

            @include('components.alert')

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Camp</th>
                        <th>Price</th>
                        <th>Register Data</th>
                        <th>Paid Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $checkout->user->name }}</td>
                        <td>{{ $checkout->camp->title }}</td>
                        <td>Rp{{ number_format($checkout->camp->price) }}K</td>
                        <td>{{ $checkout->created_at->format('M d Y') }}</td>
                        <td>
                            @if ($checkout->is_paid)
                            <span class="badge bg-success">Success</span>
                            @else
                            <span class="badge bg-warning">Waiting</span>
                            @endif
                        </td>
                        <td>
                            @if (!$checkout->is_paid)
                            <form action="{{ route('admin.change.payment.status', $checkout->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm">Set to Paid</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection