@extends('admin.layouts.app')
@section('title', 'Admin Dashboard | MyBetBible')
@section('heading', 'Dashboard')

@section('content')

    <!-- Dash Counters -->
    @include('admin.dash.counters')

    <div class="row">

        <!-- Earnings -->
        @include('admin.dash.earnings')

        <!-- Popular -->
        @include('admin.dash.popular')

    </div>

    @include('admin.dash.orders')

@endsection
