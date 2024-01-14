<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="mx-auto py-3" style="max-width:500px;">
    <a href="{{ route('logout') }}" class="btn btn-secondary float-end">Logout</a>
    {{-- <form action="/register/submit" method="POST"> --}}

    <div class="py-2">
        Name : {{ $user->name }} <br>
        Surname : {{ $user->surname }} <br>
        Email : {{ $user->email }} <br>
        Phone : {{ $user->phone }} <br>
        Address : {{ $user->address }} <br>
        Pincode : {{ $user->pincode }} <br>
        State : {{ $user->state }} <br>
        City : {{ $user->city }} <br>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">Go To Dashboard</a>
    </div>

</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</html>
