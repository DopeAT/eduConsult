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


    @include('components.partners')

@endsection
