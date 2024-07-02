<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Stored Data</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">Stored Data</div>
                <div class="card-body">
                    @foreach($formData as $data)
                        <p><strong>Name:</strong> {{ $data->name }}</p>
                        <p><strong>Email:</strong> {{ $data->email }}</p>
                        <p><strong>Number:</strong> {{ $data->number ?? 'Not provided' }}</p>
                        <p><strong>Address:</strong> {{ $data->address ?? 'Not provided' }}</p>
                        <p><strong>Created At:</strong> {{ $data->created_at->format('Y-m-d H:i:s') }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
