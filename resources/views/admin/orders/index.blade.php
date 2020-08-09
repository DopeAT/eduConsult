@extends('admin.layouts.app')
@section('title', 'Orders Admin Dashboard | EduConsultOrg')
@section('heading', 'Orders - Dashboard')

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
                    Orders
                </span>
            </div>
        </div>

        <div class="col-sm-12">

            <div class="table-responsive bg-white p-3">

                <table id="datatable" class="table w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Id</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Created</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $order)

                        <tr>
                            <td class="font-weight-bold">{{ $order->id }}</td>
                            <td class="font-weight-bold text-primary">{{ $order->payment_id }}</td>
                            <td>{{ $order->user->fullname() }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->service->name }}</td>
                            <td>{{ $order->payment->amount }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Show" href="{{ route('admin.orders.show', $order->id) }}" class="fas fa-eye text-primary mr-3"></a>
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $order->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $order->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this payment?</p>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
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
