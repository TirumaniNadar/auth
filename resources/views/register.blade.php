<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="mx-auto py-2" style="max-width:500px;">
    <h1 class="py-1">Register</h1>
    {{-- <form action="/register/submit" method="POST"> --}}
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Name</label>
            <input type="text" id="form2Example1" class="form-control" name="name" required
                value="{{ old('name') }}" />
            @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Surname</label>
            <input type="text" id="form2Example1" class="form-control" name="surname" required
                value="{{ old('surname') }}" />
            @error('surname')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" class="form-control" name="email" required
                value="{{ old('email') }}" />
            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Phone Number</label>
            <input type="number" id="form2Example1" class="form-control" name="phone" required
                value="{{ old('phone') }}" />
            @error('phone')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Address</label>
            <input type="text" id="form2Example1" class="form-control" name="address" value="{{old('address')}}" required />
            @error('address')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Pincode</label>
            <input type="text" id="form2Example1" class="form-control" name="pincode" value="{{old('pincode')}}" required />
            @error('pincode')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">State</label>
            <select name="state" id="" required>
                <option value="Maharashtra" @if(old('state') == 'Maharashtra') {{ 'selected' }} @endif>Maharashtra</option>
                <option value="West Bengal" @if(old('state') == 'West Bengal') {{ 'selected' }} @endif>West Bengal</option>
                <option value="TamilNadu" @if(old('state') == 'TamilNadu') {{ 'selected' }} @endif>TamilNadu</option>
                <option value="UP" @if(old('state') == 'UP') {{ 'selected' }} @endif>UP</option>
            </select>
            @error('state')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">City</label>
            <select name="city" id="" required>
                <option value="Mumbai">Mumbai</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Chennai">Chennai</option>
                <option value="Delhi">Delhi</option>
            </select>
            @error('city')
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
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirm Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password_confirmation" required />
            @error('password_confirmation')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

        <!-- Register buttons -->
        <div class="text-center">
            {{-- <p>Not a member? <a href="#!">Register</a></p> --}}
            <p>Already a member? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </form>

</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

</html>
