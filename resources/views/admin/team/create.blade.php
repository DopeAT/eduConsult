@extends('admin.layouts.app')
@section('title', 'Team Admin Dashboard | EduConsultOrg')
@section('heading', 'Team - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New Member</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.team.store') }}" class="pt-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="profession" class="col-md-4 col-form-label text-md-right">Profession</label>

                    <div class="col-md-6">
                        <input id="profession" type="text" class="form-control" name="profession" value="{{ old('profession') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label text-md-right">Text</label>

                    <div class="col-md-6">
                        <textarea id="text" type="text" class="form-control" name="text" required autofocus>{{ old('text') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <input id="image" type="file" name="image" required>
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
