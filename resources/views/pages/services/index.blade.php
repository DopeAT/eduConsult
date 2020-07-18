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
                            <div class="service-details p-4 text-pre-wrap">{{ $service->intro }}</div>
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


    <section id="contact" class="contact-section text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="fs-16">Stay in touch! We offer a variety of communication channels but you can always sent us an email and say: <a href="" class="blue-color">hello@educonsultorg.com</a></p>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-map-marked text-danger"></i>
                            <h6 class="mt-2"><b>OUR OFFICE</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                Bute Mills<br/>
                                74 Bute Street, Luton<br/>
                                LU1 2EY
                            </p>
                        </div>
                        <a class="btn btn-eco pointer" data-toggle="modal" data-target="#mapModal">See on Map</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-info-circle text-danger"></i>
                            <h6 class="mt-2"><b>NEED HELP?</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                Visit our Help Center for<br/>
                                Frequently Asked Questions.<br/><br/>
                            </p>
                        </div>
                        <a href="#" class="btn btn-eco pointer">FAQ</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="far fa-comments text-danger"></i>
                            <h6 class="mt-2"><b>NEED TO TALK?</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                You have a question that we hasn’t been answered yet?<br/>
                                Don’t hesitate to ask now!<br/>
                            </p>
                        </div>
                        <a class="btn btn-eco mt-2 pointer">CHAT</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="mapModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Our Office</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2449.3520105831217!2d-0.4205106842071379!3d52.12791797974188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877b64261a52c9d%3A0x6af698b0216051fc!2sVijay+House+Limited!5e0!3m2!1sen!2suk!4v1529133945868" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection
