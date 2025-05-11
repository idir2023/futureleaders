<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #EF7B45;
            --primary-dark: #D66A38;
            --text-color: #333333;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --error: #dc3545;
            --gray-light: #f1f3f5;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--text-color);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 1rem;
        }

        .login-form {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            width: 100%;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .login-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background-color: var(--primary-color);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--gray-light);
            border-radius: 50%;
            overflow: hidden;
        }

        .login-logo img {
            max-width: 80%;
            max-height: 80%;
        }

        .login-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--gray-light);
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(239, 123, 69, 0.2);
        }

        .form-icon {
            position: absolute;
            right: 12px;
            top: 40px;
            color: #adb5bd;
        }

        .error-message {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .login-btn {
            width: 100%;
            padding: 0.9rem;
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .login-btn:hover {
            background-color: var(--primary-dark);
        }

        .login-btn:active {
            transform: translateY(1px);
        }

        .form-footer {
            margin-top: 1.8rem;
            text-align: center;
            font-size: 0.95rem;
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .form-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check input {
            margin-right: 6px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
            }
            
            .login-form {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 1.75rem;
            }
            
            .login-title {
                font-size: 1.6rem;
            }
            
            .form-control {
                padding: 0.8rem;
                font-size: 0.95rem;
            }
            
            .login-btn {
                padding: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
            <?php echo csrf_field(); ?>
            <div class="login-header">
                <div class="login-logo">
                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Logo">
                </div>
                <h1 class="login-title">Bienvenue</h1>
                <p class="login-subtitle">Connectez-vous pour accéder à votre compte</p>
            </div>
            
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Entrez votre email" required value="<?php echo e(old('email')); ?>">
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3333 2.66666H2.66659C1.93325 2.66666 1.33992 3.26666 1.33992 3.99999L1.33325 12C1.33325 12.7333 1.93325 13.3333 2.66659 13.3333H13.3333C14.0666 13.3333 14.6666 12.7333 14.6666 12V4.00666C14.6666 3.27333 14.0666 2.66666 13.3333 2.66666ZM13.3333 12H2.66659V5.33332L7.99992 8.66666L13.3333 5.33332V12ZM7.99992 7.33332L2.66659 4.00666H13.3333L7.99992 7.33332Z" fill="#adb5bd"/>
                </svg>
                <?php if($errors->has('email')): ?>
                    <div class="error-message"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.00008 12.6667C11.6819 12.6667 14.6667 8.00004 14.6667 8.00004C14.6667 8.00004 11.6819 3.33337 8.00008 3.33337C4.31826 3.33337 1.33341 8.00004 1.33341 8.00004C1.33341 8.00004 4.31826 12.6667 8.00008 12.6667Z" stroke="#adb5bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#adb5bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?php if($errors->has('password')): ?>
                    <div class="error-message"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-options">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <a href="">Mot de passe oublié?</a>
            </div>
            
            <button type="submit" class="login-btn">Se connecter</button>
            
            <div class="form-footer">
                Vous n'avez pas de compte? <a href="<?php echo e(route('register')); ?>">Créer un compte</a>
            </div>
        </form>
    </div>
</body>

</html><?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/auth/login.blade.php ENDPATH**/ ?>