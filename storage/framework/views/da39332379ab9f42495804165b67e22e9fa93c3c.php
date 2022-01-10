

<?php $__env->startSection('content'); ?>

<div id="content">

    <div class="container-fluid">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
        </div>


        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Halaman Approve User -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php if(session('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('message')); ?>

                                    </div>
                                <?php endif; ?>
                                <table class="table" style="padding-top:100px;" >
                                    <tr align="center">
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Nomor Ponsel</th>
                                        <th>Nomor Induk Kependudukan</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    <?php $__empty_1 = true; $__currentLoopData = $owner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 

                                    <tr align="center">
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->nama); ?></td>
                                        <td><?php echo e($user->no_hp); ?></td>
                                        <td><?php echo e($user->nik); ?></td>
                                        <td><?php echo e($user->alamat); ?></td>
                                        <td><?php echo e($user->approved_status); ?></td>
                                        <?php if($user->approved_status != 'approved'): ?>
                                        <td><a href="<?php echo e(route('approve', $user->owner_id)); ?>"
                                            class="btn btn-primary btn-sm">Approve</a></td>
                                        <?php else: ?>
                                        <td><a href="<?php echo e(route('removeApprove', $user->owner_id)); ?>"
                                            class="btn btn-danger btn-sm">Remove</a></td>
                                        <?php endif; ?>
                                    </tr>       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4">No users found.</td>
                                    </tr>
                                    
                                    <?php endif; ?>      
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\App Laravel\kostrakan\Kostrakan\resources\views/admin/home.blade.php ENDPATH**/ ?>