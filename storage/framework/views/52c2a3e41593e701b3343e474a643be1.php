<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #EF7B45;
            --primary-dark: #D66A38;
            --text-color: #333333;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --error: #dc3545;
            --success: #28a745;
            --warning: #ffc107;
            --gray-light: #f1f3f5;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-color);
            padding: 1.5rem 0;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
            padding: 1rem;
        }

        .register-form {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            width: 100%;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .register-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background-color: var(--primary-color);
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--gray-light);
            border-radius: 50%;
            overflow: hidden;
        }

        .register-logo img {
            max-width: 80%;
            max-height: 80%;
        }

        .register-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .register-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.5rem;
        }

        .form-col {
            flex: 1 0 100%;
            padding: 0 0.5rem;
            box-sizing: border-box;
        }

        @media (min-width: 576px) {
            .form-col-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        .form-group {
            margin-bottom: 1.25rem;
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

        .register-btn {
            width: 100%;
            padding: 0.9rem;
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 1rem;
        }

        .register-btn:hover {
            background-color: var(--primary-dark);
        }

        .register-btn:active {
            transform: translateY(1px);
        }

        .form-footer {
            margin-top: 1.5rem;
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

        .notification {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .success-message {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
            border: 1px solid rgba(40, 167, 69, 0.25);
        }

        .error-box {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--error);
            border: 1px solid rgba(220, 53, 69, 0.25);
        }

        .status-message {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
            border: 1px solid rgba(255, 193, 7, 0.25);
        }

        .error-box ul {
            margin: 0.5rem 0 0.5rem 1.5rem;
            padding: 0;
        }

        .error-box li {
            margin-bottom: 0.25rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .register-container {
                max-width: 90%;
            }
            
            .register-form {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .register-form {
                padding: 1.75rem;
            }
            
            .register-title {
                font-size: 1.6rem;
            }
            
            .form-control {
                padding: 0.8rem;
                font-size: 0.95rem;
            }
            
            .register-btn {
                padding: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <form method="POST" action="<?php echo e(route('register')); ?>" class="register-form">
            <?php echo csrf_field(); ?>
            
            <div class="register-header">
                <div class="register-logo">
                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Logo">
                </div>
                <h1 class="register-title">Créer un compte</h1>
                <p class="register-subtitle">Rejoignez notre communauté dès aujourd'hui</p>
            </div>
            
            <?php if(session('status')): ?>
                <div class="notification status-message"><?php echo e(session('status')); ?></div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="notification success-message"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="notification error-box">
                    <strong>Veuillez corriger les erreurs suivantes:</strong>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Entrez votre nom complet" value="<?php echo e(old('name')); ?>" required autocomplete="name">
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 8C10.21 8 12 6.21 12 4C12 1.79 10.21 0 8 0C5.79 0 4 1.79 4 4C4 6.21 5.79 8 8 8ZM8 10C5.33 10 0 11.34 0 14V16H16V14C16 11.34 10.67 10 8 10Z" fill="#adb5bd"/>
                </svg>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Entrez votre email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3333 2.66666H2.66659C1.93325 2.66666 1.33992 3.26666 1.33992 3.99999L1.33325 12C1.33325 12.7333 1.93325 13.3333 2.66659 13.3333H13.3333C14.0666 13.3333 14.6666 12.7333 14.6666 12V4.00666C14.6666 3.27333 14.0666 2.66666 13.3333 2.66666ZM13.3333 12H2.66659V5.33332L7.99992 8.66666L13.3333 5.33332V12ZM7.99992 7.33332L2.66659 4.00666H13.3333L7.99992 7.33332Z" fill="#adb5bd"/>
                </svg>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-row">
                <div class="form-col form-col-6">
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input id="telephone" name="telephone" type="tel" class="form-control" placeholder="Votre numéro" value="<?php echo e(old('telephone')); ?>" required autocomplete="tel">
                        <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6667 13.9999C5.9 13.9999 0.666656 8.76659 0.666656 1.99992H3.33332C3.33332 7.33325 7.33332 11.3333 12.6667 11.3333V13.9999ZM9.99999 11.3333C9.99999 10.5999 9.39999 9.99992 8.66666 9.99992C7.93332 9.99992 7.33332 10.5999 7.33332 11.3333C7.33332 12.0666 7.93332 12.6666 8.66666 12.6666C9.39999 12.6666 9.99999 12.0666 9.99999 11.3333ZM15.3333 11.3333C15.3333 10.5999 14.7333 9.99992 14 9.99992C13.2667 9.99992 12.6667 10.5999 12.6667 11.3333C12.6667 12.0666 13.2667 12.6666 14 12.6666C14.7333 12.6666 15.3333 12.0666 15.3333 11.3333ZM12.6667 7.99992C12.6667 7.26659 12.0667 6.66659 11.3333 6.66659C10.6 6.66659 10 7.26659 10 7.99992C10 8.73325 10.6 9.33325 11.3333 9.33325C12.0667 9.33325 12.6667 8.73325 12.6667 7.99992Z" fill="#adb5bd"/>
                        </svg>
                        <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error-message"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-col form-col-6">
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" name="adresse" type="text" class="form-control" placeholder="Votre adresse" value="<?php echo e(old('adresse')); ?>" required autocomplete="street-address">
                        <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1.33325L2 5.33325V14.6666H5.33333V9.33325H10.6667V14.6666H14V5.33325L8 1.33325Z" fill="#adb5bd"/>
                        </svg>
                        <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error-message"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Créez un mot de passe sécurisé" required autocomplete="new-password">
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 11.3333C9.10457 11.3333 10 10.4379 10 9.33333C10 8.22876 9.10457 7.33333 8 7.33333C6.89543 7.33333 6 8.22876 6 9.33333C6 10.4379 6.89543 11.3333 8 11.3333Z" stroke="#adb5bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.6667 9.33333C12.6667 12.6667 8 14.6667 8 14.6667C8 14.6667 3.33333 12.6667 3.33333 9.33333C3.33333 6 8 1.33333 8 1.33333C8 1.33333 12.6667 6 12.6667 9.33333Z" stroke="#adb5bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirmez votre mot de passe" required autocomplete="new-password">
                <svg class="form-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3333 7.99992H11.3333V5.33325C11.3333 3.12659 9.54 1.33325 7.33333 1.33325C5.12667 1.33325 3.33333 3.12659 3.33333 5.33325H5.33333C5.33333 4.22659 6.22667 3.33325 7.33333 3.33325C8.44 3.33325 9.33333 4.22659 9.33333 5.33325V7.99992H2.66667C1.93333 7.99992 1.33333 8.59992 1.33333 9.33325V13.9999C1.33333 14.7333 1.93333 15.3333 2.66667 15.3333H12C12.7333 15.3333 13.3333 14.7333 13.3333 13.9999V9.33325C13.3333 8.59992 12.7333 7.99992 12 7.99992H9.33333H13.3333Z" fill="#adb5bd"/>
                </svg>
            </div>
            
            <button type="submit" class="register-btn">S'inscrire</button>
            
            <div class="form-footer">
                Déjà inscrit ? <a href="<?php echo e(route('login')); ?>">Se connecter</a>
            </div>
        </form>
    </div>
</body>

</html><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/auth/register.blade.php ENDPATH**/ ?>