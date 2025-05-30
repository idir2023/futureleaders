<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'coach'): ?>
        <div class="row">
            <!-- Coaches -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="aaa card text-dark ">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Coaches</h4>
                            <h2 class="font-weight-bold"><?php echo e($CoachesCount); ?></h2>
                        </div>
                        <i class="typcn typcn-user-outline display-4"></i>
                    </div>
                </div>
            </div>

            <!-- Consultations -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card text-dark bg-pastel-green">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Consultations</h4>
                            <h2 class="font-weight-bold"><?php echo e($ConsultationsCount); ?></h2>
                        </div>
                        <i class="typcn typcn-messages display-4"></i>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card text-dark bg-pastel-rose">

                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Utilisateurs</h4>
                            <h2 class="font-weight-bold"><?php echo e($UsersCount); ?></h2>
                        </div>
                        <i class="typcn typcn-group-outline display-4"></i>
                    </div>
                </div>
            </div>
        </div> <!-- End row for admin boxes -->

        <!-- Recent Consultations Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Consultations Récentes</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coach</th>
                                    <th>Problème</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $Consultations->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($consultation->name); ?></td>
                                        <td><?php echo e($consultation->created_at->format('d/m/Y')); ?></td>
                                        <td><?php echo e(optional($consultation->coach)->nom ?? 'N/A'); ?>

                                            <?php echo e(optional($consultation->coach)->prenom ?? ''); ?></td>
                                        </td>
                                        <td><?php echo e($consultation->probleme ?: 'Aucun problème'); ?></td>
                                        <td><?php echo e($consultation->prix); ?> $</td>
                                        <td>
                                            <?php if($consultation->paiement_status == 'payé'): ?>
                                                <span class="badge bg-success">Payé</span>
                                            <?php elseif($consultation->paiement_status == 'en attente'): ?>
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inconnu</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune consultation récente.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End of Recent Consultations Section -->
    <?php elseif(auth()->user()->role === 'user'): ?>
        <!-- Client Consultations Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Mes Consultations</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Date</th>
                                    <th>Prix</th>
                                    <th>Coach</th>
                                    <th>Numero de Coach</th>
                                    <th>Voir Drive</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $consultationsClient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($consultation->name); ?>

                                        </td>
                                        <td><?php echo e($consultation->created_at ? $consultation->created_at->format('d/m/Y') : '-'); ?>

                                        </td>
                                        <td><?php echo e(number_format($consultation->prix, 2)); ?> $</td>
                                        <td><?php echo e(optional($consultation->coach)->nom ?? 'N/A'); ?>

                                            <?php echo e(optional($consultation->coach)->prenom ?? ''); ?>

                                        </td>
                                        <td><?php echo e(optional($consultation->coach)->numero ?? 'N/A'); ?>


                                        </td>

                                        <td>
                                            <?php if($consultation->drive_link && now()->lessThan($consultation->drive_link_expire_at)): ?>
                                                <a href="<?php echo e($consultation->drive_link); ?>" target="_blank"
                                                    class="btn btn-sm btn-success"title="Voir le lien Google Drive">
                                                    Accéder au lien Drive
                                                </a>
                                                
                                            <?php elseif($consultation->drive_link): ?>
                                                <span class="text-danger fw-bold">Lien expiré</span>
                                            <?php else: ?>
                                                <span class="text-muted">Aucun lien disponible</span>
                                            <?php endif; ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Aucune consultation trouvée.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <a class="btn btn-sm d-flex align-items-center" href="<?php echo e(route('home')); ?>"
                    style="background: linear-gradient(45deg, #cba075, #cba075); color: #fff; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-arrow-back mr-1"></i> Retour à l'accueil
                </a>
            </div>

            <!-- Button -->
            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-sm d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal"
                    style="background: linear-gradient(45deg, #ff7980, #ff8000); 
               color: #fff; 
               padding: 10px 20px; 
               border-radius: 5px; 
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
               transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-credit-card me-2"></i>
                    Get Money or One Month Free
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"
                        style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.3);">
                        <div class="modal-header"
                            style="background: linear-gradient(45deg, #ff7980, #ff8000); color: #fff;">
                            <h5 class="modal-title" id="confirmationModalLabel">
                                <i class="typcn typcn-warning-outline me-2"></i> Confirm Your Action
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center" style="padding: 30px; font-size: 1.1rem;">
                            <p>
                                Are you sure you want to withdraw
                                <strong style="color: #ff5722;"><?php echo e(number_format(auth()->user()->profit_user, 2)); ?>

                                    $</strong>
                                or get one month free access to the academy?
                            </p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center gap-3 pb-4">
                            <!-- Withdraw Money -->
                            <a href="<?php echo e(route('getMoney', auth()->user()->id)); ?>" class="btn btn-outline-secondary px-4">
                                <i class="typcn typcn-arrow-back me-1"></i> Withdraw Money
                            </a>

                            <!-- Buy Month -->
                            <a href="<?php echo e(route('buyMonth', auth()->user()->id)); ?>" class="btn btn-success px-4"
                                style="background-color: #28a745; border: none;">
                                <i class="typcn typcn-tick me-1"></i> Get 1 Month Free
                            </a>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- End of Client Consultations Section -->
    <?php endif; ?>

    <?php if(auth()->user()->role === 'coach'): ?>
        <div class="row">
            <!-- Button -->
            <div class="col-12 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-sm d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal"
                    style="background: linear-gradient(45deg, #ff7980, #ff8000); 
               color: #fff; 
               padding: 10px 20px; 
               border-radius: 5px; 
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
               transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-credit-card me-2"></i>
                    Récupérer ma commission
                </button>
            </div>


            <!-- Modal de Confirmation - Get My Profit -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation de Retrait</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir récupérer votre commission ? Cette action déclenchera une demande de
                                retrait auprès de l'administrateur.</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                            <!-- Modifier l'action du formulaire selon votre route -->
                            <form action="<?php echo e(route('get-profit', auth()->user()->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success">Oui, je confirme</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    <?php elseif(auth()->user()->role === 'admin'): ?>
        <div class="row">
            <!-- Button -->
            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-sm d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal"
                    style="background: linear-gradient(45deg, #ff7980, #ff8000); 
               color: #fff; 
               padding: 10px 20px; 
               border-radius: 5px; 
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
               transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-credit-card me-2"></i>
                    Récupérer commission Admin
                </button>
            </div>

            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#promoCodeModal">
                    <i class="typcn typcn-credit-card me-2"></i>
                    <?php echo e(auth()->user()->code_promo ? 'Modifier code promo' : 'Ajouter code promo'); ?>

                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="promoCodeModal" tabindex="-1" aria-labelledby="promoCodeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form id="promoCodeForm" method="POST" action="/user/update-promo-code/<?php echo e(auth()->user()->id); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="promoCodeModalLabel">Ajouter / Mettre à jour le code promo
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="promo_code" class="form-label">Code Promo</label>
                                    <input type="text" class="form-control" id="promo_code" name="promo_code"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal de Confirmation - Get My Profit -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation de Retrait</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir récupérer votre commission ? Cette action déclenchera une demande de
                                retrait auprès de l'administrateur.</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                            <!-- Modifier l'action du formulaire selon votre route -->
                            <form action="<?php echo e(route('get-profit-admin', auth()->user()->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success">Oui, je confirme</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>
    <!-- User Information Section -->
    <div class="row">

        <!-- Back to Home Button -->
        <div class="col-12 mt-3 d-flex justify-content-start align-items-center flex-column">
            <div class="card shadow-sm border-0 w-100">
                <div class="card-body">
                    <h4 class="card-title mb-4 fw-bold text-dark">Mes informations</h4>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">Détail</th>
                                <th scope="col">Information</th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-dark">
                            <tr>
                                <td><strong>Nom</strong></td>
                                <td><?php echo e(auth()->user()->name); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><?php echo e(auth()->user()->email); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone</strong></td>
                                <td><?php echo e(auth()->user()->telephone ?? 'Non disponible'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Code promo</strong></td>
                                <td>
                                    <?php
                                        $coach = \App\Models\Coach::where('user_id', auth()->id())->first();
                                        $userCode = auth()->user()->code_promo ?? null;
                                        $coachCode = $coach?->code_promo ?? null;
                                    ?>

                                    <?php if($coachCode): ?>
                                        <span class="badge bg-success"><?php echo e($coachCode); ?></span>
                                    <?php elseif($userCode): ?>
                                        <span class="badge bg-success"><?php echo e($userCode); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Aucun code promo</span>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>Mon profit</strong></td>
                                <td>
                                    <?php
                                        $totalProfit =
                                            (float) auth()->user()->profit_user +
                                            (float) auth()->user()->profit_user_transfer;
                                    ?>

                                    <span class="badge <?php echo e($totalProfit > 0 ? 'bg-success' : 'bg-secondary'); ?>">
                                        <?php echo e(number_format($totalProfit, 2)); ?> $
                                    </span>

                                </td>
                            </tr>
                            <?php if(auth()->user()->role !== 'admin'): ?>
                                <tr>
                                    <td><strong>Rank</strong></td>
                                    <td>
                                        <?php
                                            $rank = auth()->user()->rank;
                                        ?>

                                        <?php if($rank): ?>
                                            <?php if($rank == 'Silver'): ?>
                                                
                                                <img src="<?php echo e(asset('assets/silver.jpg')); ?>" alt="">
                                            <?php elseif($rank == 'Gold'): ?>
                                                
                                                <img src="<?php echo e(asset('assets/gold.jpg')); ?>" alt="">
                                            <?php elseif($rank == 'Diamond'): ?>
                                                
                                                <img src="<?php echo e(asset('assets/diamond.jpg')); ?>" alt="">
                                            <?php elseif($rank == 'Master'): ?>
                                                
                                                <img src="<?php echo e(asset('assets/master.jpg')); ?>" alt="">
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Unranked</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Unranked</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Optional hover effect -->
        <style>
            .btn:hover {
                background: linear-gradient(45deg, #cba075, #cba075);
                transform: scale(1.05);
            }
        </style>
    </div>
    <!-- End of User Information Section -->

<?php $__env->stopSection(); ?>
<style>
    .aaa {
        background-color: #DE6C25FF;
        /* Soft beige/nude */
    }

    .bg-pastel-green {
        background-color: #b0e0a8;
        /* Pastel green */
    }

    .bg-pastel-rose {
        background-color: #f4c6c1;
        /* Pastel rose */
    }

    .text-dark {
        color: #2d2d2d;
        /* Dark text for better contrast */
    }

    .display-4 {
        font-size: 3rem;
    }
</style>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/index.blade.php ENDPATH**/ ?>