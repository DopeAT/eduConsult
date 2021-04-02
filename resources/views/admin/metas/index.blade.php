@extends('admin.layouts.app')
@section('title', 'Metas | SEO - Admin Dashboard | EduConsultOrg')
@section('heading', 'Metas | SEO - Dashboard')

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
                    Metas | SEO
                </span>

                <a href="{{ route('admin.meta.seo.create') }}" class="btn-sm btn btn-success"><i class="fas fa-plus"></i> Add New SEO</a>
            </div>
        </div>

        <div class="col-sm-12">

            <div class="table-responsive bg-white p-3">

                <table id="datatable" class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Page</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($metas as $meta)

                        <tr>
                            <td class="font-weight-bold">{{ $meta->id }}</td>
                            <td class="font-weight-bold text-primary text-capitalize">
                                {{ str_replace('-', ' ', $meta->url) }}
                            </td>
                            <td>
                                <i class="fas {{ !empty($meta->title) ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                            </td>
                            <td>
                                <i class="fas {{ !empty($meta->description) ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                            </td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.meta.seo.edit', $meta->id) }}" class="fas fa-pen text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $meta->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $meta->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $meta->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this page?</p>
                                        <form action="{{ route('admin.meta.seo.destroy', $meta->id) }}" method="POST">
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
