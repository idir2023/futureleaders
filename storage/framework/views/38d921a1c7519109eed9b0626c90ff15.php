

<?php $__env->startSection('title', 'Modifier un Drive'); ?>

<?php $__env->startSection('content'); ?>

    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Modifier un Drive</h4>
        </div>

        <form id="editDriveForm" action="<?php echo e(route('drives.update', $drive->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="drive_link">Lien Drive <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="drive_link" name="drive_link"
                            value="<?php echo e(old('drive_link', $drive->drive_link)); ?>" required>
                        <?php $__errorArgs = ['drive_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="duration">Durée <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            value="<?php echo e(old('duration', $drive->duration)); ?>" required>
                        <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Optionally, add more fields as needed -->

            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-secondary" onclick="history.back()">Annuler</button>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Optionally add dynamic features like adding/removing additional fields for drive options
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/drives/edit.blade.php ENDPATH**/ ?>