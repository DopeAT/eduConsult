@extends('admin.layouts.app')
@section('title', 'Metas | SEO - Admin Dashboard | EduConsultOrg')
@section('heading', 'Metas | SEO - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New Page</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.meta.seo.store') }}" class="pt-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="url" class="col-md-2 col-form-label text-md-right">Url</label>

                    <div class="col-md-8">
                        <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Create
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection
