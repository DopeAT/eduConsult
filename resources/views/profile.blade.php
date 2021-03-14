@extends('layouts.app')
@section('page_id', 'profile')
@section('content')

    <!-- Intro Section -->
    <section class="intro pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 darken-bg-text">
                    <div class="d-flex justify-content-between">
                        <h5>User Profile</h5>
                        <p>Hello, {{ $user->fullname() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="card shadow">
                        <div class="card-body tab-content" id="v-pills-profileContent" style="min-height: 250px;">

                            @include('layouts.messages')
                            <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                @include('components.profile.settings')
                            </div>
                            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                @include('components.profile.orders')
                            </div>
                            @php $activeSurvey = Auth::user()->surveys()->where('completed', 0)->first() @endphp
                            @if(!empty($activeSurvey))
                                <div class="tab-pane fade" id="v-pills-survey" role="tabpanel" aria-labelledby="v-pills-survey-tab">
                                    @include('components.profile.survey')
                                </div>
                            @endif
{{--                            <div class="tab-pane fade" id="v-pills-marketing" role="tabpanel" aria-labelledby="v-pills-marketing-tab">--}}
{{--                                @include('components.profile.marketing')--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="list-group shadow" id="v-pills-profile" role="tablist" aria-orientation="vertical">
                        <a id="v-pills-settings-tab"
                           data-toggle="pill"
                           href="#v-pills-settings"
                           role="tab"
                           aria-controls="v-pills-settings"
                           aria-selected="true"
                           class="list-group-item py-3 list-group-item-action flex-column align-items-start active"
                        >
                            Settings
                        </a>
                        <a id="v-pills-orders-tab"
                           data-toggle="pill"
                           href="#v-pills-orders"
                           role="tab"
                           aria-controls="v-pills-orders"
                           aria-selected="true"
                           class="list-group-item py-3 list-group-item-action flex-column align-items-start"
                        >
                            Orders History
                        </a>
                        @if(!empty($activeSurvey))
                            <a id="v-pills-survey-tab"
                               data-toggle="pill"
                               href="#v-pills-survey"
                               role="tab"
                               aria-controls="v-pills-survey"
                               aria-selected="true"
                               class="list-group-item py-3 list-group-item-action flex-column align-items-start"
                            >
                                Survey
                            </a>
                        @endif
{{--                        <a id="v-pills-marketing-tab"--}}
{{--                           data-toggle="pill"--}}
{{--                           href="#v-pills-marketing"--}}
{{--                           role="tab"--}}
{{--                           aria-controls="v-pills-marketing"--}}
{{--                           aria-selected="true"--}}
{{--                           class="list-group-item py-3 list-group-item-action flex-column align-items-start"--}}
{{--                        >--}}
{{--                            Marketing Preferences--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
