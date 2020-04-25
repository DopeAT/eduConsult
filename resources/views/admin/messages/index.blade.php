@extends('admin.layouts.app')
@section('title', 'Inbox Admin Dashboard | EduConsultOrg')
@section('heading', 'Inbox - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row" id="gmail-inbox">

        <div class="col-sm-12">

            <div class="d-flex justify-content-between">
                <h5 class="font-weight-bold">Inbox</h5>

                {{ $messages->links() }}
            </div>



            <table class="table table-hover table-email">
                <tbody>
                    <!--<tr class="unread">-->
                    @foreach($messages as $message)
                        <tr class="tr-row-href" data-href="{{ route('admin.messages.show', $message->id) }}">
                            <td>
                                <div class="checkbox">
                                    <input id="checkbox{{ $message->id }}" type="checkbox" class="mail-checkbox">
                                    <label for="checkbox{{ $message->id }}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="star star-checked">
                                    <i class="fa fa-star"></i>
                                </a>
                            </td>
                            <td>
                                <div class="media">
                                    <a href="#" class="float-left">
                                        <img alt="..." src="https://uybor.uz/borless/uybor/img/user-images/no-avatar.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="text-primary">{{ $message->name }}</h4>
                                        <p class="email-summary">
                                            {{ $message->message }}
                                            {{--<span class="label label-success">New</span>--}}
                                        </p>
                                        <span class="media-meta">{{ $message->created_at->format('d M Y - H:i') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection
