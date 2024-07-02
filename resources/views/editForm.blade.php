<!DOCTYPE html>
<html>
<head>
    <title>Edit Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form method="POST" action="{{ route('update.form', ['id' => $formData->id]) }}" id="updateForm">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $formData->name) }}"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $formData->email) }}"><br>
        <label for="number">Number:</label><br>
        <input type="text" id="number" name="number" value="{{ old('number', $formData->number) }}"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="{{ old('address', $formData->address) }}"><br>
        <button type="button" onclick="updateFormData()">Update</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function updateFormData() {
            let formData = new FormData(document.getElementById('updateForm'));

            axios.post('{{ route("update.form", ["id" => $formData->id]) }}', formData)
                .then(response => {
                    alert('Form updated successfully!');
                })
                .catch(error => {
                    if (error.response && error.response.status === 422) {
                        let errors = error.response.data.errors;
                        alert('Validation Error: ' + Object.values(errors)[0][0]);
                    } else {
                        alert('An error occurred. Please try again later.');
                    }
                });
        }
    </script>
</body>
</html>
