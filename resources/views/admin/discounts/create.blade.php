@extends('admin.layouts.app')
@section('title', 'Discounts Admin Dashboard | EduConsultOrg')
@section('heading', 'Discounts - Dashboard')


@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New Discount</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.discounts.store') }}" class="pt-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="value" class="col-md-4 col-form-label text-md-right">Discount Value</label>

                    <div class="col-md-6">
                        <input id="value" type="number" class="form-control" name="value" value="{{ old('value') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label text-md-right">Discount Code</label>

                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start" class="col-md-4 col-form-label text-md-right">Discount Valid</label>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <div>
                                <input type="text"
                                       name="start"
                                       class="form-control form-control-sm"
                                       id="start"
                                       placeholder="Start Date"
                                       autocomplete="off"
                                       required
                                >
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <div>
                                <input type="text"
                                       name="end"
                                       class="form-control form-control-sm"
                                       id="end"
                                       placeholder="Expire Date"
                                       autocomplete="off"
                                       required
                                >
                            </div>
                        </div>
                    </div>

                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Create
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script>
        $( function() {
            const dateFormat = "dd M yy";

            let from = $( "#start" ).datepicker({
                defaultDate: "+1w",
                dateFormat: dateFormat,
                changeMonth: true,
                numberOfMonths: 1
            }).on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            });

            let to = $( "#end" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                dateFormat: dateFormat,
                numberOfMonths: 1
            }).on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

            function getDate( element ) {
                let date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );
    </script>
@endsection
