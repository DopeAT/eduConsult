@extends('admin.layouts.app')
@section('title', 'Roles Admin Dashboard | EduConsultOrg')
@section('heading', 'Roles - Dashboard')

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
                    Roles
                </span>
                <a href="{{ route('admin.roles.create') }}" class="btn-sm btn btn-success"><i class="fas fa-plus"></i> Add Role</a>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="table-responsive bg-white p-3">
                <table id="datatable" class="table w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Users</th>
                            <th class="text-right"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)

                            <tr>
                                <td class="font-weight-bold">{{ $role->id }}</td>
                                <td class="font-weight-bold text-primary">{{ $role->name }}</td>
                                <td>{{ $role->users->count() }}</td>
                                <td class="text-right">
                                    <a title="Edit" href="{{ route('admin.roles.edit', $role->id) }}" class="fas fa-edit text-primary"></a>
                                    <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $role->id }}" class="fas fa-trash-alt text-danger"></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $role->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <b>{{ $role->name }}</b> from roles?</p>
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
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
