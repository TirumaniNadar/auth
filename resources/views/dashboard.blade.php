<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="mx-auto py-3" style="max-width:500px;">
    <h1 class="py-1">Hi {{ $user->name }}</h1>
    <div class="d-flex justify-content-between">
        <a href="{{ route('profile') }}" class="btn btn-primary">View Profile</a> <br>
        <a href="{{ route('logout') }}" class="btn btn-secondary">Logout</a>
    </div>
    {{-- <form action="/register/submit" method="POST"> --}}


</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</html>
