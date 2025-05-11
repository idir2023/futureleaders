<?php $__env->startSection('title', 'Ajouter un Coach'); ?>

<?php $__env->startSection('content'); ?>

    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Ajouter un Coach</h4>
        </div>

        <form id="addCoachForm" action="<?php echo e(route('coaches.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nom">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                        <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="prenom">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                        <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="numero">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="numero" name="numero">
                        <?php $__errorArgs = ['numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="code_promo">Code Promo</label>
                        <input type="text" class="form-control" id="code_promo" name="code_promo">
                        <?php $__errorArgs = ['code_promo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                        <?php $__errorArgs = ['date_naissance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Add dynamic bank accounts -->
                <!-- Compte Bancaire -->
                <div class="card border rounded shadow-sm mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Comptes Bancaires</h5>
                    </div>

                    <div class="card-body">
                        <div id="bankAccountsContainer">
                            <div class="bankAccountRow row mb-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bank_accounts[0][bank_name]"
                                        placeholder="Nom de la banque" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bank_accounts[0][rib]"
                                        placeholder="RIB" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" id="addBankAccount" class="btn btn-outline-success btn-sm">+ Ajouter un
                                compte bancaire</button>
                            <button type="button" id="removeBankAccount" class="btn btn-outline-danger btn-sm">- Supprimer
                                le dernier</button>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville">
                        <?php $__errorArgs = ['ville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="adresse">Adresse</label>
                        <textarea class="form-control" id="adresse" name="adresse" rows="2"></textarea>
                        <?php $__errorArgs = ['adresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="password">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.getElementById('addBankAccount').addEventListener('click', function() {
            let container = document.getElementById('bankAccountsContainer');
            let index = container.getElementsByClassName('bankAccountRow').length;

            let row = document.createElement('div');
            row.classList.add('bankAccountRow', 'row', 'mb-2');
            row.innerHTML = `
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][bank_name]" placeholder="Nom de la banque" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][rib]" placeholder="RIB" required>
            </div>
        `;
            container.appendChild(row);
        });

        document.getElementById('removeBankAccount').addEventListener('click', function() {
            let container = document.getElementById('bankAccountsContainer');
            let rows = container.getElementsByClassName('bankAccountRow');
            if (rows.length > 1) {
                container.removeChild(rows[rows.length - 1]);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/coaches/create.blade.php ENDPATH**/ ?>