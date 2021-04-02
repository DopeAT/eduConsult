@extends('admin.layouts.app')
@section('title', 'Orders Admin Dashboard | EduConsultOrg')
@section('heading', 'Orders - Dashboard')

@section('styles')
    <style>
        .card {
            -webkit-box-shadow: 0 7px 14px 0 rgba(65 69 88 0.1), 0 3px 6px 0 rgba(0 0 0 0.07);
            box-shadow: 0 7px 14px 0 rgba(65 69 88 0.1), 0 3px 6px 0 rgba(0 0 0 0.07);
        }

        .bg-card {
            background-size: contain;
            background-position: right;
            border-top-right-radius: .375rem;
            border-bottom-right-radius: .375rem;
        }

        .card-body:last-child {
            border-bottom-left-radius: .375rem;
            border-bottom-right-radius: .375rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .fs--1 {
            font-size: .83333rem;
        }

        .badge-soft-success {
            color: #00864e;
            background-color: #ccf6e4;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 mb-2">
            @include('layouts.messages')
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 mb-2">
            <div class="bg-white p-3 d-flex justify-content-between">
                <span class="font-weight-bold">
                    Order {{ $order->payment_id }}
                </span>
            </div>
        </div>

        <div class="col-sm-12">

            <div class="bg-white p-3">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="order-tab"
                           data-toggle="tab"
                           href="#order"
                           role="tab"
                           aria-controls="order"
                           aria-selected="true"
                        >Order Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="survey-tab"
                           data-toggle="tab"
                           href="#survey"
                           role="tab"
                           aria-controls="survey"
                           aria-selected="false"
                        >Order Survey</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
                        @include('admin.orders.fields.order')
                    </div>
                    <div class="tab-pane fade" id="survey" role="tabpanel" aria-labelledby="survey-tab">
                        @include('admin.orders.fields.survey')
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
