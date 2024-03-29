@extends('layouts.app')
@section('page_id', 'about')


@section('content')

    <section class="about-page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="bg-white card-lead">
                        <div class="intro">About Us</div>
                        <div class="text">
                            “Our element and area of expertise is providing genuine, advanced academic support to students of all educational levels.
                            Backed by a carefully selected team of expert writers with vast academic experience, we deliver bespoke writing services and consulting”
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-5">
                    <h3 class="text-center">Welcome to The ROps.co.uk, all the expert help you need in one website!</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <p><b>The Oxbridge & Russel Personal Statements (The ROps)</b> is the #01 online platform where students can get in touch with the best academic consultants for just about every subject matter. We are your one stop solution providers for Essay, Assignment, Dissertation, Thesis, Proofreading-Editing & Consultation.</p>
                    <br/>
                    <p>We started our journey in 2013 servicing successfully primarily the European market. We soon expanded globally providing our online bespoke writing services to students that chose English as their education language, without border limitations.  </p>
                    <br/>
                    <p>We have a strict policy of adhering to the highest Standards of Writing Consultancy and providing students with a Service Quality that they deserve, tailored to their specifications. ECO is the online platform where you get Timely Assistance and guidance in any discipline. Apart from this we are also here to support you with Long-Term Assignments, guiding you at each level of Research Work.</p>
                </div>
                <div class="col-lg-6">
                    <p>We have the most Competent Team of Academic Experts and we employ the Best Technology Available out there, while at the same time we make sure your academic document is error free through our Quality Checks. Our Academic Experts will provide you with customised Academic Consultation & Editing Services, in fast turnarounds and affordable prices.</p>
                    <br/>
                    <p>Above all, we are focusing our efforts in providing exceptional customer service, always striving for unlimited communication with you.</p>
                </div>



            </div>
        </div>
    </section>


    <section class="guarantees text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 my-3">
                    <h3 class="text-center">Our Guarantees</h3>
                    <p class="text-center">We are devoted and committed to our principles and values.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col my-3 border-right border-left">
                    <div class="guarantee-content text-center">
                        <div class="icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="details">
                            <h4>SUBJECT-MATTER EXPERTS</h4>
                            <hr class="white-hr">
                            <p>A carefully selected, competent team of Academic Experts in their fields ready to support you.</p>
                        </div>
                    </div>
                </div>
                <div class="col my-3 border-right">
                    <div class="guarantee-content text-center">
                        <div class="icon">
                            <i class="fas fa-comment-slash"></i>
                        </div>
                        <div class="details">
                            <h4>FREE OF PLAGARISM</h4>
                            <hr class="white-hr">
                            <p>We take plagiarism seriously, therefore we perform a bespoke quality check on every piece of work our academics create.</p>
                        </div>
                    </div>
                </div>
                <div class="col my-3 border-right">
                    <div class="guarantee-content text-center">
                        <div class="icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="details">
                            <h4>TIMELY TURNAROUND</h4>
                            <hr class="white-hr">
                            <p>Time is of the essence and in our case your deadline is our deadline!</p>
                        </div>
                    </div>
                </div>
                <div class="col my-3 border-right">
                    <div class="guarantee-content text-center">
                        <div class="icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="details">
                            <h4>FREE OF CHARGE REVISION</h4>
                            <hr class="white-hr">
                            <p>We are happy when you are happy.</p>
                        </div>
                    </div>
                </div>
                <div class="col my-3 border-right">
                    <div class="guarantee-content text-center">
                        <div class="icon">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <div class="details">
                            <h4>PRIVACY MAINTAINED</h4>
                            <hr class="white-hr">
                            <p>We’ll be using your information to look after your account and provide bespoke service but nothing else.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Team--}}
    @if(count($teamMembers) > 0)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 my-5">
                        <h3 class="text-center">Meet our team</h3>
                    </div>
                </div>
                <div class="row mt-3" id="team">

                    <!-- Team member -->
                    @foreach($teamMembers as $member)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p>
                                                <img class="img-fluid"
                                                     src="/images/team/{{ $member->image }}" alt="{{ $member->name }} | {{ $member->profession }}"
                                                     title="{{ $member->name }} | {{ $member->profession }}"
                                                >
                                            </p>
                                            <h4 class="card-title">{{ $member->name }}</h4>
                                            <h6 class="font-weight-bold">{{ $member->profession }}</h6>
                                            <p class="card-text">{{ $member->text }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" href="mailto:{{$member->email}}">
                                                        <i class="fas fa-envelope"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
    {{--                            <div class="backside">--}}
    {{--                                <div class="card">--}}
    {{--                                    <div class="card-body text-center mt-4">--}}
    {{--                                        <h4 class="card-title">{{ $member->name }}</h4>--}}
    {{--                                        <h6 class="font-weight-bold">{{ $member->profession }}</h6>--}}
    {{--                                        <p class="card-text">{{ $member->text }}</p>--}}
    {{--                                        <ul class="list-inline">--}}
    {{--                                            <li class="list-inline-item">--}}
    {{--                                                <a class="social-icon text-xs-center" href="#!">--}}
    {{--                                                    <i class="fab fa-facebook-f"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="list-inline-item">--}}
    {{--                                                <a class="social-icon text-xs-center" href="#!">--}}
    {{--                                                    <i class="fab fa-twitter"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="list-inline-item">--}}
    {{--                                                <a class="social-icon text-xs-center" href="#!">--}}
    {{--                                                    <i class="fab fa-skype"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                            <li class="list-inline-item">--}}
    {{--                                                <a class="social-icon text-xs-center" href="#!">--}}
    {{--                                                    <i class="fab fa-linkedin"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- ./Team member -->

                </div>
            </div>
        </section>
    @endif

@endsection
