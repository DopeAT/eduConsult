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

    <section id="how-it-works-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-5">
                    <h3 class="text-center">How it works</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="how-it-works">
                        <div class="timeline">
                            <a href="#" class="content">
                                <span class="count">1</span>
                                <div class="inner-content">
                                    <h3 class="title">Tell us about your project</h3>
                                    <p class="description">
                                        Give us as much information about the work you need done.
                                        Provide the necessary information about yourself and how to contact you if needed. Attach any relevant documents to your order such as instruction sheet for your assignment and any readings you might have.
                                        Once you have told us everything we need to know about your order, press submit.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="content">
                                <span class="count">2</span>
                                <div class="inner-content">
                                    <h3 class="title">Process your Payment</h3>
                                    <p class="description">
                                        Payment just made easy! Simply click on the Paypal Payment link and follow the prompts.
                                        Once you place your order, you will be provided with an email order confirmation and an invoice.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="content">
                                <span class="count">3</span>
                                <div class="inner-content">
                                    <h3 class="title">Work in Progress</h3>
                                    <p class="description">
                                        As soon as your order comes in, we will start crafting it. If we have any questions, we’ll get in touch with you, otherwise, your order will be assigned to a subject qualified writer, that will spend enough hours laboring over your work to ensure it is meticulously researched and is the best piece of academic study possible.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="content">
                                <span class="count">4</span>
                                <div class="inner-content">
                                    <h3 class="title">Order Delivery</h3>
                                    <p class="description">
                                        You will receive an email notification when your work is complete.  The final piece of work will be attached to the email. Alterations enquiries are welcome as soon as you receive the work and within 7 days of our submission. It is important to note that the request will be reviewed immediately, and an email will be sent to you with instructions on the process to be followed.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mt-3">
                <div class="col-sm-12 my-5 text-center">
                    <h3>{{ $product->name }} Service</h3>
                    <p class="fs-18">
                        Prices from: <span class="font-weight-bolder">£{{ $product->pricesFrom() }}</span>
                    </p>
                    <div>
                        <a class="btn btn-danger btn-lg font-weight-bold" href="http://maro.test/order">
                            Place an order now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.partners')

    @include('components.contact_boxes')

@endsection
