@extends('admin.layouts.app')
@section('title', 'FAQs Admin Dashboard | EduConsultOrg')
@section('heading', 'FAQs - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white mb-5">
            <div class="py-3 px-1 d-flex justify-content-between">
                <h5 class="font-weight-bold">{{ $_GET['type'] === 1 ? 'Administrators' : 'Customers' }}</h5>

                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-success"> Add Admin User </a>
            </div>

            @include('layouts.messages')
        </div>

        <div class="col-sm-12 bg-white">

            <div class="table-responsive my-3 py-3">

                <table id="datatable" class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->fullname() }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="d-flex">

                                @if($user->role_id === 1)
                                    <a title="Remove Admin Right" href="#" data-toggle="modal" data-target="#removeAdmin{{ $user->id }}" class="fas fa-user-times mr-3"></a>
                                @endif

                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $user->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this user?</p>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Remove Admin Modal -->
                        @if($user->role_id === 1)
                            <div class="modal fade" id="removeAdmin{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="removeAdmin{{ $user->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this user as admin?</p>
                                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="admin_remove" value="1">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Proceed</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </table>

            </div>

        </div>

    </div>

@endsection
