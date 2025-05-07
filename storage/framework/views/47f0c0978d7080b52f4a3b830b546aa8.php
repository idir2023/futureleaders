

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
                                                        <span class="badge bg-light text-dark"><?php echo e($index + 1); ?><sup>e</sup></span>
                                                <?php endswitch; ?>
                                            <?php else: ?>
                                                <span class="badge bg-light text-dark">Pas de rang</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php
                                            $UserCoachs = \App\Models\User::where('parrain_id', $coach->user_id)->get();
                                        ?>
                                        <td class="text-start">
                                            <?php $__currentLoopData = $UserCoachs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $UserCoach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-primary btn-sm btn-show-clients"
                                                    data-id="<?php echo e($UserCoach->id); ?>" data-level="0">
                                                    <?php echo e($UserCoach->name); ?>

                                                    <?php if($UserCoach): ?> +
                                                    <?php endif; ?>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div class="clients-container mt-2" id="clients-parraines-<?php echo e($coach->user_id); ?>"></div>
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
    $(document).ready(function() {
        $('.btn-show-clients').on('click', function() {
            var userId = $(this).data('id'); // ID of the coach
            var container = $('#clients-parraines-' + userId); // Container to display the descendants
            var level = $(this).data('level'); // Current level (0 for the first clients, 1 for the next, etc.)
            var self = $(this); // Store reference to the clicked button

            container.html('<span class="text-muted">Chargement...</span>');

            $.ajax({
                url: '/ranks/' + userId + '/clients/' + level, // Send the level parameter
                type: 'GET',
                success: function(response) {
                    if (response.descendants.length > 0) {
                        var html = '<ul class="list-group">';
                        $.each(response.descendants, function(index, client) {
                            html += '<li class="list-group-item d-flex justify-content-between align-items-center">';
                            html += '<span>' + client.name + '</span>';
                            html += '(<small class="text-muted">' + client.email + '</small>)';
                            html += '</li>';
                        });
                        html += '</ul>';
                        container.html(html);

                        // Update the level for the next request (increment level)
                        self.data('level', level + 1);
                    } else {
                        container.html('<div class="alert alert-info">Aucun client parrainé à ce niveau.</div>');
                    }
                },
                error: function() {
                    container.html('<div class="alert alert-danger">Erreur lors du chargement.</div>');
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/ranks/index.blade.php ENDPATH**/ ?>