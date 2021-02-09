@extends('layouts.app')
@section('page_id', 'surveyExample')

@section('content')

    <section id="surveyExample" class="survey-example pt-5 mb-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="intro-text text-center">
                        <h1>Survey Example</h1>
                        <p>To help your appointed academic craft a personal statement that is the very best reflection of you, please fill in the fields below in as much detail as possible.</p>
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

                <div class="col-sm-12">
                    <div class="question my-3">
                        <h3 class="survey-section-title">1. Files Upload</h3>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-12">
                    <div class="question my-3">
                        <h3 class="survey-section-title">2. Application Details</h3>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-12">
                    <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold active"
                               id="students-tab"
                               data-toggle="tab"
                               href="#students"
                               role="tab"
                               aria-controls="students"
                               aria-selected="true"
                            >
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold"
                               id="professionals-tab"
                               data-toggle="tab"
                               href="#professionals"
                               role="tab"
                               aria-controls="professionals"
                               aria-selected="false"
                            >
                                Professionals
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="students" role="tabpanel" aria-labelledby="students-tab">
                            @include('components.survey.questions', ['data' => $students])
                        </div>
                        <div class="tab-pane fade" id="professionals" role="tabpanel" aria-labelledby="professionals-tab">
                            @include('components.survey.questions', ['data' => $pros])
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

@endsection