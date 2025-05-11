

<?php $__env->startSection('title', 'Gestion des Clients'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">

            <?php
                $count = count($descendants);
                $rank = auth()->user()->rank;
            ?>

            <?php if($rank == 'Silver'): ?>
                <div class="alert alert-success d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('assets/silver.png')); ?>" alt="Silver" width="40">
                    <div>
                        Vous avez le niveau <strong>Silver</strong> et votre profit est <strong>25%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Gold'): ?>
                <div class="alert alert-warning d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('assets/gold.png')); ?>" alt="Gold" width="40">
                    <div>
                        Vous avez le niveau <strong>Gold</strong> et votre profit est <strong>30%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Diamond'): ?>
                <div class="alert alert-primary d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('assets/diamond.png')); ?>" alt="Diamond" width="40">
                    <div>
                        Vous avez le niveau <strong>Diamond</strong> et votre profit est <strong>35%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Master'): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('assets/master.png')); ?>" alt="Master" width="40">
                    <div>
                        Vous avez le niveau <strong>Master</strong> avec un profit de <strong>30% avant</strong> et
                        <strong>30% après</strong>.
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info d-flex align-items-center gap-2">
                    <div>
                        Vous avez le niveau <strong>Unranked</strong>. Continuez pour débloquer plus d’avantages. Votre
                        profit est <strong>20%</strong> !
                    </div>
                </div>
            <?php endif; ?>


            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-weight: bold; color: #333;">
                        Mes clients
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Code promo</th>
                                    <th>Statut</th> <!-- Nouvelle colonne -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $descendants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($client->name); ?></td>
                                        <td><?php echo e($client->email); ?></td>
                                        <td><?php echo e($client->telephone ?? 'Non disponible'); ?></td>
                                        <td>
                                            <?php if($client->code_promo): ?>
                                                <span class="badge bg-success"><?php echo e($client->code_promo); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Aucun code promo</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning text-dark">Child</span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Aucun client trouvé.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/clients/registered_by_me.blade.php ENDPATH**/ ?>