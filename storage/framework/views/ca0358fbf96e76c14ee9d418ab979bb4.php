<?php $__env->startSection('title', 'Gestion des Clients'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Clients</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom Complete</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Code Promo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($client->name); ?></td>
                                        <td><?php echo e($client->email); ?></td>
                                        <td><?php echo e($client->telephone); ?></td>
                                        <td><?php echo e($client->code_promo ? $client->code_promo : 'Aucun code promo'); ?></td>
                                        <td>
                                            <?php if($client->code_promo): ?>
                                                <span class="badge bg-success">Code déjà ajouté</span>
                                            <?php else: ?>
                                                <!-- Open the modal if no code_promo -->
                                                <a href="javascript:void(0);" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#promoCodeModal<?php echo e($client->id); ?>">
                                                    Ajouter un code promo
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        
                                        
                                    </tr>

                                    <!-- Modal for each client -->
                                    <div class="modal fade" id="promoCodeModal<?php echo e($client->id); ?>" tabindex="-1"
                                        aria-labelledby="promoCodeModalLabel<?php echo e($client->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="promoCodeModalLabel<?php echo e($client->id); ?>">Ajouter un Code Promo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="<?php echo e(route('clients.add-code_promo', $client->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="promo_code" class="form-label">Entrez le code promo</label>
                                                            <input type="text" class="form-control" id="promo_code" name="promo_code"
                                                                placeholder="Code promo" required>
                                                        </div>
                                                        <p>Êtes-vous sûr de vouloir ajouter ce code promo pour ce client ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-info">Oui, ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun client trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($clients->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>