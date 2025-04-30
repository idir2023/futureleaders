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
    <form method="POST" action="<?php echo e(route('register')); ?>" class="register-form">
        <?php echo csrf_field(); ?>

        <a href="/" class="menu--nav-logo">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Future Leaders Logo">
        </a>

        <h2>Créer un compte</h2>

        <input name="name" type="text" placeholder="Nom complet" value="<?php echo e(old('name')); ?>" required autocomplete="name">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input name="email" type="email" placeholder="Adresse email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input name="telephone" type="tel" placeholder="Téléphone" value="<?php echo e(old('telephone')); ?>" required autocomplete="tel">
        <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input name="adresse" type="text" placeholder="Adresse" value="<?php echo e(old('adresse')); ?>" required autocomplete="street-address">
        <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input name="password" type="password" placeholder="Mot de passe" required autocomplete="new-password">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input name="password_confirmation" type="password" placeholder="Confirmer le mot de passe" required autocomplete="new-password">

        <button type="submit">S'inscrire</button>

        <?php if(session('status')): ?>
            <div class="status-message"><?php echo e(session('status')); ?></div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="success-message"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="error-message">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="mt-3">
            <a href="<?php echo e(route('login')); ?>">Déjà inscrit ? Se connecter</a>
        </div>
    </form>
</body>

</html>
<?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/auth/register.blade.php ENDPATH**/ ?>