<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-form {
            background-color: #fff;
            border: 2px solid #ffa500;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(255, 165, 0, 0.2);
            width: 100%;
            max-width: 420px;
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out;
        }

        .login-form:hover {
            transform: translateY(-10px);
        }

        .login-form h2 {
            text-align: center;
            color: #ffa500;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .login-form .menu--nav-logo img {
            width: 120px;
            display: block;
            margin: 0 auto 1.5rem;
        }

        .login-form input {
            width: 90%;
            padding: 0.8rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ffa500;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .login-form input:focus {
            outline: none;
            border-color: #ff8800;
            box-shadow: 0 0 8px rgba(255, 165, 0, 0.4);
        }

        .login-form button {
            width: 100%;
            padding: 0.8rem;
            background-color: #ffa500;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-form button:hover {
            background-color: #ff8800;
        }

        .error-message {
            color: #ff0000;
            font-size: 0.9rem;
            margin-top: -0.8rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 1.5rem;
        }

        a {
            color: #ffa500;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .login-form {
                padding: 2rem;
                max-width: 85%;
            }

            .login-form h2 {
                font-size: 1.6rem;
            }

            .login-form input {
                font-size: 1rem;
            }

            .login-form button {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 1.5rem;
                max-width: 90%;
            }

            .login-form h2 {
                font-size: 1.4rem;
            }

            .login-form input {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .login-form button {
                font-size: 1rem;
                padding: 0.75rem;
            }

            .text-center {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
         <a href="/" class="menu--nav-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="Future leaders logo"></a>

        <!-- Email Input -->
        <input name="email" type="email" placeholder="Email" required value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="error-message">{{ $errors->first('email') }}</div>
        @endif

        <!-- Password Input -->
        <input name="password" type="password" placeholder="Mot de passe" required>
        @if ($errors->has('password'))
            <div class="error-message">{{ $errors->first('password') }}</div>
        @endif

        <!-- Submit Button -->
        <button type="submit">Se connecter</button>

        <!-- Register Link -->
        <div class="text-center mt-3">
            <a href="{{ route('register') }}">Créer un nouveau compte ?</a>
        </div>
    </form>

</body>

</html>
