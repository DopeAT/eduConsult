@extends('admin.layouts.app')
@section('title', 'FAQs Admin Dashboard | EduConsultOrg')
@section('heading', 'FAQs - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white mb-5">
            <div class="py-3 px-1 d-flex justify-content-between">
                <h5 class="font-weight-bold">FAQs</h5>

                <a href="{{ route('admin.faqs.create') }}" class="btn btn-sm btn-success"> Add Faq </a>
            </div>

            @include('layouts.messages')
        </div>

        <div class="col-sm-12 bg-white">

            <div class="table-responsive my-3 py-3">

                <table id="datatable" class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faqs as $faq)

                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>{{ $faq->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Edit" href="{{ route('admin.faqs.edit', $faq->id) }}" class="fas fa-pen text-primary mr-2"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $faq->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $faq->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this FAQ?</p>
                                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST">
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
