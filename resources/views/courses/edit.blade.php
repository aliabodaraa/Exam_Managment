@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update Course</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('courses.update', $course->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Course Name</label>
                    <input value="{{ $course->course_name }}"
                        type="text"
                        class="form-control"
                        name="course_name"
                        placeholder="Email address" required>
                    @if ($errors->has('course_name'))
                        <span class="text-danger text-left">{{ $errors->first('course_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="studing_year" class="form-label">Studing Year :</label>
                    <select class="form-control" name="studing_year" class="form-control" required>
                            <option value="1" {{ ($course->studing_year == 1) ? 'selected': '' }}>First Year</option>
                            <option value="2" {{ ($course->studing_year == 2) ? 'selected': '' }}>Secound Year</option>
                            <option value="3" {{ ($course->studing_year == 3) ? 'selected': '' }}>Third Year</option>
                            <option value="4" {{ ($course->studing_year == 4) ? 'selected': '' }}>Fourth Year</option>
                            <option value="5" {{ ($course->studing_year == 5) ? 'selected': '' }}>Fifth Year</option>
                    </select>
                    @if ($errors->has('studing_year'))
                        <span class="text-danger text-left">{{ $errors->first('studing_year') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="room_id" class="form-label">room name :</label>
                    <select class="form-control" name="room_id" class="form-control" required>
                        @foreach(App\Models\Room::all() as $room)
                            <option value="{{$room->id}}" {{ ($course->rooms[0]->pivot->room_id == $room->id) ? 'selected': '' }}>{{$room->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('room_id'))
                        <span class="text-danger text-left">{{ $errors->first('room_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="roomHead_id" class="form-label">roomHead name :</label>
                    <select class="form-control" name="roomHead_id" class="form-control" required>
                        @foreach(App\Models\User::all() as $user)
                        @if($user->hasRole('Room-Head'))
                            <option value="{{$user->id}}" {{ ($course->rooms[2]->pivot->user_id == $user->id) ? 'selected': '' }}>{{$user->username}}</option>
                        @endif
                        @endforeach
                    </select>
                    @if ($errors->has('roomHead_id'))
                        <span class="text-danger text-left">{{ $errors->first('roomHead_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="secertary_id" class="form-label">secertary name :</label>
                    <select class="form-control" name="secertary_id" class="form-control" required>
                        @foreach(App\Models\User::all() as $user)
                        @if($user->hasRole('Secertary'))
                            <option value="{{$user->id}}" {{ ($course->rooms[0]->pivot->user_id == $user->id) ? 'selected': '' }}>{{$user->username}}</option>
                        @endif
                        @endforeach
                    </select>
                    @if ($errors->has('secertary_id'))
                        <span class="text-danger text-left">{{ $errors->first('secertary_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="observer_id" class="form-label">observer name :</label>
                    <select class="form-control" name="observer_id" class="form-control" required>
                        @foreach(App\Models\User::all() as $user)
                        @if($user->hasRole('Employee'))
                            <option value="{{$user->id}}" {{ ($course->rooms[1]->pivot->user_id == $user->id) ? 'selected': '' }}>{{$user->username}}</option>
                        @endif
                        @endforeach
                    </select>
                    @if ($errors->has('observer_id'))
                        <span class="text-danger text-left">{{ $errors->first('observer_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input value="{{$course->rooms[0]->pivot->date}}"
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
                    <input value="{{$course->rooms[0]->pivot->time}}"
                        type="time"
                        class="form-control"
                        name="time"
                        placeholder="time" required>
                    @if ($errors->has('time'))
                        <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection