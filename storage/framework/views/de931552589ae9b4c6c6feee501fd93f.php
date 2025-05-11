<?php $__env->startSection('title', 'Gestion des Coachs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Liste des Coachs</h4>
                    <a href="<?php echo e(route('coaches.create')); ?>" class="btn btn-warning">
                        <i class="fas fa-plus"></i> Ajouter un Coach
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Numéro</th>
                                    <th>Code Promo</th>
                                    <th>Date de naissance</th>
                                    <th>Comptes Bancaires</th>
                                    <th>Ville</th>
                                    <th>Adresse</th>
                                    <th>Mot de passe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $coaches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($coach->nom); ?></td>
                                        <td><?php echo e($coach->prenom); ?></td>
                                        <td><?php echo e($coach->email); ?></td>
                                        <td><?php echo e($coach->numero); ?></td>
                                        <td><?php echo e($coach->code_promo); ?></td>
                                        <td><?php echo e($coach->date_naissance); ?></td>
                                        <td>
                                            <?php $__empty_2 = true; $__currentLoopData = $coach->bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <div>
                                                    <strong><?php echo e($account->bank_name); ?></strong><br>
                                                    RIB: <?php echo e($account->rib); ?>

                                                </div>
                                                <hr class="my-1">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($coach->ville); ?></td>
                                        <td><?php echo e($coach->adresse); ?></td>
                                        <td>
                                            <?php if($coach->user && $coach->user->password): ?>
                                                <button class="btn btn-sm btn-warning change-password-btn"
                                                    data-user-id="<?php echo e($coach->user->id); ?>"
                                                    data-user-name="<?php echo e($coach->user->name); ?>">
                                                    🔒 Changer
                                                </button>
                                            <?php else: ?>
                                                <span class="text-muted">Aucun mot de passe</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('coaches.edit', $coach->id)); ?>" class="btn btn-sm btn-info">
                                                <i class="typcn typcn-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-coach"
                                                data-id="<?php echo e($coach->id); ?>">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="11" class="text-center">Aucun coach trouvé</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <?php echo e($coaches->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Changer Mot de Passe -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="changePasswordForm">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Changer le mot de passe pour <span id="passwordUserName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="passwordUserId">
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="newPassword" name="password" required minlength="6">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Changer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));

            document.querySelectorAll('.change-password-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const userId = this.dataset.userId;
                    const userName = this.dataset.userName;

                    document.getElementById('passwordUserId').value = userId;
                    document.getElementById('passwordUserName').textContent = userName;
                    document.getElementById('newPassword').value = '';
                    passwordModal.show();
                });
            });

            document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const userId = document.getElementById('passwordUserId').value;
                const password = document.getElementById('newPassword').value;

                fetch(`/coaches/${userId}/change-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ password })
                })
                .then(res => res.ok ? res.json() : Promise.reject())
                .then(data => {
                    Swal.fire('Succès', 'Mot de passe mis à jour', 'success');
                    passwordModal.hide();
                })
                .catch(() => {
                    Swal.fire('Erreur', 'Échec de la mise à jour du mot de passe.', 'error');
                });
            });

            $('.delete-coach').click(function () {
                const coachId = $(this).data('id');
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/coaches/' + coachId,
                            type: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>',
                            },
                            success: function () {
                                $('button[data-id="' + coachId + '"]').closest('tr').remove();
                                Swal.fire('Supprimé !', 'Le coach a été supprimé.', 'success');
                            },
                            error: function () {
                                Swal.fire('Erreur !', 'Une erreur est survenue.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/coaches/index.blade.php ENDPATH**/ ?>