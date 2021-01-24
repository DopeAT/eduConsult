@extends('layouts.app')
@section('page_id', 'faqs')

@section('content')

    <section id="faqSection" class="pt-5 mb-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h1>{{$data->title}}</h1>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                {!! $data->body !!}
            </div>
        </div>
    </section>


@endsection