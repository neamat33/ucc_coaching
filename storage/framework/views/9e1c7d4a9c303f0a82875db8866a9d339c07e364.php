
<?php $__env->startSection('page-title', 'Class List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Student</h4>
        <div class="card card-body mb-2">
            <form action="<?php echo e(route('students.index')); ?>">
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name="student_name" class="form-control" placeholder="Student Name" value="<?php echo e(request('student_name')); ?>">
                    </div>
    
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="mobile" placeholder="Student Mobile" value="<?php echo e(request('mobile')); ?>">
                    </div>
    
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <select name="class_id" id="" class="form-control">
                            <option value="">Select Class</option>
                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id_class); ?>" <?php echo e(request("class_id")==$class->id_class?"SELECTED":""); ?>><?php echo e($class->class_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group col-md-3">
                      <select name="section_id" id="" class="form-control">
                          <option value="">Select Section</option>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($section->id_section); ?>" <?php echo e(request("section_id")==$section->id_section?"SELECTED":""); ?>><?php echo e($section->section_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
    
    
                </div>
                <div class="form-row mt-2">
                    <div class="form-group float-right">
                        <button class="btn btn-primary" type="submit">
                                <i class="fa fa-sliders"></i>
                                Filter
                        </button>
                        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-info">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo e(route('students.create')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Student</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Student Name</th>
                            <th>Mobile</th>
                            <th>Branch </th>
                            <th>Class </th>
                            <th>Section </th>
                            <th>Shift </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($item->student_name); ?></td>
                            <td><?php echo e($item->mobile); ?></td>
                            <td><?php echo e($item->branch_name); ?></td>
                            <td><?php echo e($item->class_name); ?></td>
                            <td><?php echo e($item->section_name); ?></td>
                            <td><?php echo e($item->shift_name); ?></td>
                            <td>
                                        
                                <?php if($item->status_id == 1): ?>
                                    <span class="badge bg-success set-status" id="status_<?php echo e($item->id_student); ?>"
                                        onclick="setActive(<?php echo e($item->id_student); ?>)">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger set-status" id="status_<?php echo e($item->id_student); ?>"
                                        onclick="setActive(<?php echo e($item->id_student); ?>)">Inactive</span>
                                <?php endif; ?>

                            </td>
                            <td><a data-id="<?php echo e($item->id_student); ?>" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="m-2 text-right">
                    <?php echo $students->appends(Request::except("_token"))->links(); ?>

                </div>
            </div>
        </div>

    </div>
    <!-- Modal to edit record -->
       



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/student/list.blade.php ENDPATH**/ ?>