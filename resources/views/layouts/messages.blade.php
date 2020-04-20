@if($errors->any())

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>

@endif

@if(session()->has('error'))

    {!! errorMsg(session()->get('error')) !!}

    {{--<div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span>--}}
        {{--</button>--}}
        {{--<strong>{{  }}</strong>--}}
    {{--</div>--}}

@endif

@if(session()->has('success'))

    {!! successMsg(session()->get('success'))  !!}

    {{--<div class="alert alert-success alert-dismissible fade show" role="alert">--}}
        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span>--}}
        {{--</button>--}}
        {{--<strong>{{ session()->get('success') }}</strong>--}}
    {{--</div>--}}

@endif