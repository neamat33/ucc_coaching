
<?php $__env->startSection('page-title', 'Student Admission'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Student Admission</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student Admission</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(url('admin/class-setup')); ?>"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Student List</a></h6>
            </div>
            <div class="card-body">

                <form action="<?php echo e(route('students.store')); ?>" method="POST" enctype='multipart/form-data'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Student Name </b><span class="text-danger">*</span></label>
                                <input name="student_name" id="student_name" <?php echo e(old('student_name')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('student_name')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('student_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" <?php echo e(old('mobile')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('mobile')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('mobile')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" <?php echo e(old('email')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Date Of Birth </b><span class="text-danger">*</span></label>
                                <input type="date" name="dob" id="dob" <?php echo e(old('dob')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('dob')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('dob')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Image </b></label>
                                <input type="file" name="img" id="img" <?php echo e(old('img')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('img')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('img')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Name </b></label>
                                <input name="father_name" id="mobile" <?php echo e(old('father_name')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('father_name')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('father_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Name </b></label>
                                <input name="mother_name" id="mother_name" <?php echo e(old('mother_name')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('father_name')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('mother_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Mobile </b></label>
                                <input type="number" name="father_mobile" id="father_mobile" <?php echo e(old('father_mobile')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('father_mobile')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('father_mobile')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Mobile </b></label>
                                <input type="number" name="mother_mobile" id="mother_mobile" <?php echo e(old('mother_mobile')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('father_name')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('mother_mobile')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Email </b></label>
                                <input type="email" name="father_email" id="father_email" <?php echo e(old('father_email')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('father_email')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('father_email')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Email </b></label>
                                <input type="email" name="mother_email" id="mother_email" <?php echo e(old('mother_email')); ?>

                                    class="form-control mt-1" />
                                <?php if($errors->has('mother_email')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('mother_email')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="present_address" class="form-control mt-1" rows="1"><?php echo e(old('present_address')); ?></textarea>
                                <?php if($errors->has('present_address')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('present_address')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Permanent Address </b></label>
                                <textarea name="permanent_address" class="form-control mt-1" rows="1"><?php echo e(old('permanent_address')); ?></textarea>
                                <?php if($errors->has('permanent_address')): ?>
                                    <span class="invalid-feedback"><?php echo e($errors->first('permanent_address')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class=" mt-4 mb-3">
                                <h6 class="m-0 font-weight-bold text-primary">Assign Class</h6>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Branch Name </b></label>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">

                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id_branch); ?>"><?php echo e($branch->branch_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Class Name </b></label>
                                <select name="class_id" id="class_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id_class); ?>"><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Section Name </b></label> <br>
                                <select name="section_id" id="section_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    

                                </select>
                            </div>

                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Shift Name </b></label> <br>
                                <select name="shift_id" id="shift_id" class="form-select mt-1">
                                    <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($shift->id_shift); ?>"><?php echo e($shift->shift_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save Information</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        $(function() {

            $(document).on('change', '#class_id', function() {
                let class_id = $(this).val();
                let branch_id = $("#branch_id").val();
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('admin/get_section')); ?>",
                    data: {
                        'class_id': class_id, 'branch_id':branch_id
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#section_id").html(data);
                    },
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/student/create.blade.php ENDPATH**/ ?>