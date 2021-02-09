@extends('admin.layouts.app')
@section('title', 'Survey Admin Dashboard | EduConsultOrg')
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
                    Survey Questions
                </span>
                <a href="{{ route('admin.survey.create') }}" class="btn-sm btn btn-success"><i class="fas fa-plus"></i> Add Survey Question</a>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="table-responsive bg-white p-3">
                <table id="datatable" class="table w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Level</th>
                            <th>Type</th>
                            <th class="text-right"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $survey)

                            <tr>
                                <td class="font-weight-bold">{{ $survey->id }}</td>
                                <td class="font-weight-bold text-primary">{{ $survey->question }}</td>
                                <td>{{ $survey->level }}</td>
                                <td>{{ $survey->type }}</td>
                                <td class="text-right">
                                    <a title="Edit" href="{{ route('admin.survey.edit', $survey->id) }}" class="fas fa-edit text-primary"></a>
                                    <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $survey->id }}" class="fas fa-trash-alt text-danger"></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $survey->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $survey->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <b>{{ $survey->question }}</b> from survey?</p>
                                            <form action="{{ route('admin.survey.destroy', $survey->id) }}" method="POST">
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
