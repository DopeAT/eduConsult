@extends('admin.layouts.app')
@section('title', 'Testimonials Admin Dashboard | EduConsultOrg')
@section('heading', 'Testimonials - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Edit Testimonial</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.testimonials.update', $data->id) }}" class="pt-3" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                    <div class="col-md-6">
                        <input id="role" type="text" class="form-control" name="role" value="{{ $data->role }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stars" class="col-md-4 col-form-label text-md-right">Stars</label>

                    <div class="col-md-6">
                        <input id="stars" type="number" class="form-control" name="stars" value="{{ $data->stars }}" required step="0.50" max="5.00">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>

                    <div class="col-md-6">
                        <input id="message" maxlength="191" type="text" class="form-control" name="message" value="{{ $data->message }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                    <div class="col-md-6">
                        <div>
                            <img src="/images/testimonials/{{ $data->image }}" alt="" width="170" class="img-thumbnail">
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
