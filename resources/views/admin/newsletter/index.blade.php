@extends('admin.layouts.app')
@section('title', 'Newsletter Admin Dashboard | EduConsultOrg')
@section('heading', 'Newsletter - Dashboard')

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
                    Newsletter Data
                </span>

                <a href="#" class="btn-sm btn btn-success" data-toggle="modal" data-target="#exportNewsletterModal">
                    <i class="fas fa-download"></i> Export Newsletter Excel
                </a>
            </div>

            <div class="modal fade" id="exportNewsletterModal" tabindex="-1" role="dialog" aria-labelledby="exportNewsletterModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Export Newsletter into Excel File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.newsletter.export') }}" method="POST" >

                                @csrf

                                <h6 class="font-weight-bold">Filters:</h6>

                                <div class="d-flex justify-content-between align-items-center px-4 mb-3">

                                    <label class="form-check-label">
                                        <input class="form-control form-control-sm"  id="txtFromDate" name="date_from" placeholder="Date From" />
                                    </label>

                                    <label class="form-check-label">
                                        <input class="form-control form-control-sm" id="txtToDate" name="date_to" placeholder="Date To" />
                                    </label>

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
                        <th>Email</th>
                        <th>Created</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="font-weight-bold">{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $user->id }}" class="fas fa-trash-alt text-danger"></a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this user?</p>
                                        <form action="{{ route('admin.newsletter.destroy', $user->id) }}" method="POST">
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
