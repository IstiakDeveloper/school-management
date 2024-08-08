<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    {{-- <h2>Teacher Attendance for {{ $date }}</h2> --}}
    <table>
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Date</th>
                <th>Clock In</th>
                <th>Clock Out</th>
                <th>Absent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teacherAttendance as $attendance)
                <tr>
                    <td>{{ $attendance->teacher->id }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->clock_in ?? '-' }}</td>
                    <td>{{ $attendance->clock_out ?? '-' }}</td>
                    <td>{{ $attendance->absent ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
