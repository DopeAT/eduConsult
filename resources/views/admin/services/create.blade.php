@extends('admin.layouts.app')
@section('title', 'Services Admin Dashboard | EduConsultOrg')
@section('heading', 'Services - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New Service</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.services.store') }}" class="pt-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="intro" class="col-md-4 col-form-label text-md-right">Intro</label>

                    <div class="col-md-6">
                        <input id="intro" type="text" class="form-control" name="intro" value="{{ old('intro') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                    <div class="col-md-6">
                        <textarea class="form-control form-control-sm" name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Header Image</label>

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
