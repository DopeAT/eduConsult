@extends('layouts.app')
@section('page_id', 'order')
@section('content')

    <Order />

@endsection

@section('_scripts')
    <script>
        const PUBLISHABLE_KEY  = 'pk_test_f79MYDiik2IQXp7kH1N7OIkO';
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/order.js') }}" defer></script>
@endsection
