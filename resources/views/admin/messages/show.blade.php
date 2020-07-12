@extends('admin.layouts.app')
@section('title', 'Inbox Admin Dashboard | EduConsultOrg')
@section('heading', 'Inbox - Dashboard')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-white p-5 inbox-show">

                <div>
                    <a href="/admin/messages" class="back-btn">
                        <i title="" data-placement="bottom" data-toggle="tooltip" class="fas fa-long-arrow-alt-left" data-original-title="Back to Inbox"></i>
                    </a>
                </div>

                <hr>

                <div class="inbox-message">

                    <div class="headers d-flex justify-content-between">

                        <div class="user">
                            <img src="https://uybor.uz/borless/uybor/img/user-images/no-avatar.png" class="img-fluid rounded-circle">
                            <svg><circle cx="10" cy="10" r="4"></circle></svg>
                            <span class="font-weight-bold pl-2">{{ $message->name }}</span> -
                            <span class="email font-weight-bold"> &lt;{{ $message->email }}&gt; </span>
                        </div>
                        <div class="time">
                            <i class="fas fa-clock"></i> {{ $message->created_at->format('d M Y - H:i') }}
                        </div>

                    </div>

                    <hr>

                    <div class="body">
                        <div class="content">{{ $message->message }}</div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
