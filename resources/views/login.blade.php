<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="mx-auto py-3" style="max-width:500px;">
    <h1 class="py-1">Login</h1>
    {{-- <form action="/register/submit" method="POST"> --}}
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="form-outline mb-4">
            @if (session('success'))
                <span class="text-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </span> <br>
            @enderror
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" class="form-control" name="email" required
                value="{{ old('email') }}" />
            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" id="form2Example2" class="form-control" name="password" required />
        @error('password')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('verification')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
    </div>
</form>

</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</html>
