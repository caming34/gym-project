<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Equipment</title>
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
    <style>
        body {
            background-color: #f5f5f5;
            /* สีพื้นหลังของหน้าเว็บ */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Home List</a>
        </div>
    </nav>

    <div class="container my-5">
        @if (\Session::has('success'))
            <div class="alert alert-success mt-3">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="equipment" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="u_image">Image:</label>
                        <input type="file" class="form-control-file" id="u_image" name="u_image">
                    </div>
                    <div class="form-group">
                        <label for="u_name">NameEquipment:</label>
                        <input type="text" class="form-control" id="u_name" name="u_name">
                    </div>
                    <div class="text-center">
                        <a href="{{ url('/equipment') }}" class="btn btn-outline-primary mx-2">Back</a>
                        @csrf
                        <button type="submit" class="btn btn-outline-success mx-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
