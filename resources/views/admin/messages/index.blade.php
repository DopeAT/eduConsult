@extends('admin.layouts.app')
@section('title', 'Inbox Admin Dashboard | EduConsultOrg')
@section('heading', 'Inbox - Dashboard')

@section('content')

    <div class="row">
        <div class="col-sm-12 mb-2">
            @include('admin.layouts.messages')
        </div>
    </div>


    <div class="row" id="gmail-inbox">
        <div class="col-sm-12">
            <div class="table-responsive bg-white p-3">

                <div class="bg-white p-3">

                    <div class="contact-header d-flex justify-content-between">

                        <h6 class="font-weight-bold">Inbox ({{ $messages->total() }})</h6>

{{--                        <div class="w-25 input-group input-group-sm">--}}
{{--                            <input class="form-control py-2 border-right-0 border" type="search" name="message" placeholder="Search Inbox..." id="messageSearch">--}}
{{--                            <span class="input-group-append">--}}
{{--                            <button class="btn btn-outline-secondary border-left-0 border" type="button">--}}
{{--                                <i class="fas fa-search"></i>--}}
{{--                            </button>--}}
{{--                        </span>--}}
{{--                        </div>--}}

                    </div>

                    <hr>

                    <table class="table table-hover table-inbox">
                        <tbody id="mailboxTableBody">
                        @foreach($messages as $message)
                            <tr class="{{ $message->is_new ? 'unread' : null }}" onclick="window.location='{{ route('admin.messages.show', $message->id) }}'">
                                <td>
                                    @if( $message->is_new )
                                        <div class="new-inbox badge badge-success font-weight-bold">New</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="star star-checked">
                                        <i class="fas fa-star"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="media">
                                        <a href="{{ route('admin.messages.show', $message->id) }}" class="float-left mr-3">
                                            <img src="/images/user.png" class="media-object rounded-circle">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="text-primary">{{ $message->name }}</h4>
                                            <p class="email-summary">
                                                @if(strlen($message->message) > 175)
                                                    {!! substr($message->message, 0, 175).'... <b class="text-primary">More</b>' !!}
                                                @else
                                                    {!! $message->message !!}
                                                @endif
                                            </p>
                                            <span class="media-meta">{{ $message->created_at->format('d M Y - H:i') }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $messages->links() }}


                </div>

            </div>
        </div>
    </div>

@endsection
