<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Home List</a>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="container mt-4">
       <!-- resources/views/auth/register.blade.php -->
<form method="POST" action="{{ url('/register') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>

    </div>

</body>
</html>
