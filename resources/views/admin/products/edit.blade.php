@extends('admin.layouts.app')
@section('title', 'Product Admin Dashboard | EduConsultOrg')
@section('heading', 'Product - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Edit Product</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.products.update', $data->id) }}" class="pt-3" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="service_id" class="col-md-4 col-form-label text-md-right">Service</label>

                    <div class="col-md-6">
                        <select name="service_id" id="service_id" class="form-control" required>
                            @foreach($services as $service)
                                <option value="{{$service->id}}" {{ $service->id === $data->service_id ? 'selected' : null }}>{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="productPrice">
                    @if($data->service_id == 1)
                        <div class="form-group row">
                            <label for="prices" class="col-md-4 col-form-label text-md-right">Prices</label>
                            <div class="col-md-3">
                                <input id="new" type="number" name="new" value="{{$data->new}}" required autofocus>
                            </div>
                            <div class="col-md-3">
                                <input id="edit" type="number" name="edit" value="{{$data->edit}}" required autofocus>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <label for="prices" class="col-md-4 col-form-label text-md-right">Price</label>
                            <div class="col-md-6">
                                <input id="new" type="text" class="form-control" name="new" value="{{$data->new}}" required autofocus>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="intro" class="col-md-4 col-form-label text-md-right">Intro</label>

                    <div class="col-md-6">
                        <input id="intro" type="text" class="form-control" name="intro" value="{{ $data->intro }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <textarea class="form-control form-control-sm mytextarea" name="body" id="body" cols="30" rows="10">{!! $data->body !!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                    <div class="col-md-6">
                        <div>
                            <img src="/images/products/{{ $data->header_image }}" alt="" width="170" class="img-thumbnail">
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
