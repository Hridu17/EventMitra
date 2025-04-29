<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body class="login-bg register-page">

    <div class="login-container">
        <div class="login-box">
            <div class="login-image">
                <img src="{{ asset('assets/images/register.jpg') }}" alt="Register Illustration">
            </div>

            <div class="login-form">
                <h2>Register</h2>

                {{-- Show validation errors --}}
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <label>First Name</label>
                    <input type="text" name="first_name" required>

                    <label>Last Name</label>
                    <input type="text" name="last_name" required>

                    <label>Email</label>
                    <input type="email" name="email" required>

                    <label>Phone Number</label>
                    <input type="text" name="phone" required>

                    <label>Password</label>
                    <input type="password" name="password" required>

                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" required>

                    <div class="form-footer">
                        <button type="submit">Sign Up</button>
                        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
