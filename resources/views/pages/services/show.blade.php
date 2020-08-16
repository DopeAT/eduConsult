@extends('layouts.app')
@section('page_id', 'services')
@section('content')

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="intro-text p-5">
                    <h1 class="">{{ $service->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">{{ $service->text_title }}</h2>
                    {!! $service->intro !!}
                    <hr>
                </div>
            </div>


            <div class="row">

                <div class="col-12">
                    {!! $service->description !!}
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    {!! $service->body !!}
                </div>
            </div>
        </div>
    </section>

    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                @foreach($service->products as $product)
                    <div class="p-2 col-12 col-lg-4">
                        <article class="subjects-boxes {{ $product->id % 2 ? 'bg-dark' : 'bg-danger' }}">
                            <div class="service-title text-center">
                                <span>{{ $product->name }}</span>
                            </div>
                            <div class="service-details p-4 text-pre-wrap">{!! $product->intro !!}</div>
                            <div class="mbr-section-btn d-flex justify-content-between px-4 pb-3">
                                <div class="text-white">
                                    Prices From: <b>£{{ $product->pricesFrom() }}</b>
                                </div>
                                <a href="{{ route('products.show', [$service->slug, $product->slug]) }}" class="font-weight-bold underline text-white">
                                    Learn More
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


{{--    <pre>--}}
{{--        {{print_r($service->products)}}--}}
{{--    </pre>--}}


    <!-- partners -->
    <section id="logos-section" class="py-4 bg-white">
        <div class="container text-center">

            <h2 class="title mt-4 mb-5">Our Partners</h2>

            <ul class="list-inline row">
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-1.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-2.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-3.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-4.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-5.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-6.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-7.png" alt="">
                </li>
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/logo-8.png" alt="">
                </li>
            </ul>
        </div>
    </section>

@endsection
