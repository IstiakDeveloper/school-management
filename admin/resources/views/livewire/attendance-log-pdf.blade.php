<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Logs PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .highlight {
            background-color: #ffeb3b;
            color: #000;
        }
    </style>
</head>
<body>
    <h2>Attendance Logs</h2>
    <p>For Mousumi Head Office</p>
    <table>
        <thead>
            <tr>
                <th>UID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log['uid'] }}</td>
                    <td>{{ $log['user_id'] }}</td>
                    <td>{{ $log['name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($log['clock_in'] ?? $log['clock_out'])->format('Y-m-d') }}</td>
                    <td class="highlight">{{ \Carbon\Carbon::parse($log['clock_in'] ?? $log['clock_out'])->format('H:i:s') }}</td>
                    <td>{{ $log['clock_in'] ? 'Clock In' : 'Clock Out' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
