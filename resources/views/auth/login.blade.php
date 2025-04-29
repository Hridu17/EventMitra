<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body class="login-bg login-page">

    <div class="login-container">
        <div class="login-box">
            <div class="login-image">
                <img src="{{ asset('assets/images/login.jpeg') }}" alt="Decorated Venue">
            </div>

            <div class="login-form">
                <h2>Login here!</h2>

                {{-- Display Error Message --}}
                @if ($errors->has('email'))
                    <div>
                        {{ $errors->first('email') }}
                    </div>
                @endif



                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <div class="form-footer">
                        <p>Have no account? <a href="{{ route('register') }}">Register here</a></p>
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
