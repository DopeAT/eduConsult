@extends('admin.layouts.app')
@section('title', 'Team Admin Dashboard | EduConsultOrg')
@section('heading', 'Team - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white mb-5">
            <div class="py-3 px-1 d-flex justify-content-between">
                <h5 class="font-weight-bold">Team</h5>

                <a href="{{ route('admin.team.create') }}" class="btn btn-sm btn-success"> Add Team Member </a>
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
                    @foreach($team as $member)

                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->profession }}</td>
                            <td>{{ $member->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.team.edit', $member->id) }}" class="fas fa-pen text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $member->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $member->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this member?</p>
                                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST">
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
