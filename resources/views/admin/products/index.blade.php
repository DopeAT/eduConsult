@extends('admin.layouts.app')
@section('title', 'Products Admin Dashboard | EduConsultOrg')
@section('heading', 'Products - Dashboard')

@section('content')

    <div class="row">
        <div class="col-sm-12 mb-2">
            @include('layouts.messages')
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 mb-2">
            <div class="bg-white p-3 d-flex justify-content-between">
                <span class="font-weight-bold">
                    Products
                </span>
{{--                <a href="{{ route('admin.products.create') }}" class="btn-sm btn btn-success"><i class="fas fa-plus"></i> Add Product</a>--}}
            </div>
        </div>

        <div class="col-sm-12">

            <div class="table-responsive bg-white p-3">

                <table id="datatable" class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody class="mb-3">
                    @foreach($data as $product)

                        <tr>
                            <td class="font-weight-bold">{{ $product->id }}</td>
                            <td class="font-weight-bold text-primary">{{ $product->name }}</td>
                            <td>{{ $product->service->name }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.products.edit', $product->id) }}" class="fas fa-pen text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $product->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $product->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this testimonial?</p>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </table>

            </div>

        </div>

    </div>

@endsection
