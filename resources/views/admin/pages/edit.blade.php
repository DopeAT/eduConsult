@extends('admin.layouts.app')
@section('title', 'Pages Admin Dashboard | EduConsultOrg')
@section('heading', 'Pages - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Edit {{ $data->title }}</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.pages.update', $data->id) }}" class="pt-3" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $data->title }}" required autofocus>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="body" class="col-md-2 col-form-label text-md-right">Body</label>

                    <div class="col-md-8">
                        <textarea class="form-control form-control-sm mytextarea" name="body" id="body" cols="30" rows="10">{!! $data->body !!}</textarea>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection
