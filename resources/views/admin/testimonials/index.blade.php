@extends('admin.layouts.app')
@section('title', 'Testimonials Admin Dashboard | EduConsultOrg')
@section('heading', 'Testimonials - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white mb-5">
            <div class="py-3 px-1 d-flex justify-content-between">
                <h5 class="font-weight-bold">Testimonials</h5>

                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm btn-success"> Add Testimonial </a>
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
                        <th>Role</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.testimonials.edit', $user->id) }}" class="fas fa-pen text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $user->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this testimonial?</p>
                                        <form action="{{ route('admin.testimonials.destroy', $user->id) }}" method="POST">
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
