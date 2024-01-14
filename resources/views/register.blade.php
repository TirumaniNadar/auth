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
    <form action="{{ route('register.submit') }}" method="POST" id="register_form_id">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Name</label>
            <input type="text" id="form2Example1" class="form-control" name="name" value="{{ old('name') }}" />
            <span class="text-danger error-message" id="name_error"></span><br>
            @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Surname</label>
            <input type="text" id="form2Example1" class="form-control" name="surname" value="{{ old('surname') }}" />
            <span class="text-danger error-message" id="surname_error"></span><br>
            @error('surname')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" class="form-control" name="email" value="{{ old('email') }}" />
            <span class="text-danger error-message" id="email_error"></span><br>
            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Phone Number</label>
            <input type="number" id="form2Example1" class="form-control" name="phone" value="{{ old('phone') }}" />
            <span class="text-danger error-message" id="phone_error"></span><br>
            @error('phone')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Address</label>
            <input type="text" id="form2Example1" class="form-control" name="address" value="{{ old('address') }}" />
            <span class="text-danger error-message" id="address_error"></span><br>
            @error('address')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Pincode</label>
            <input type="text" id="form2Example1" class="form-control" name="pincode"
                value="{{ old('pincode') }}" />
            <span class="text-danger error-message" id="pincode_error"></span><br>
            @error('pincode')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">State</label>
            <select name="state" id="state" required>
                <option selected disabled>Select State</option>
                @foreach ($states as $key => $state)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
            </select>
            <span class="text-danger error-message" id="state_error"></span><br>
            @error('state')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">City</label>
            <select name="city" id="city" required>
                <option selected disabled>Select City</option>
            </select>
            <span class="text-danger error-message" id="city_error"></span><br>
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
            <span class="text-danger error-message" id="password_error"></span><br>
            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirm Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password_confirmation" required />
            <span class="text-danger error-message" id="password_confirmation_error"></span><br>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $("#state").change(function() {
        $("#city").html('<option selected disabled>Select City</option>');
        var state = $(this).val();
        // console.log(state);
        $.ajax({
            url: "{{ route('getCity') }}",
            type: "GET",
            data: {
                state: state,
            },
            dataType: 'json',
            success: function(res) {
                // console.log(res);
                var cities = res.cities;
                for (var i = 0; i < cities.length; i++) {
                    $("#city").append('<option value="' + cities[i] + '">' + cities[i] +
                        '</option>');
                }
            }
        })
    })


    $("#register_form_id").submit(function(e) {
        e.preventDefault();
        validate();
        if ($(".error-message").text() === "") {
            this.submit();
        }
    });

    function validate() {
        $(".error-message").html("");

        var name = $("input[name=name]").val();
        var surname = $("input[name=surname]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var address = $("input[name=address]").val();
        var pincode = $("input[name=pincode]").val();
        var state = $("select[name=state]").val();
        var city = $("select[name=city]").val();
        var password = $("input[name=password]").val();
        var password_confirmation = $("input[name=password_confirmation]").val();
        if (name == "") {
            $("#name_error").html("Name Field is required");
        }
        if (surname == "") {
            $("#surname_error").html("Surname Field is required");
        }
        if (email == "") {
            $("#email_error").html("Email Field is required");
        }
        if (phone == "") {
            $("#phone_error").html("Phone Field is required");
        }
        if (address == "") {
            $("#address_error").html("Address Field is required");
        }
        if (pincode == "") {
            $("#pincode_error").html("Pincode Field is required");
        }
        if (state == "") {
            $("#state_error").html("State Field is required");
        }
        if (city == "") {
            $("#city_error").html("City Field is required");
        }
        if (password == "") {
            $("#password_error").html("Password Field is required");
        }
        if (password_confirmation == "") {
            $("#password_confirmation_error").html("Password Confirmation Field is required");
        }
    }
</script>

</html>
