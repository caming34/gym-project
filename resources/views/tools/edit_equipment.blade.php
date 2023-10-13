<!DOCTYPE html>
<html>

<head>
    <title>Edit Equipment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container my-5">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <div class="container mt-5">
            <h2>Edit Equipment</h2>
            <form action="{{ action('App\Http\Controllers\EquipmentController@update', $tmp['id']) }}" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group">
                    <label for="u_image">Image:</label>
                    <input type="file" class="form-control-file" id="u_image" name="u_image">
                </div>

                <div class="mt-4 border p-2" id="imagePreview"></div>

                <div class="form-group">
                    <label for="u_name">Name Equipment:</label>
                    <input type="text" class="form-control" id="u_name" name="u_name">
                </div>

                <div class="text-center mt-3">
                    <a href="{{ url('/equipment') }}" class="btn btn-outline-primary mx-2">Back</a>
                    <button type="submit" class="btn btn-outline-success mx-2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('u_image').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = `
                    <img src="${reader.result}" alt="Preview" style="max-width: 170px;">
                `;
            }

            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>
