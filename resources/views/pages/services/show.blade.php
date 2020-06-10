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
                    <h2 class="text-center">{{ $service->name }}</h2>
                    <hr>
                </div>
            </div>


            <div class="row">

                {!! $service->description !!}

            </div>
        </div>
    </section>

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
