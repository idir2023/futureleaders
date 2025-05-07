<?php $__env->startSection('title', 'Gestion des Drives'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Liste des Drives</h4>
                <a href="<?php echo e(route('drives.create')); ?>" class="btn btn-warning">
                    <i class="fas fa-plus"></i> Ajouter un Drive
                </a>
            </div>
            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Lien Drive</th>
                                <th>Durée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><a href="<?php echo e($drive->drive_link); ?>" target="_blank"><?php echo e($drive->drive_link); ?></a></td>
                                    <td><?php echo e($drive->duration); ?> Mois</td>
                                    <td>
                                        <a href="<?php echo e(route('drives.edit', $drive->id)); ?>" class="btn btn-sm btn-info">
                                            <i class="typcn typcn-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger delete-drive" data-id="<?php echo e($drive->id); ?>">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center">Aucun drive trouvé</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <?php echo e($drives->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.delete-drive').click(function() {
            let driveId = $(this).data('id');
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
                        url: `/drives/${driveId}`,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '<?php echo e(csrf_token()); ?>',
                        },
                        success: function(response) {
                            $('button[data-id="' + driveId + '"]').closest('tr').remove();
                            Swal.fire('Supprimé !', 'Le drive a été supprimé.', 'success');
                        },
                        error: function() {
                            Swal.fire('Erreur !', 'Une erreur est survenue.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/drives/index.blade.php ENDPATH**/ ?>