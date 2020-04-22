@extends('admin.layouts.app')
@section('title', 'Roles Admin Dashboard | MyBetBible')
@section('heading', 'Roles - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white">

            <div class="py-3 px-1">

                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-success"> Add Role </a>

            </div>

            <div class="table-responsive my-3">

                    <table id="datatable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Users</th>
                                <th>Created At</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)

                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->users->count() }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <a title="Edit" href="{{ route('roles.edit', $role->id) }}" class="fas fa-edit text-primary"></a>
                                    <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $role->id }}" class="fas fa-trash-alt text-danger"></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $role->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <b>{{ $role->name }}</b> from roles?</p>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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