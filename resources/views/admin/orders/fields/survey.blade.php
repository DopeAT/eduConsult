<style>
    .logos input[type="radio"][id^="sl"] {
        display: none;
    }
    .logos label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .logos label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }
    .logos ul li img {
        margin: 5px 0;
    }
    .logos label img {
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }
    .logos label .actions {
        display: none;
    }

    .logos :checked + label {
        border-color: #ddd;
    }
    .logos :checked + label:before {
        content: "✓";
        background-color: #1cc88a;
        transform: scale(1);
    }
    .logos label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid #1cc88a;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }
    .logos :checked + label img {
        transform: scale(0.9);
        /*box-shadow: 0 0 5px #333;*/
        z-index: -1;
    }

    .logos :checked + label .actions {
        display: block;!important;
    }

    img {
        width: 100px!important;
        height: 100px!important;
    }
</style>

<div class="card my-3 py-5">
    <div class="card-body">
        <h5>Files Uploaded by User</h5>

        <div class="row">
            <div class="col-sm-12">
                <div class="bg-white p-3">
                    <div class="container-fluid">
                        <ul class="row list-unstyled logos">
                            @foreach($files as $file)
                                <li class="col-sm-2">
                                    <input type="radio" name="partner_logo" value="{{  $file['path'] }}" id="sl{{  $file['path'] }}" />
                                    <label class="text-center" for="sl{{ $file['path'] }}">
                                        @if($file['extension'] === 'docx')
                                            <a href="/images/private/{{ $file['path'] }}">
                                                <img class="img-fluid" src="/images/icons/docx.jpg" />
                                            </a>
                                        @elseif($file['extension'] === 'pdf')
                                            <a target="_blank" href="/images/private/{{ $file['path'] }}">
                                                <img class="img-fluid" src="/images/icons/pdf-img.png" />
                                            </a>
                                        @else
                                            <a target="_blank" href="/images/private/{{ $file['path'] }}">
                                                <img class="img-fluid" src="/images/private/{{ $file['path'] }}" />
                                            </a>
                                        @endif
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card my-3 py-5">
    <div class="card-body">
        <h5>Application Details</h5>

        <div class="row">
            <div class="col-sm-12">
                <ul class="mt-3 list-unstyled">
                    @foreach($questions as $question)

                        @php $answer = isset($answers) ? $answers->where('question_id', $question->id)->first() : null @endphp

                        <li>
                            <h6 class="py-3 survey-question-title">{{ $question->question }}</h6>
                            @if($question->type === 'text')
                                <div class="form-group">
                                    <textarea class="form-control"
                                              name="survey_q_{{$question->id}}"
                                              rows="10"
                                              placeholder="Type..."
                                    >{{$answer && !empty($answer->body) ? $answer->body : null}}</textarea>
                                </div>
                            @elseif($question->type === 'multi')

                                @php
                                    $fields = $answer ? json_decode($answer->body) : [];
                                @endphp

                                @foreach($fields as $field)
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input value="{{$field[0]}}" type="text" class="form-control" placeholder="Field 1">
                                        </div>
                                        <div class="input-group col-sm-8">
                                            <input value="{{$field[1]}}" type="text" class="form-control" placeholder="Field 2">
                                        </div>
                                    </div>
                                @endforeach
                            @else

                            @endif
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
