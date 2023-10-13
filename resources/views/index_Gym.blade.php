<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
            <a class="navbar-brand" href="#">Home List</a>
            <a href="{{ url('/equipment') }}" class="btn btn-outline-info ml-auto">Dashboard</a>
            <a href="{{ url('/login') }}" class="btn btn-outline-info ml-2">Login</a>
        </div>
    </nav>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <div class="container mt-4">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach($homes as $tmp) {?>
                <tr>
                    <td> {{ $counter }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $tmp['image']) }}" alt="Tool Image" style="max-width: 170px;">
                    </td>
                    <td> {{ $tmp['name'] }}</td>
                    <td> {{ $tmp['status'] }}</td>
                </tr>
                <?php $counter++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
