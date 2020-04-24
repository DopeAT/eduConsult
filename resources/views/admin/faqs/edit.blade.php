@extends('admin.layouts.app')
@section('title', 'FAQs Admin Dashboard | EduConsultOrg')
@section('heading', 'FAQs - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-2">

            <h5 class="font-weight-bold">Edit FAQ</h5>
            <hr>

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}" class="pt-3">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="question" class="font-weight-bold">Question</label>
                    <input type="text" class="form-control form-control-sm" id="question" name="question" aria-describedby="questionHelp" value="{{ $faq->question }}">
                </div>

                <div class="form-group">
                    <label for="answer" class="font-weight-bold">Answer</label>
                    <textarea class="form-control form-control-sm" name="answer" id="answer" cols="30" rows="10" placeholder="FAQ Answer">{!! $faq->answer !!}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>

        </div>

    </div>

@endsection
