@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Pay ₹{{ $plan->price }} for {{ $plan->name }}</h2>
    <form action="{{ route('subscription.razorpay.success') }}" method="POST">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ $razorpay_key }}"
                data-amount="{{ $amount }}"
                data-currency="INR"
                data-order_id="{{ $order_id }}"
                data-buttontext="Pay Now"
                data-name="Job Portal"
                data-description="Subscription Payment"
                data-email="{{ $user->email }}"
                data-theme.color="#0e66ff">
        </script>
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
    </form>
</div>
@endsection
