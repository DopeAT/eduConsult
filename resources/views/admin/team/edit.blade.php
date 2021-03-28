@extends('admin.layouts.app')
@section('title', 'Team Admin Dashboard | EduConsultOrg')
@section('heading', 'Team - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Edit Member</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.team.update', $member->id) }}" class="pt-3" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="profession" class="col-md-4 col-form-label text-md-right">Profession</label>

                    <div class="col-md-6">
                        <input id="profession" type="text" class="form-control" name="profession" value="{{ $member->profession }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>

                    <div class="col-md-6">
                        <textarea id="text" type="text" class="form-control" name="text" required autofocus>{{ $member->text }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                    <div class="col-md-6">
                        <div>
                            <img src="/images/team/{{ $member->image }}" alt="" width="170" class="img-thumbnail">
                        </div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection
