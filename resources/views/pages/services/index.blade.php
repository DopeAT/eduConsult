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
                    <hr>
                </div>
            </div>


            <div class="row">

                @foreach($services as $service)
                    <div class="p-2 col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-wrapper p-2">
                                <div class="card-box">
                                    <h4 class="card-title text-center pt-2">{{ $service->name }}</h4>
                                    <p class="card-body">
                                        Accusantium saepe rerum qui ut sapiente temporibus eaque soluta molestiae quo quae
                                        id nemo reprehenderit dolorem ut expedita voluptas ratione minima quia magnam illo
                                        quidem velit rerum doloribus autem asperiores expedita assumenda incidunt quidem.
                                    </p>
                                </div>
                                <div class="mbr-section-btn text-center">
                                    <a href="/services/{{ $service->slug }}" class="btn btn-primary display-4">
                                        Enroll
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

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
