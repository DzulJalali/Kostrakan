

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/detail.css')); ?>">
<script src="<?php echo e(asset('js/detail.js')); ?>"></script>

<!-- Profile -->
<div class="card">
    <img class="profile-picture" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->profile_image); ?>" alt="profile" width="100" class="img-tumbnail rounded-circle">
    <h1 class="nama"><?php echo e($detail->name); ?></h1>
    <p class="title"><?php echo e($detail->status); ?></p>
    <p><button class="btn btn-success">View Phone</button></p>
</div>
<!-- Container for the image gallery -->
<div class="container-gambar">
    <div class="mySlides">
        <div class="numbertext">1 / 4</div>
        <img class="img" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar1); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 4</div>
        <img class="img" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar2); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 4</div>
        <img class="img" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar3); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 4</div>
        <img class="img" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar4); ?>" style="width:100%">
    </div>

        <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container">
        <p id="caption"></p>
    </div>

</div>
<!-- Full-width images with number text -->



<!-- Thumbnail images -->
<div class="row my-3">
    <div class="column mx-3">
        <img class="demo cursor" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar1); ?>" style="width:100%"
            onclick="currentSlide(1)" alt="Gambar 1">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar2); ?>" style="width:100%"
            onclick="currentSlide(2)" alt="Gambar 2">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar3); ?>" style="width:100%"
            onclick="currentSlide(3)" alt="Gambar 3">
    </div>
    <div class="column mx-3">
        <img class="demo cursor" src="<?php echo e(asset('/uploads')); ?>/<?php echo e($detail->gambar4); ?>" style="width:100%"
            onclick="currentSlide(4)" alt="Gambar 4">
    </div>
</div>


<!--GENERAL INFORMATION-->

<div class="general-information">
    <span class="info">General Information</span>
    <div class="row">
        <table class="table table-borderless" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <th scope="row">Alamat</th>
                    <td class="alamat"><?php echo e($detail->alamat); ?></td>
                    <th scope="row">Jumlah Lantai</th>
                    <td><?php echo e($detail->jmlh_lantai); ?></td>
                </tr>
                <tr>
                    <th scope="row">Kota / Daerah</th>
                    <td><?php echo e($detail->nama_kk); ?></td>
                    <th scope="row">Fasilitas</th>
                    <td><?php echo e($detail->keterangan_fasilitas); ?></td>
                </tr>
                <tr>
                    <th scope="row">Published Date</th>
                    <td><?php echo e($detail->published_date); ?></td>
                    <th scope="row">Harga</th>
                    <td><?php echo e($detail->harga); ?></td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td><?php echo e($detail->status); ?></td>
                </tr>
                <tr>
                    <th scope="row">Tipe Bangunan</th>
                    <td><?php echo e($detail->nama_tipe); ?></td>
                </tr>
                <tr>
                    <th scope="row">Jumlah Ruangan</th>
                    <td><?php echo e($detail->jmlh_ruangan); ?></td>
                </tr>
                <tr>
                    <th scope="row">Luas Ruangan</th>
                    <td><?php echo e($detail->luas_bangunan); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\App Laravel\kostrakan\Kostrakan\resources\views/user/detail.blade.php ENDPATH**/ ?>