@extends('layouts.app')

@section('content')
    <h1>Edit Timesheet</h1>
    <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ $timesheet->date }}">
        
        <label for="difficulties">Difficulties:</label>
        <textarea name="difficulties" id="difficulties">{{ $timesheet->difficulties }}</textarea>
        
        <label for="next_plan">Next Plan:</label>
        <textarea name="next_plan" id="next_plan">{{ $timesheet->next_plan }}</textarea>
        
        <button type="submit">Update</button>
    </form>
@endsection
