
<?php $__env->startSection('page-title', 'Designation List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Branch</h4>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Room List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Branch</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($item->branch_name); ?></td>
                            <td><?php echo e($item->branch_address); ?></td>
                            <td>
                                        
                                <?php if($item->status_id == 1): ?>
                                    <span class="badge bg-success set-status" id="status_<?php echo e($item->id_branch); ?>"
                                        onclick="setActive(<?php echo e($item->id_branch); ?>)">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger set-status" id="status_<?php echo e($item->id_branch); ?>"
                                        onclick="setActive(<?php echo e($item->id_branch); ?>)">Inactive</span>
                                <?php endif; ?>

                            </td>
                            <td><a data-id="<?php echo e($item->id_branch); ?>" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                            </a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal fade  mb-5" id="AddModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Branch</h5>
                    </div>
                    <form action="<?php echo e(route('branch.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <input type="text" class="form-control" name="branch_name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Branch Address</label>
                                <textarea name="branch_address" rows="2" class="form-control"></textarea>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to edit record -->
    <div class="modal fade  mb-5" id="EditModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Occupation</h5>
                    </div>
                    <form id="update-form" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Branch Address</label>
                                <textarea id="branch_address" name="branch_address" rows="2" class="form-control"></textarea>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            $(function(){
                 $(document).on('click', '.editBtn', function() {
                let id = $(this).data("id");
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(url('admin/branch_edit')); ?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#branch_name').val(data.branch_name);
                        $('#branch_address').val(data.branch_address);
                        var id = data.id_branch; 
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "<?php echo e(url('admin/update-branch')); ?>/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });
            })
            
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/branch/list.blade.php ENDPATH**/ ?>