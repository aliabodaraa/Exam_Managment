@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new course</h1>
        <div class="lead">
            Add new course .
        </div>
        <div class="container mt-4">
            @if ($message = Session::get('retryEntering'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form method="POST" action="{{route('courses.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="course_name" class="form-label">course_name</label>
                    <input value="{{ old('course_name') }}"
                        type="text"
                        class="form-control"
                        name="course_name"
                        placeholder="course_name" required>
                    @if ($errors->has('course_name'))
                        <span class="text-danger text-left">{{ $errors->first('course_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Studing Year :</label>
                    <select class="form-control" name="studing_year" class="form-control" required>
                            <option value='1'>First Year</option>
                            <option value='2'>Secound Year</option>
                            <option value='3'>Third Year</option>
                            <option value='4'>Fourth Year</option>
                            <option value='5'>Fifth Year</option>
                    </select>
                    @if ($errors->has('studing_year'))
                        <span class="text-danger text-left">{{ $errors->first('studing_year') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Semester :</label>
                    <select class="form-control" name="semester" class="form-control" required>
                            <option value='1'>First Semester</option>
                            <option value='2'>Secound Semester</option>
                    </select>
                    @if ($errors->has('semester'))
                        <span class="text-danger text-left">{{ $errors->first('semester') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input value="{{ old('date') }}"
                        type="date"
                        class="form-control"
                        name="date"
                        placeholder="date" required>
                    @if ($errors->has('date'))
                        <span class="text-danger text-left">{{ $errors->first('date') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">time</label>
                    <input value="{{ old('time') }}"
                        type="time"
                        class="form-control"
                        name="time"
                        placeholder="time" required>
                    @if ($errors->has('time'))
                        <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save course</button>
                {{-- <a href="{{ route('courses.index') }}" class="btn btn-default">Back</a> --}}
            </form>
        </div>

    </div>
@endsection
