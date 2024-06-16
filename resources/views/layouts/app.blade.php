<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheet Management</title>
</head>
<body>
    <div>
        <a href="{{ route('timesheets.index') }}">Home</a>
        <a href="{{ route('timesheets.create') }}">Create Timesheet</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>