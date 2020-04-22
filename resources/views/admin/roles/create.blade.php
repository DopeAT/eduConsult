    @extends('admin.layouts.app')
    @section('title', 'Roles Admin Dashboard | MyBetBible')
    @section('heading', 'Roles - Dashboard')

    @section('content')

        <!-- Content Row -->
        <div class="row">

            <div class="col-sm-12 bg-white py-5">

                @include('layouts.messages')

                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Role</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="roleHelp" placeholder="Role">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>

    @endsection