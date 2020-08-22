@extends('admin.layouts.app')
@section('title', 'Discounts Admin Dashboard | EduConsultOrg')
@section('heading', 'Discounts - Dashboard')

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
                    Discounts
                </span>
                <a href="{{ route('admin.discounts.create') }}" class="btn-sm btn btn-success"><i class="fas fa-plus"></i> Add Discount</a>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="table-responsive bg-white p-3">
                <table id="datatable" class="table w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Value</th>
                            <th>Code</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Active</th>
                            <th class="text-right"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $discount)

                            <tr>
                                <td class="font-weight-bold">{{ $discount->id }}</td>
                                <td class="font-weight-bold">{{ $discount->value }}</td>
                                <td class="font-weight-bold text-primary">{{ $discount->code }}</td>
                                <td>{{ $discount->start->format('d M Y') }}</td>
                                <td>{{ $discount->end->format('d M Y') }}</td>
                                <td>
                                    <i class="{{
                                      now()->gte($discount->start) &&
                                      now()->lte($discount->end) ?
                                      'text-success fas fa-check' :
                                      'text-danger fas fa-times'
                                    }}"></i>
                                </td>
                                <td class="text-right">
                                    <a title="Edit" href="{{ route('admin.discounts.edit', $discount->id) }}" class="fas fa-edit text-primary"></a>
                                    <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $discount->id }}" class="fas fa-trash-alt text-danger"></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $discount->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $discount->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <b>{{ $discount->code }}</b> from roles?</p>
                                            <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST">
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
