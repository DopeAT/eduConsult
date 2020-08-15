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

                <a href="#" class="btn-sm btn btn-success" data-toggle="modal" data-target="#exportOrdersModal">
                    <i class="fas fa-download"></i> Export Orders Excel
                </a>
            </div>

            <div class="modal fade" id="exportOrdersModal" tabindex="-1" role="dialog" aria-labelledby="exportOrdersModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Export Orders into Excel File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.orders.export') }}" method="POST" >

                                @csrf


                                <h6 class="font-weight-bold">Filters:</h6>

                                <div class="d-flex justify-content-between align-items-center px-4">

                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="allEmpty" name="allEmpty" checked>All
                                    </label>

                                    <label class="form-check-label">
                                        <input class="form-control form-control-sm"  id="txtFromDate" name="date_from" />
                                    </label>

                                    <label class="form-check-label">
                                        <input class="form-control form-control-sm" id="txtToDate" name="date_to" />
                                    </label>

                                </div>

                                <hr>

                                <h6 class="font-weight-bold">Fields:</h6>

                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="payment_id" name="fields[]" checked>Payment Id
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="full_name" name="fields[]" checked>Full Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="service" name="fields[]" checked>Service
                                            </label>
                                        </div></div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="product" name="fields[]" checked>Products
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="price" name="fields[]" checked>Price
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-check-inline disabled">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input db_fields" value="created_at" name="fields[]" checked>Date
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-success">Export</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
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

@section('scripts')
    <script>
        $(document).ready(function () {

            let checkUncheck = $('#allEmpty');

            $("#txtFromDate").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: 1,
                //startDate: new Date(),
                todayHighlight: false,
                //endDate: new Date()
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#txtToDate').datepicker('setStartDate', minDate);
                $("#txtToDate").val($("#txtFromDate").val());
                $(this).datepicker('hide');
            });

            $("#txtToDate").datepicker({
                format: 'dd/mm/yyyy',
                todayHighlight: true,
                //endDate: new Date()
            }).on('changeDate', function (selected) {
                $(this).datepicker('hide');
            });


            checkUncheck.on('change', function() {
                $('.db_fields').prop('checked', $(this).is(':checked'));
            });
        });
    </script>
@endsection
