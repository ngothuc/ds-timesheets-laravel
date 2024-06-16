@extends('layouts.app')

@section('content')
    <h1>Create Timesheet</h1>
    <form action="{{ route('timesheets.store') }}" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}">
        
        <label for="difficulties">Difficulties:</label>
        <textarea name="difficulties" id="difficulties"></textarea>
        
        <label for="next_plan">Next Plan:</label>
        <textarea name="next_plan" id="next_plan"></textarea>
        
        <button type="submit">Create</button>
    </form>
@endsection
