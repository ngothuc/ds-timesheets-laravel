@extends('layouts.app')

@section('content')
    <h1>Timesheets</h1>
    <a href="{{ route('timesheets.create') }}">Create New Timesheet</a>
    <ul>
        @foreach($timesheets as $timesheet)
            <li>
                <a href="{{ route('timesheets.show', $timesheet->id) }}">
                    {{ $timesheet->date }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection