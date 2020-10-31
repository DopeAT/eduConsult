@extends('layouts.app')
@section('page_id', 'home')
@section('content')

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 darken-bg-text">
                    <div class="intro-text">
                        <div class="intro-lead-in">Superior Academic Help at the Student's Disposal</div>
                        <p>Devoted in helping with one of the most important parts of your university application, so you can focus on your grades and extracurricular accomplishments.</p>
                        <a class="btn btn-danger font-weight-bold" href="{{ route('order') }}">PLACE ORDER</a>
                    </div>
                    <div class="icons">
                        <span class="f-w-500"> <i class="fas fa-graduation-cap"></i> Subject-matter Experts</span>
                        <span class="f-w-500"> <i class="fas fa-book-open"></i> Free of Plagiarism</span>
                        <span class="f-w-500"> <i class="far fa-clock"></i> Timely Turnaround</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="bg-white py-3" id="whyUseUs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1 class="text-center title">Why use EduConsult<span class="text-danger font-weight-bold">O</span>rg.com ?</h1>
                    <hr class="red-hr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="non-icon text-danger">100%</strong>
                        <h4>Original Work</h4>
                        <p class="text-muted">Educonsultorg is 100% confidential, 100% on time and 100% guaranteed plagiarism-free.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="far fa-clock"></i></strong>
                        <h4>On Time Delivery</h4>
                        <p class="text-muted">Constantly striving to exceed your expectations, in essay writing, so you will never miss a deadline ever again.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 consultationediting">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="far fa-comments"></i></strong>
                        <h4>Consultation & Editing</h4>
                        <p class="text-muted">Essay, Assignment, Dissertation, Thesis, Term and Research papers.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-calculator"></i></strong>
                        <h4>Instant Price Calculator</h4>
                        <p class="text-muted">Simply parametrise your order and get instant feedback on the price!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-check"></i></strong>
                        <h4>Easy Checkout Process</h4>
                        <p class="text-muted">In four easy steps place your order, upload relevant documents, use our secure Pay Pal payment method and leave the rest with us!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-hands-helping"></i></strong>
                        <h4>Exceptional Customer Service</h4>
                        <p class="text-muted">A customer support team member is always available to assist you! Choose between online chat, email or a simple phone-call to ask as many questions about your order as you like.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="subjects" class="subjects-section">
        <div class="container">
            <div class="row">
                @foreach($services as $key => $service)
                    <div class="col-sm-12 col-lg-4">
                        <article class="subjects-boxes {{ $key % 2 == 0 ? 'bg-dark' : 'bg-danger' }}">
                            <div class="course-title">
                                <span>{{$service->name}}</span>
                            </div>
                            <div class="icon-course">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="course-title-inside">{{ str_replace("Statement Service", "Service", $service->name) }}</div>
                            <div class="course-details">
                                {!! $service->intro !!}
                            </div>
                            <div class="mbr-section-btn d-flex justify-content-between px-4 pb-3">
                                <div class="text-white">
                                    Prices From: <b>£{{ $service->pricesFrom() }}</b>
                                </div>
                                <a href="{{ route('order') }}" class="font-weight-bold underline text-white">
                                    Order Now
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about-us" class="about-us-section py-4 bg-white">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">About Us</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">At your services</h3>
                    <p>EduConsultOrg is the #01 online platform where students can get in touch with the best academic consultants for just about every subject matter.<br/>We’ve started our online journey back at 2013.<br/>Backed by a carefully selected team of expert writers with vast academic experience, we complete essay writing projects for all levels and disciplines!</p>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">Customer Satisfaction</h3>
                    <p>Keeping our clients satisfied is our primary focus, therefore we do not cut any corners. We put a tremendous amount of effort into each order to ensure that customer communication, project management and project quality assurance processes in all levels, are exceeding your expectations.<br/><b>We succeed when you succeed!</b></p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h3 class="text-center">What Our Customers Say About Us</h3>
                    <hr>
                </div>
            </div>
            <div class="row mt-3 testimonials">

                @foreach($testimonials as $member)
                    <div class="col-sm-4">
                        <div class="testimonial-user">
                            <!--Avatar-->
                            <div class="testimonial-user-avatar mx-auto">
                                <img src="{{ $member->image }}" class="img-fluid rounded-circle" />
                            </div>
                            <!--Content-->
                            <h4 class="avatar-name">{{ $member->name }}</h4>
                            <h6 class="text-primary prof">{{ $member->role }}</h6>
                            <p class="text-center">{{ $member->message }}</p>
                            <!--Review-->
                            <div class="star-text">
                                @for($i=1; $i <= $member->stars; $i++)
                                    <i class="fas fa-star"> </i>
                                @endfor

                                @if (strpos($member->stars, '.5'))
                                    <i class="fas fa-star-half-alt"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    @include('components.contact_boxes')

@endsection
