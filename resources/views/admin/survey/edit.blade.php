@extends('admin.layouts.app')
@section('title', 'Edit Survey Admin Dashboard | EduConsultOrg')
@section('heading', 'Edit Survey - Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 bg-white py-5">

            @include('layouts.messages')

            <form method="POST" action="{{ route('admin.survey.update', $data->id) }}">
                @csrf
                @method('PUT')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="question" class="font-weight-bold">Question</label>
                                <input type="text" class="form-control form-control-sm" id="question" name="question" required value="{{ $data->question }}">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Question Description</label>
                                <textarea class="form-control form-control-sm mytextarea" id="description" name="description" rows="15" value="{{ $data->description }}"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="question_num" class="font-weight-bold">Question Number</label>
                                <select name="question_num" id="question_num" class="form-control form-control-sm">
                                    @for($i = 1; $i <= count($questions); $i++)
                                        <option {{ $data->question_num == $i ? 'selected' : null }}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="level" class="font-weight-bold">Level</label>
                                <select name="level" id="level" class="form-control form-control-sm">
                                    @foreach($levels as $level)
                                        <option value="{{ strtolower($level) }}" {{ $data->level == strtolower($level) ? 'selected' : null }}>{{$level}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="font-weight-bold">Question Number</label>
                                <select name="type" id="type" class="form-control form-control-sm">
                                    @foreach($types as $type)
                                        <option value="{{ strtolower($type) }}" {{ $data->type == strtolower($type) ? 'selected' : null }}>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection
