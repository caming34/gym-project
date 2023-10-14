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
    <title>Dashboard</title>
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
            <form method="GET" class="form-inline my-2 my-lg-0 ml-auto form-group mb-0"
                action="{{ route('equipment.index') }}">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search...">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="ml-3">
                <a href="{{ url('/create_equipment') }}" class="btn btn-outline-success" role="button">Create
                    Equipment</a>
            </div>
        </div>
    </nav>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Booker's Name</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($equipment as $tmp) {?>
                    <tr>
                        <td> {{ $counter }}</td>
                        <td> <img src="{{ asset('uploads/' . $tmp['image']) }}" alt="Tool Image"
                                style="max-width: 170px;"></td>
                        <td> {{ $tmp['name'] }}</td>
                        <td> {{ $tmp['status'] }}</td>
                        <td> {{ $tmp['user'] }}</td>
                        <td>
                            <form method="post" action="{{ route('equipment.book', ['id' => $tmp['id']]) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-info">Book</button>
                            </form>
                        </td>
                        <td>
                            <form method="get"
                                action="{{ action('App\Http\Controllers\EquipmentController@edit', $tmp['id']) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-primary">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Do you want delete ?? ');" method="post"
                                action="{{ action('App\Http\Controllers\EquipmentController@destroy', $tmp['id']) }}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
