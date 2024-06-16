@extends('layouts.app')

@section('content')
    <h1>Timesheet for {{ $timesheet->date }}</h1>
    <p>Difficulties: {{ $timesheet->difficulties }}</p>
    <p>Next Plan: {{ $timesheet->next_plan }}</p>
    <a href="{{ route('timesheets.edit', $timesheet->id) }}">Edit</a>
    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
