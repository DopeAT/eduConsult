@extends('admin.layouts.app')
@section('title', 'Product Admin Dashboard | EduConsultOrg')
@section('heading', 'Product - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New Product</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.products.store') }}" class="pt-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="service_id" class="col-md-4 col-form-label text-md-right">Service</label>

                    <div class="col-md-6">
                        <select name="service_id" id="service_id" class="form-control" required>
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div id="productPrice"></div>


                <div class="form-group row">
                    <label for="intro" class="col-md-4 col-form-label text-md-right">Intro</label>

                    <div class="col-md-6">
                        <input id="intro" type="text" class="form-control" name="intro" value="{{ old('intro') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label text-md-right">Description</label>
                    <div class="col-md-6">
                        <textarea class="form-control form-control-sm" name="body" id="body" cols="30" rows="10" placeholder="Description">{!! old('body') !!}</textarea>
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

@section('scripts')

<script>
    let service = $('#service_id');
    let productPrice = $('#productPrice');


    function createNewEditPriceBlock() {

        productPrice.html(`

            <div class="form-group row">
                <label for="prices" class="col-md-4 col-form-label text-md-right">Prices</label>
                <div class="col-md-3">
                    <input id="new" type="number" name="new" placeholder="New" required autofocus>
                </div>
                <div class="col-md-3">
                    <input id="edit" type="number" name="edit" placeholder="Edit" required autofocus>
                </div>
            </div>

        `);
    }

    function createSinglePriceBlock() {
        productPrice.html(`

            <div class="form-group row">
                <label for="prices" class="col-md-4 col-form-label text-md-right">Price</label>
                <div class="col-md-6">
                    <input id="new" type="text" class="form-control" name="new" placeholder="Price" required autofocus>
                </div>
            </div>

        `);
    }

    service.on('change', function() {
        let id = $(this).val();

        if(id == 1) {
            createNewEditPriceBlock();
        } else {
            createSinglePriceBlock();
        }
    })

</script>

@endsection
