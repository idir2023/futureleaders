<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upload Reçu de Paiement</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #fff8f1;
      background-image: linear-gradient(135deg, #fff8f1 0%, #ffe5d0 100%);
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    .upload-container {
      width: 80%;
      max-width: 700px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 15px 30px rgba(255, 111, 0, 0.1);
      position: relative;
      overflow: hidden;
    }

    .decoration {
      position: absolute;
      width: 150px;
      height: 150px;
      background-color: rgba(255, 111, 0, 0.08);
      border-radius: 50%;
      z-index: 0;
    }

    .decoration-1 {
      top: -75px;
      right: -75px;
    }

    .decoration-2 {
      bottom: -75px;
      left: -75px;
    }

    .content-wrapper {
      position: relative;
      z-index: 1;
    }

    .section-title {
      color: #ff6f00;
      font-size: 24px;
      margin-bottom: 25px;
      padding-bottom: 10px;
      border-bottom: 2px solid #f0f0f0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .coach-info {
      background-color: #fff7f0;
      border-left: 4px solid #ff6f00;
      padding: 15px;
      border-radius: 6px;
      margin-bottom: 25px;
    }

    .info-item {
      font-size: 16px;
      color: #333;
      line-height: 1.6;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
    }

    .info-item i {
      margin-right: 10px;
      color: #ff6f00;
      width: 20px;
    }

    .bank-accounts {
      margin-top: 10px;
    }

    .bank-account {
      background-color: #fff1e0;
      padding: 10px 15px;
      margin-bottom: 10px;
      border-radius: 6px;
      border: 1px solid #ffd6b0;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .bank-account span {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: #444;
    }

    .bank-account span i {
      margin-right: 8px;
      color: #ff6f00;
      width: 18px;
    }

    .upload-form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .form-title {
      font-size: 18px;
      color: #333;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .file-input-container {
      position: relative;
      margin-bottom: 25px;
    }

    .file-input-label {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border: 2px dashed #ffd2a1;
      border-radius: 8px;
      padding: 25px;
      cursor: pointer;
      transition: all 0.3s ease;
      background-color: #fffaf3;
      text-align: center;
    }

    .file-input-label:hover {
      border-color: #ff6f00;
      background-color: #fff1e0;
    }

    .file-icon {
      font-size: 40px;
      color: #ff6f00;
      margin-bottom: 15px;
    }

    .file-input-text {
      color: #666;
      font-size: 16px;
    }

    .file-input {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    .selected-file {
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #fff1e0;
      border-radius: 6px;
      font-size: 14px;
      color: #ff6f00;
      display: none;
      align-items: center;
      gap: 8px;
    }

    .submit-btn {
      padding: 14px 25px;
      font-size: 16px;
      background-color: #ff6f00;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-weight: bold;
    }

    .submit-btn:hover {
      background-color: #e65c00;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(255, 111, 0, 0.2);
    }

    .submit-btn:active {
      transform: translateY(0);
      box-shadow: none;
    }

    .no-coach {
      background-color: #fff4e5;
      color: #b96a00;
      padding: 15px;
      border-radius: 6px;
      border-left: 4px solid #ffa726;
      display: flex;
      align-items: center;
      gap: 10px;
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

    @media (max-width: 600px) {
      .upload-container {
        width: 90%;
        padding: 20px;
        margin: 30px auto;
      }

      .menu--nav-logo img {
        width: 140px;
      }

      .section-title {
        font-size: 20px;
      }

      .info-item {
        font-size: 14px;
      }

      .file-input-label {
        padding: 15px;
      }

      .file-icon {
        font-size: 30px;
      }

      .submit-btn {
        font-size: 14px;
        padding: 12px 20px;
      }
    }
  </style>
</head>

<body>
  <div class="upload-container">
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="content-wrapper">
      <div class="logo-wrapper">
        <a href="/" class="menu--nav-logo">
          <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Future leaders logo">
        </a>
      </div>
      <h1 class="section-title"><i class="fas fa-receipt"></i> Téléchargement du Reçu</h1>

      <?php if($coach): ?>
        <div class="coach-info">
          <div class="info-item">
            <i class="fas fa-user"></i>
            <span class="info-label">Nom complet du coach:</span>
            <span><?php echo e($coach->prenom); ?> <?php echo e($coach->nom); ?></span>
          </div>

          <div class="info-item">
            <i class="fas fa-credit-card"></i>
            <span class="info-label">Comptes bancaires:</span>
          </div>
          <div class="bank-accounts">
            <?php $__currentLoopData = $coach->bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="bank-account">
                <span><i class="fas fa-university"></i> Banque : <?php echo e($account->bank_name); ?></span>
                <span><i class="fas fa-barcode"></i> RIB : <?php echo e($account->rib); ?></span>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        <div class="upload-form">
          <h3 class="form-title"><i class="fas fa-cloud-upload-alt"></i> Upload du reçu de paiement:</h3>
          <form action="<?php echo e(route('upload.recu', $consultation->id)); ?>" method="POST" enctype="multipart/form-data" id="uploadForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>

            <div class="file-input-container">
              <label for="recu" class="file-input-label">
                <i class="file-icon fas fa-file-upload"></i>
                <span class="file-input-text">Cliquez ou déposez ici pour sélectionner un fichier</span>
              </label>
              <input type="file" name="recu" id="recu" class="file-input" required>
              <div class="selected-file" id="selectedFile">
                <i class="fas fa-file-alt"></i>
                <span id="fileName">Aucun fichier sélectionné</span>
              </div>
            </div>

            <button type="submit" class="submit-btn">
              <i class="fas fa-paper-plane"></i> Envoyer le reçu
            </button>
          </form>
        </div>
      <?php else: ?>
        <div class="no-coach">
          <i class="fas fa-exclamation-triangle"></i>
          <p>Aucun coach trouvé pour ce code promo.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const fileInput = document.getElementById('recu');
      const fileNameDisplay = document.getElementById('fileName');
      const selectedFileDiv = document.getElementById('selectedFile');

      fileInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
          fileNameDisplay.textContent = this.files[0].name;
          selectedFileDiv.style.display = 'flex';
        } else {
          fileNameDisplay.textContent = 'Aucun fichier sélectionné';
          selectedFileDiv.style.display = 'none';
        }
      });
    });
  </script>
</body>

</html>
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/consultations/complete_paiment.blade.php ENDPATH**/ ?>