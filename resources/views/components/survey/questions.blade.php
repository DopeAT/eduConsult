<ul class="mt-3 list-unstyled">
    @foreach($data as $question)

        @php $answer = isset($answers) ? $answers->where('question_id', $question->id)->first() : null @endphp

        <li>
            <h5 class="py-3 survey-question-title">{{ $question->question }}</h5>
            @if($question->description)
                {!! $question->description !!}
            @endif
            @if($question->type === 'text')
                <div class="form-group">
                    <textarea class="form-control"
                              {{$disabled ? 'disabled' : null}}
                              name="survey_q_{{$question->id}}"
                              rows="10"
                              placeholder="Type...">{{$answer && !empty($answer->body) ? $answer->body : null}}</textarea>
                </div>
            @elseif($question->type === 'multi')

                @php
                    $i = 0;
                    $fields = $answer ? json_decode($answer->body) : [];
                @endphp

                @forelse($fields as $field)

                    @php $i++ @endphp

                    <div class="form-group row {{$i > 1 ? 'removeField'.$question->id : null}}" id="numQ{{$question->id}}">
                        <div class="col-sm-4">
                            <input value="{{$field[0]}}" type="text" class="form-control" name="survey_q_{{$question->id}}[{{$i}}][]" placeholder="Field 1" {{$disabled ? 'disabled' : null}}>
                        </div>
                        <div class="input-group col-sm-8">
                            <input value="{{$field[1]}}" type="text" class="form-control" name="survey_q_{{$question->id}}[{{$i}}][]" placeholder="Field 2" {{$disabled ? 'disabled' : null}}>
                            @if (!$disabled && $i === 1)
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-add" type="button" onclick="fields({{$question->id}})">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </span>
                            @else
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" onclick="removeFields({{$question->id}})">
                                        <span class="fas fa-minus"></span>
                                    </button>
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="form-group row" id="numQ{{$question->id}}">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="survey_q_{{$question->id}}[1][]" placeholder="Field 1" {{$disabled ? 'disabled' : null}}>
                        </div>
                        <div class="input-group col-sm-8">
                            <input type="text" class="form-control" name="survey_q_{{$question->id}}[1][]" placeholder="Field 2" {{$disabled ? 'disabled' : null}}>
                            @if (!$disabled)
                                <span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button" onclick="fields({{$question->id}})">
                                <span class="fas fa-plus"></span>
                            </button>
                        </span>
                            @endif
                        </div>
                    </div>
                @endforelse

                <div id="fields{{$question->id}}">

                </div>
            @else

            @endif
        </li>
    @endforeach
</ul>
