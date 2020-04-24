@extends('admin.layouts.app')
@section('title', 'Edit Role Admin Dashboard | EduConsultOrg')
@section('heading', 'Edit Role - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-5">

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Role</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="roleHelp" value="{{ $role->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>

    </div>

@endsection
