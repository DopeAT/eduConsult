@extends('layouts.app')
@section('page_id', 'faqs')

@section('content')

    <section id="faqSection" class="faq-section mb-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="intro-text">
                        <h1>Frequently Asked Questions</h1>
                        <p>What we can help you with today?</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 bg-white mt-3 faq-content">
                    <div class="toggle-container">
                        @foreach($faqs as $faq)
                            <div class="faq">
                                <h5 class="title">
                                    <a data-toggle="collapse" href="#faq{{ $faq->id }}" aria-expanded="false" class="collapsed">{{ $faq->question }}</a>
                                </h5>
                                <div id="faq{{ $faq->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-content">
                                        <p>{!! $faq->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-12 bg-white my-3">
                    <div class="toggle-container faq-content">
                        <div class="faq">
                            <h5 class="title">
                                <a data-toggle="collapse" href="#tgganswerquestion" aria-expanded="true" class="">Did this answer your question?</a>
                            </h5>
                            <div id="tgganswerquestion" class="p-3 panel-collapse collapse show" aria-expanded="true" style="">
                                <div class="panel-content">
                                    <label class="radio-inline">
                                        <input type="radio" name="survey" id="Radios1" value="Yes" checked onclick="clickYes();">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="survey" id="Radios2" value="No" onclick="clickNo();">No
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="survey" id="Radios3" value="Notsure" onclick="clickNotSure();">Not sure
                                    </label>
                                    <div class="hidden" id="yes"></div>
                                    <div class="hidden" id="no">
                                        <div class="mt-3">
                                            We are really sorry to hear that. You can <a href="{{ route('contact') }}">contact us</a> and we will be glad to help you.
                                        </div>
                                    </div>
                                    <div class="hidden" id="notsure">
                                        <div class="mt-3">
                                            You can <a href="{{ route('contact') }}">contact us</a> and we will be glad to help you.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('_scripts')
    <script>
        function clickYes(){
            $('#yes').removeClass('hidden');
            $('#no').addClass('hidden');
            $('#notsure').addClass('hidden');
        }
        function clickNo(){
            $('#no').removeClass('hidden');
            $('#yes').addClass('hidden');
            $('#notsure').addClass('hidden');
        }
        function clickNotSure(){
            $('#no').addClass('hidden');
            $('#yes').addClass('hidden');
            $('#notsure').removeClass('hidden');
        }
    </script>
@endsection
