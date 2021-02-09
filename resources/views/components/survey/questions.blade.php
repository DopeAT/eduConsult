<ul class="mt-3 list-unstyled">
    @foreach($data as $question)
        <li>
            <h5 class="py-3 survey-question-title">{{ $question->question }}</h5>
            @if($question->description)
                {!! $question->description !!}
            @endif
            @if($question->type === 'text')
                <div class="form-group">
                    <textarea class="form-control" disabled name="#" rows="10">Type...</textarea>
                </div>
            @elseif($question->type === 'multi')
                @for($i = 1; $i <= 5; $i++)
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="#" placeholder="Field 1" required disabled>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="#" placeholder="Field 2" required disabled>
                        </div>
                    </div>
                @endfor
            @else

            @endif
        </li>
    @endforeach
</ul>