

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

                                        <td class="text-start">
                                            <?php $__empty_2 = true; $__currentLoopData = $coach->parraineClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <a href="javascript:void(0)"
                                                    class="show-parrain-modal d-inline-flex align-items-center gap-2 mb-1 px-3 py-2 rounded-pill"
                                                    data-user-id="<?php echo e($consultation->user->id ?? 0); ?>"
                                                    data-user-name="<?php echo e($consultation->user->name ?? 'Non défini'); ?>"
                                                    style="background-color: #d1ecf1; color: #0c5460; text-decoration: none; font-weight: 500; font-size: 0.95rem;">

                                                    <span><?php echo e($consultation->user->name ?? 'Non défini'); ?></span>
                                                    <span
                                                        style="color: #007bff; font-weight: bold; font-size: 1rem;">＋</span>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                <span class="text-muted">Aucun</span>
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

                    <!-- Modal -->
                    <div class="modal fade" id="parrainModal" tabindex="-1" aria-labelledby="parrainModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="parrainModalLabel">Clients parrainés par <span
                                            id="modalClientName"></span></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body" id="modalClientList">
                                    Chargement...
                                </div>
                            </div>
                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.show-parrain-modal').forEach(function(el) {
                el.addEventListener('click', function() {
                    const userId = this.dataset.userId;
                    const userName = this.dataset.userName;

                    document.getElementById('modalClientName').innerText = userName;
                    document.getElementById('modalClientList').innerHTML = 'Chargement...';

                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('parrainModal'));
                    modal.show();

                    // Fetch parrainés
                    fetch(`/ranks/${userId}/clients`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.length > 0) {
                                const list = data.map(client =>
                                    `<li>${client.name} (${client.email})</li>`).join('');
                                document.getElementById('modalClientList').innerHTML =
                                    `<ul>${list}</ul>`;
                            } else {
                                document.getElementById('modalClientList').innerHTML =
                                    `<p class="text-muted">Aucun client parrainé.</p>`;
                            }
                        })
                        .catch(err => {
                            document.getElementById('modalClientList').innerHTML =
                                `<p class="text-danger">Erreur lors du chargement.</p>`;
                        });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/ranks/index.blade.php ENDPATH**/ ?>