

<?php $__env->startSection('title', 'Gestion des ranks'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-warning-100 text-white d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">🏆 Classement des Coachs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th><i class="bi bi-person"></i> Coach</th>
                                    <th><i class="bi bi-envelope"></i> Email</th>
                                    <th><i class="bi bi-people"></i> Clients uniques</th>
                                    <th><i class="bi bi-trophy"></i> Rang</th>
                                    <th><i class="bi bi-person-lines-fill"></i> Clients Parrainés</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $coachs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo e($coachs->firstItem() + $index); ?></td>
                                        <td><?php echo e($coach->nom); ?> <?php echo e($coach->prenom); ?></td>
                                        <td><?php echo e($coach->email); ?></td>
                                        <td>
                                            <span class="badge bg-success px-3 py-2">
                                                <?php echo e($coach->clients_count); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if($coach->clients_count > 0): ?>
                                                <?php switch($index):
                                                    case (0): ?>
                                                        <span class="badge bg-warning text-dark fs-6">🥇 1er</span>
                                                    <?php break; ?>

                                                    <?php case (1): ?>
                                                        <span class="badge bg-secondary fs-6">🥈 2ème</span>
                                                    <?php break; ?>

                                                    <?php case (2): ?>
                                                        <span class="badge bg-orange text-white fs-6">🥉 3ème</span>
                                                    <?php break; ?>

                                                    <?php default: ?>
                                                        <span
                                                            class="badge bg-light text-dark"><?php echo e($index + 1); ?><sup>e</sup></span>
                                                <?php endswitch; ?>
                                            <?php else: ?>
                                                <span class="badge bg-light text-dark">Pas de rang</span>
                                            <?php endif; ?>
                                        </td>

                                        <?php
                                            $clients = \App\Models\User::where('parrain_id', $coach->user_id)->get();
                                        ?>

                                        <td class="text-start">
                                            <?php if($clients->count() > 0): ?>
                                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="mb-1">
                                                        <span class="badge bg-light text-dark">
                                                            <?php echo e($client->name); ?>

                                                            <?php
                                                                $clients_count = \App\Models\User::where('parrain_id', $client->id)->count();
                                                            ?>
                                                        </span>
                                                        <?php if($clients_count > 0): ?>
                                                        <a href="javascript:void(0)" class="show-parrain-modal"
                                                            data-user-id="<?php echo e($client->id); ?>">
                                                            <span
                                                                style="color: #007bff; font-weight: bold; font-size: 1rem;">＋</span>
                                                        </a>
                                                        <?php endif; ?>

                                                        <!-- Contenu à afficher dynamiquement -->
                                                        <div id="parrain-content-<?php echo e($client->id); ?>" class="mt-2 ms-3"
                                                            style="display: none;"></div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <span class="badge bg-light text-dark">Pas de clients parrainés</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">Aucun coach trouvé</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        
                        <div class="mt-4 d-flex justify-content-center">
                            <?php echo e($coachs->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
    
    <script>
        $(document).ready(function () {
            var isProcessing = {};

            $(document).on('click', '.show-parrain-modal', function (e) {
                e.preventDefault();
                e.stopPropagation();

                var $this = $(this);
                let userId = $this.data('user-id');
                let targetDiv = $('#parrain-content-' + userId);

                // Empêche les requêtes multiples
                if (isProcessing[userId]) {
                    return;
                }

                // Si déjà visible, cacher et remettre le bouton à ＋
                if (targetDiv.is(':visible')) {
                    targetDiv.slideUp();
                    $this.find('span').text('＋');
                    return;
                } else {
                    $this.find('span').text('−');
                }

                isProcessing[userId] = true;
                targetDiv.html('<p class="text-muted">Chargement...</p>').slideDown();

                $.ajax({
                    url: '/ranks/' + userId + '/clients',
                    method: 'GET',
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if (data.clients && data.clients.length > 0) {
                            let html = '<ul class="list-group">';
                            data.clients.forEach(function (client) {
                                const clientId = client.id || '';
                                html += `
                                    <li class="list-group-item py-1 px-2 d-flex justify-content-between align-items-center">
                                        <span>${client.name || 'Sans nom'}</span>
                                        <a href="javascript:void(0)" class="show-parrain-modal" data-user-id="${clientId}">
                                            <span style="color: #007bff; font-weight: bold; font-size: 1rem;">＋</span>
                                        </a>
                                        <div id="parrain-content-${clientId}" class="mt-2 ms-3" style="display: none;"></div>
                                    </li>`;
                            });
                            html += '</ul>';
                            targetDiv.html(html);
                        } else {
                            targetDiv.html('<p class="text-muted">Aucun client parrainé trouvé.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        targetDiv.html('<p class="text-danger">Erreur lors du chargement. Veuillez réessayer.</p>');
                    },
                    complete: function () {
                        isProcessing[userId] = false;
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/ranks/index.blade.php ENDPATH**/ ?>