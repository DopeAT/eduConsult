@extends('admin.layouts.app')
@section('title', 'Partners Admin Dashboard | EduConsultOrg')
@section('heading', 'Partners - Dashboard')

@section('styles')
    <style>
        .logos input[type="radio"][id^="sl"] {
            display: none;
        }
        .logos label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .logos label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }
        .logos ul li img {
            margin: 5px 0;
        }
        .logos label img {
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }
        .logos label .actions {
            display: none;
        }

        .logos :checked + label {
            border-color: #ddd;
        }
        .logos :checked + label:before {
            content: "✓";
            background-color: #1cc88a;
            transform: scale(1);
        }
        .logos label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid #1cc88a;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }
        .logos :checked + label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
        }

        .logos :checked + label .actions {
            display: block;!important;
        }
    </style>
@endsection

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
                    Partners
                </span>

                <a href="#" class="btn-sm btn btn-success" data-toggle="modal" data-target="#partnerAddModal">
                    <i class="fas fa-plus-circle"></i> Add Partner
                </a>
            </div>

            <div class="modal fade" id="partnerAddModal" tabindex="-1" role="dialog" aria-labelledby="partnerAddModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Add Partner University</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.partners.store') }}" class="pt-3" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                    <div class="col-md-10">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-2 col-form-label text-md-right">Image</label>

                                    <div class="col-md-10">
                                        <input id="image" type="file" name="image" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-success">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="bg-white p-3">
                <div class="container-fluid">
                    <ul class="row list-unstyled logos">
                        @foreach ($partners as $partner)
                            <li class="col-sm-3">
                                <input type="radio" name="partner_logo" value="{{ $partner->image }}" id="sl{{ $partner->image }}" />
                                <label class="text-center" for="sl{{ $partner->image }}">
                                    <img class="img-fluid" src="/images/logos/{{ $partner->image }}" />
                                    <div class="actions mt-2">
                                        <a title="Edit" href="#" data-toggle="modal" data-target="#edit{{ $partner->id }}" class="fas fa-edit text-primary mr-3"></a>
                                        <a title="Delete" href="#" data-toggle="modal" data-target="#delete{{ $partner->id }}" class="fas fa-trash-alt text-danger"></a>
                                    </div>
                                </label>
                            </li>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="edit{{ $partner->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" class="pt-3" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                                    <div class="col-md-10">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ $partner->name }}" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="image" class="col-md-2 col-form-label text-md-right">Image</label>

                                                    <div class="col-md-10">
                                                        <img src="/images/logos/{{ $partner->image }}" alt="" class="img-fluid img-thumbnail mb-2">
                                                        <input id="image" type="file" name="image" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $partner->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this partner?</p>
                                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST">
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
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection
