@extends('layouts.app')
@section('page_id', 'profile')

@section('_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/assets/vendor/dropzone/dist/min/dropzone.min.css')}}">

    <style>
        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection

@section('content')

    <!-- Intro Section -->
    <section class="intro pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 darken-bg-text">
                    <div class="d-flex justify-content-between">
                        <h5>User Survey</h5>
                        <p>Hello, {{ Auth::user()->fullname() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow">
                        <div class="card-body tab-content" id="v-pills-profileContent" style="min-height: 250px;">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="question my-3">
                                            <h3 class="survey-section-title pointer"
                                                data-toggle="collapse"
                                                data-target="#filesUpload"
                                                aria-expanded="false"
                                                aria-controls="filesUpload"
                                            >
                                                1. Files Upload
                                            </h3>
                                        </div>
                                        <hr>

                                        <div class="collapse multi-collapse" id="filesUpload">

                                            <p>Explanation of what kind of files should the user upload</p>

                                            <p class="small font-weight-bold">* Files will upload automatically after dropping files</p>

                                            <input type="hidden" id="pageId" value="{{ $order->payment_id }}">

                                            <form class="dropzone" id="demo-upload" action="{{route('users.fileupload', $order->payment_id)}}">
                                                <div class="dz-message font-weight-bold">
                                                    Drop files here or click to upload.
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="question my-3">
                                            <h3 class="survey-section-title pointer"
                                                data-toggle="collapse"
                                                data-target="#surveyQuestions"
                                                aria-expanded="false"
                                                aria-controls="surveyQuestions"
                                            >
                                                2. Application Details
                                            </h3>
                                        </div>

                                        <hr>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="in multi-collapse collapse show" id="surveyQuestions">
                                            <form id="surveyForm" action="{{ route('survey.post', $order->payment_id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="survey" value="{{ $survey->id }}">
                                                <input type="hidden" name="order" value="{{ $order->payment_id }}">

                                                @include('components.survey.questions', [
                                                    'data' => $questions,
                                                    'answers' => $answers,
                                                    'disabled' => false
                                                ])

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{asset('vendor/assets/vendor/dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>

    <script>
        let CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        let pageId = document.querySelector('#pageId').getAttribute("value")
        let rowField = 1;
        let questionNumber = $('div[id^="numQ"]').attr('id').replace( /^\D+/g, '');

        Dropzone.autoDiscover = false
        let myDropzone = new Dropzone(".dropzone",{
            maxFilesize: 3,  // 3 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.docx",
        })

        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
            formData.append("surveyId", pageId);
        })


        function fields(questionNumber) {
            rowField++;
            let objTo = document.getElementById(`fields${questionNumber}`)
            let divField = document.createElement("div");
            divField.setAttribute("class", "form-group row removeField"+rowField);
            let rdiv = 'removeField'+rowField;
            divField.innerHTML = `
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="survey_q_${questionNumber}[${rowField}][]" placeholder="Field 1">
                </div>
                <div class="input-group col-sm-8">
                    <input type="text" class="form-control" name="survey_q_${questionNumber}[${rowField}][]" placeholder="Field 2">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" onclick="removeFields(${rowField})">
                            <span class="fas fa-minus"></span>
                        </button>
                    </span>
                </div>`

            objTo.appendChild(divField)
        }

        function removeFields(rid) {
            $('.removeField'+rid).remove();
        }
    </script>
@endsection
