 

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
                                     <th>Nom Complet</th>
                                     <th>Email</th>
                                     <th>Téléphone</th>
                                     <th>Code Promo</th>
                                     <th>Commission</th>
                                     <th>Achat du Mois</th>
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
                                         <td><?php echo e($client->code_promo ?? 'Aucun code promo'); ?></td>
                                         <td>
                                             <?php if($client->profit_user && $client->profit_user > 0): ?>
                                                 <span class="badge bg-success">
                                                     <?php echo e(number_format($client->profit_user ,2)); ?> $
                                                 </span>
                                             <?php else: ?>
                                                 <span class="badge bg-secondary">
                                                     <?php echo e(number_format($client->profit_user ,2)); ?> $
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


                                         <td>
                                             <?php if($client->code_promo): ?>
                                                 <span class="badge bg-success">Code déjà ajouté</span>
                                             <?php else: ?>
                                                 <a href="javascript:void(0);" class="btn btn-outline-info btn-sm"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#promoCodeModal<?php echo e($client->id); ?>">
                                                     Ajouter un code promo
                                                 </a>
                                             <?php endif; ?>
                                         </td>
                                     </tr>

                                     <!-- Modal -->
                                     <div class="modal fade" id="promoCodeModal<?php echo e($client->id); ?>" tabindex="-1"
                                         aria-labelledby="promoCodeModalLabel<?php echo e($client->id); ?>" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="promoCodeModalLabel<?php echo e($client->id); ?>">
                                                         Ajouter un Code Promo
                                                     </h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                         aria-label="Close"></button>
                                                 </div>
                                                 <form action="<?php echo e(route('clients.add-code_promo', $client->id)); ?>"
                                                     method="POST">
                                                     <?php echo csrf_field(); ?>
                                                     <?php echo method_field('PUT'); ?>
                                                     <div class="modal-body">
                                                         <div class="mb-3">
                                                             <label for="promo_code_<?php echo e($client->id); ?>"
                                                                 class="form-label">Entrez le code promo</label>
                                                             <input type="text" class="form-control"
                                                                 id="promo_code_<?php echo e($client->id); ?>" name="promo_code"
                                                                 placeholder="Code promo" required>
                                                         </div>
                                                         <p>Êtes-vous sûr de vouloir ajouter ce code promo pour ce client ?
                                                         </p>
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
                                         <td colspan="8" class="text-center">Aucun client trouvé.</td>
                                     </tr>
                                 <?php endif; ?>
                             </tbody>
                         </table>
                     </div>

                     <!-- Pagination -->
                     <div class="d-flex justify-content-center mt-4">
                         <?php echo e($clients->links()); ?>

                     </div>

                 </div>
             </div>
         </div>
     </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>