@extends('layouts.app')
@section('page_id', 'services')
@section('content')

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="intro-text">
                    <h1 class="">Services</h1>
                    <h3 class="">Education is what remains after one has forgotten what one has learned in school.</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias architecto, consectetur,
                        consequuntur corporis dolore dolorem dolores eum hic laborum nulla optio quisquam, quo rem repudiandae
                        unde vel! Exercitationem, vero.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section id="services-list" class="services-list py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">Our Services</h2>
                    <p class="text-pre-wrap">As well as providing <a href="/services">Personal Statement Services</a>, we also have a range of further services and tools that can help increase your chances of being offered a place at university. Our experienced writers will ensure that your CV, cover letter, letter of recommendation or reference is well-written, error-free and engaging. While our career questions service will help prepare you for success.</p>
                    <hr>
                </div>
            </div>


            <div class="row">

                @foreach($services as $service)
                    <div class="p-2 col-12 col-lg-4">
                        <article class="subjects-boxes {{ $service->id % 2 ? 'bg-dark' : 'bg-danger' }}">
                            <div class="service-title text-center">
                                <span>{{ $service->name }}</span>
                            </div>
                            <div class="service-details p-4 text-pre-wrap">{!! $service->intro !!}</div>
                            <div class="mbr-section-btn d-flex justify-content-between px-4 pb-3">
                                <div class="text-white">
                                    Prices From: <b>£{{ $service->pricesFrom() }}</b>
                                </div>
                                <a href="/services/{{ $service->slug }}" class="font-weight-bold underline text-white">
                                    Learn More
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- partners -->
    <section id="logos-section" class="py-4 bg-white">
        <div class="container text-center">

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

    @include('components.contact_boxes')

@endsection
