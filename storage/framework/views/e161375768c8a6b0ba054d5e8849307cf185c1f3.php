

<?php $__env->startSection('content'); ?>
<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo e(route('createBangunan')); ?>"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Published Date</th>
                    <th>Status</th>
                    <th>Tipe Bangunan</th>
                    <th>Jumlah Ruangan</th>
                    <th>Luas Bangunan</th>
                    <th>Jumlah Lantai</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Gambar 1</th>
                    <th>Gambar 2</th>
                    <th>Gambar 3</th>
                    <th>Gambar 4</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bangunan as $bangunan): ?>
                    <tr>
                    <td><?php echo e($bangunan->building_id); ?></td>
                    <td><?php echo e($bangunan->alamat); ?></td>
                    <td><?php echo e($bangunan->nama_kk); ?></td>
                    <td><?php echo e($bangunan->published_date); ?></td>
                    <td><?php echo e($bangunan->status); ?></td>
                    <td><?php echo e($bangunan->nama_tipe); ?></td>
                    <td><?php echo e($bangunan->jmlh_ruangan); ?></td>
                    <td><?php echo e($bangunan->luas_bangunan); ?></td>
                    <td><?php echo e($bangunan->jmlh_lantai); ?></td>
                    <td><?php echo e($bangunan->keterangan_fasilitas); ?></td>
                    <td><?php echo e($bangunan->harga); ?></td>
                    <td>
                        <img src="<?php echo e(asset('uploads/' . $bangunan->gambar1)); ?>" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="<?php echo e(asset('uploads/' . $bangunan->gambar2)); ?>" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="<?php echo e(asset('uploads/' . $bangunan->gambar3)); ?>" width="200px" height="200px">
                    </td>
                    <td>
                        <img src="<?php echo e(asset('uploads/' . $bangunan->gambar4)); ?>" width="200px" height="200px">
                    </td>
                        <td>
                            <a href="<?php echo e(route('editBangunan', $bangunan->building_id)); ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?php echo e(route('deleteBangunan', $bangunan->building_id)); ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\App Laravel\kostrakan\Kostrakan\resources\views/crud/bangunan/index.blade.php ENDPATH**/ ?>