@extends('layouts.app')
@section('page_id', 'product')
@section('content')

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="intro-text p-5">
                    <h1 class="">{{ $product->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">{{ $product->text_title }}</h2>
                    {!! $product->intro !!}
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    {!! $product->body !!}
                </div>
            </div>
        </div>
    </section>

    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                Here goes price section
            </div>
        </div>
    </section>

    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                Here goes how it works section
            </div>
        </div>
    </section>


    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                Here goes callback and order button
            </div>
        </div>
    </section>

@endsection
