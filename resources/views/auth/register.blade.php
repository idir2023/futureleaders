<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription - Future Leaders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .register-form {
            background-color: #fff;
            border: 2px solid #ffa500;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(255, 165, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .register-form h2 {
            color: #ffa500;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .register-form input {
            width: 90%;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            border: 1px solid #ffa500;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            background-color: #fff;
        }

        .register-form input:focus {
            outline: none;
            border-color: #ff8800;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.4);
        }

        .register-form .menu--nav-logo img {
            width: 120px;
            display: block;
            margin: 0 auto 1.5rem;
        }

        .register-form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #ffa500;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #ff8800;
        }

        .error-message,
        .success-message,
        .status-message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .error-message {
            background-color: #ffdddd;
            color: #ff0000;
        }

        .success-message {
            background-color: #ddffdd;
            color: #008000;
        }

        .status-message {
            background-color: #ffffdd;
            color: #8a6d3b;
        }

        a {
            color: #ffa500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .register-form {
                padding: 1rem;
                max-width: 90%;
            }

            .register-form h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <a href="/" class="menu--nav-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Future Leaders Logo">
        </a>

        <h2>Créer un compte</h2>

        <input name="name" type="text" placeholder="Nom complet" value="{{ old('name') }}" required autocomplete="name">
        @error('name')<div class="error-message">{{ $message }}</div>@enderror

        <input name="email" type="email" placeholder="Adresse email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')<div class="error-message">{{ $message }}</div>@enderror

        <input name="telephone" type="tel" placeholder="Téléphone" value="{{ old('telephone') }}" required autocomplete="tel">
        @error('telephone')<div class="error-message">{{ $message }}</div>@enderror

        <input name="adresse" type="text" placeholder="Adresse" value="{{ old('adresse') }}" required autocomplete="street-address">
        @error('adresse')<div class="error-message">{{ $message }}</div>@enderror

        <input name="password" type="password" placeholder="Mot de passe" required autocomplete="new-password">
        @error('password')<div class="error-message">{{ $message }}</div>@enderror

        <input name="password_confirmation" type="password" placeholder="Confirmer le mot de passe" required autocomplete="new-password">

        <button type="submit">S'inscrire</button>

        @if (session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-3">
            <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
        </div>
    </form>
</body>

</html>
