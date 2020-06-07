@extends('layouts.app')
@section('page_id', 'order')
@section('content')

    <Order />

@endsection

@section('_scripts')
    <script>
        const IS_AUTHENTICATED = {{ \Illuminate\Support\Facades\Auth::id() ? 1 : 0 }};
    </script>
    <script src="{{ asset('js/order.js') }}" defer></script>
@endsection
