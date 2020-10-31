@extends('layouts.app')
@section('page_id', 'contactPage')

@section('content')

    <!-- Intro Section -->
    <section id="contactSection" class="contact-section mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Contact Us</h1>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <iframe class="w-100" src="{{ env('MAP_ID') }}" height="450" frameborder="0"></iframe>
                </div>
            </div>

            <div class="row mt-2 pt-2">
                <div class="col-sm-8 mt-3 p-3">

                    @if(session()->has('success'))

                        {!! successMsg(session()->get('success'))  !!}

                    @endif

                    <form id="contact-form" method="POST" action="" role="form">
                        @csrf
                        <div class="controls">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Please enter your name *">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Please enter your email *">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Please enter your phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Please enter your message" rows="4">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success float-left" value="Send message">
                            </div>
                        </div>
                    </form>
                </div><!-- /.8 -->
                <div class="col-sm-4">
                    <p class="mt-5 text-left">Our academic consultants are here to answer your questions <br/><br/>9am - 6pm Monday to Friday</p>
                    <div class="contact">
                        <div class="icon">
                            <h3><a href="tel:{{ env('PHONE_NUM') }}"><i class="fas fa-phone fa-rotate-90"></i>  <span>+44 7715 366349</span></a></h3>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="icon">
                            <h3><a href="mailto:hello@educonsultorg.com"><i class="fas fa-envelope"></i>  <span>hello@educonsultorg.com</span></a></h3>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="icon">
                            <h3><a href="https://api.whatsapp.com/send?phone={{ env('PHONE_NUM') }}"><i class="fab fa-whatsapp"></i>  <span>+44 7715 366349</span></a></h3>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="icon">
                            <h3>
                                <a class="location-contact"><i class="fas fa-building"></i>
                                    <span>
                                        {{ env('ADDRESS') }},
                                        <br/>{{ env('CITY') }}, {{ env('COUNTY') }}
                                        <br/>{{ env('POSTCODE') }}
                                        <br/>{{ env('COUNTRY') }}
                                    </span>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('_scripts')
    <script src="{{ asset('js/contact.js') }}" defer></script>
@endsection
