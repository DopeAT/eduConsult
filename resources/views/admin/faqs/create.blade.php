@extends('admin.layouts.app')
@section('title', 'FAQs Admin Dashboard | EduConsultOrg')
@section('heading', 'FAQs - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Add New FAQ</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.faqs.store') }}" class="pt-3">
                @csrf

                <div class="form-group">
                    <label for="question" class="font-weight-bold">Question</label>
                    <input type="text" class="form-control form-control-sm" id="question" name="question" aria-describedby="questionHelp" placeholder="FAQ Question">
                </div>

                <div class="form-group">
                    <label for="answer" class="font-weight-bold">Answer</label>
                    <textarea class="form-control form-control-sm" name="answer" id="answer" cols="30" rows="10" placeholder="FAQ Answer"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>

    </div>

@endsection
