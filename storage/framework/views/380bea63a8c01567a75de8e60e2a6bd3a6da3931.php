
<?php $__env->startSection('page-title', 'CLass Setup'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Class setup</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Class Setup</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(url('admin/class-setup')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> List
                        Class Setup</a></h6>
            </div>
            <div class="card-body">

                <form action="<?php echo e(url('admin/class_setup/update')); ?>/<?php echo e($single->class_id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Branch Name </b></label> <br>
                                <select name="branch_id" id="branch_id" class="form-select">
                                    <option value="<?php echo e($single->branch_id); ?>" selected><?php echo e($single->branch_name); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Class Name</b></label> <br>
                                <select name="class_id" id="class_id" class="form-select">
        
                                    <option  value="<?php echo e($single->class_id); ?>" selected><?php echo e($single->class_name); ?></option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b> Section Name </b></label> <br>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input name="section_id[]" type="checkbox" value="<?php echo e($section->id_section); ?>"
                                        <?php if(in_array($section->id_section, explode(',', $single->section_id))): ?> checked <?php endif; ?>> &nbsp;
                                    <?php echo e($section->section_name); ?> <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/class_setup/edit.blade.php ENDPATH**/ ?>