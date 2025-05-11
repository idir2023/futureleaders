<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Consultation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* === Base === */
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(to right, #fff3e0, #ffe0b2);
            /* blanc + orange clair */
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        h1.title {
            text-align: center;
            font-size: 28px;
            color: #ff6f00;
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        h1.title i {
            color: #ff6f00;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            position: relative;
        }

        .form-group label {
            font-weight: 400;
        }

        .form-group i.input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #ffb74d;
        }

        input,
        textarea {
            padding: 12px 15px 12px 40px;
            border: 1px solid #ffc107;
            border-radius: 8px;
            font-size: 15px;
            background-color: #fff8e1;
            transition: border 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #ff9800;
            outline: none;
            background-color: #ffffff;
        }

        .readonly {
            background-color: #ffe0b2;
            color: #555;
        }

        .input-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .input-row .form-group {
            flex: 1 1 300px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
            padding-left: 15px;
        }

        .submit-btn {
            background-color: #ff9800;
            color: #fff;
            padding: 15px;
            font-size: 17px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #fb8c00;
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .menu--nav-logo img {
            width: 180px;
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(255, 111, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .menu--nav-logo img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 111, 0, 0.3);
        }

        /* === Responsive === */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            .menu--nav-logo img {
                width: 140px;
            }

            h1.title {
                font-size: 22px;
                flex-direction: column;
                gap: 5px;
            }

            .submit-btn {
                flex-direction: column;
                gap: 5px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        
        <div class="logo-wrapper">
            <a href="/" class="menu--nav-logo">
                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Future leaders logo">
            </a>
        </div>

        <form action="<?php echo e(route('store-consultation')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="input-row">
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Nom Complet</label>
                    <input type="text" id="name" name="name" value="<?php echo e(Auth::user()->name); ?>"
                        class="readonly" readonly />
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>"
                        class="readonly" readonly />
                </div>

                <div class="form-group">
                    <label for="prix"><i class="fas fa-tag"></i> Prix</label>
                    <input type="number" id="prix" name="prix" value="<?php echo e($price); ?>" class="readonly"
                        readonly />
                </div>
            </div>

            <div class="input-row">
                <div class="form-group">
                    <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo e(Auth::user()->telephone); ?>" placeholder="Ex: +212600000000" />
                </div>

                <div class="form-group">
                    <label for="adresse"><i class="fas fa-map-marker-alt"></i> Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="<?php echo e(Auth::user()->adresse); ?>" placeholder="Votre adresse complète" />
                </div>

                <div class="form-group">
                    <label for="code_promo"><i class="fas fa-ticket-alt"></i> Code Promo</label>
                    <input type="text" id="code_promo" name="code_promo"
                        placeholder="Entrez un code promo (si disponible)" required />
                </div>
            </div>

            <div class="form-group">
                <label for="probleme"><i class="fas fa-comment-medical"></i> Problème</label>
                <textarea id="probleme" name="probleme" placeholder="Décrivez votre problème..."></textarea>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> Envoyer la demande
            </button>
        </form>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/consultations/create.blade.php ENDPATH**/ ?>