

<?php $__env->startSection('title', 'Gestion des Clients'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">

            <?php
                $count = count($descendants);
                $rank = auth()->user()->rank;
            ?>

            <?php if($rank == 'Silver'): ?>
                <div class="alert"
                    style="background-color: #C0C0C0; color: #000; display: flex; align-items: center; gap: 10px;">
                    <img src="<?php echo e(asset('assets/silver.jpg')); ?>" alt="Silver" width="60">
                    <div>
                        Vous avez le niveau <strong>Silver</strong> et votre profit est <strong>25%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Gold'): ?>
                <div class="alert"
                    style="background-color: #FFD700; color: #000; display: flex; align-items: center; gap: 10px;">
                    <img src="<?php echo e(asset('assets/gold.jpg')); ?>" alt="Gold" width="60">
                    <div>
                        Vous avez le niveau <strong>Gold</strong> et votre profit est <strong>30%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Diamond'): ?>
                <div class="alert"
                    style="background-color: #b9f2ff; color: #000; display: flex; align-items: center; gap: 10px;">
                    <img src="<?php echo e(asset('assets/diamond.jpg')); ?>" alt="Diamond" width="60">
                    <div>
                        Vous avez le niveau <strong>Diamond</strong> et votre profit est <strong>35%</strong>.
                    </div>
                </div>
            <?php elseif($rank == 'Master'): ?>
                <div class="alert"
                    style="background-color: #8B0000; color: #fff; display: flex; align-items: center; gap: 10px;">
                    <img src="<?php echo e(asset('assets/master.jpg')); ?>" alt="Master" width="60">
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
                                    <th>Commission</th>
                                    <th>Achat du Mois</th>

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
                                            <?php if($client->profit_user && $client->profit_user > 0): ?>
                                                <span class="badge bg-success">
                                                    <?php echo e(number_format($client->profit_user)); ?> $
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">
                                                    <?php echo e(number_format($client->profit_user)); ?> $
                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if($client->buy_month): ?>
                                                <span class="badge bg-success">Ce client a acheté un mois</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">Il souhaite obtenir de l'argent.</span>
                                            <?php endif; ?>
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