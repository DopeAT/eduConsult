@extends('admin.layouts.app')
@section('title', 'Services Admin Dashboard | EduConsultOrg')
@section('heading', 'Services - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white mb-5">
            <div class="py-3 px-1 d-flex justify-content-between">
                <h5 class="font-weight-bold">Services</h5>

                <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-success"> Add Service </a>
            </div>

            @include('layouts.messages')
        </div>

        <div class="col-sm-12 bg-white">

            <div class="table-responsive my-3 py-3">

                <table id="datatable" class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Products</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $service)

                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td></td> <!--{ $service->products->count() }-->
                            <td>{{ $service->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.services.edit', $service->id) }}" class="fas fa-pen text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $service->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $service->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this testimonial?</p>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
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
