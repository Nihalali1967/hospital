<!DOCTYPE html>
<html>
<head>
    <title>Form Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <form id="postForm">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="number">Number:</label><br>
        <input type="text" id="number" name="number" value="{{ old('number') }}"><br>
        @error('number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="{{ old('address') }}"><br>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="button" id="submitForm">Submit</button>
    </form>
    
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submitForm').on('click', function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('process.form') }}",
                    type: 'POST',
                    data: $('#postForm').serialize(),
                    success: function (data) {
                        alert('Form submitted successfully!');
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>
