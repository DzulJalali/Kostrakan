

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/littlebar.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">


<!-- Pencari wilayah -->
<div class="container-fluid">
    <center>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
            <h2>Cari Kontrakan dan kosan</h2>
            <p class="p"> Selamat Datang Di Kostrakan</p>
            <div class="search-form wow pulse px-3 d-flex justify-content-center" data-wow-delay="0.8s">
                <form action="<?php echo e(route('search')); ?>" method="GET" class=" form-inline">
                    <div class="form-group px-3">
                        <input type="text" name="search" class="form-control" placeholder="Keyword">
                    </div>
                </form>
                <form action="<?php echo e(route('advancesearch')); ?>" method="GET" class=" form-inline">
                    <div class="form-group px-3">
                        <select id="kkId" name="advancesearch" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kota/Daerah-</option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cities->kk_id); ?>"> <?php echo e($cities->nama_kk); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group px-3">
                        <select id="tipeId" name="advancesearch" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kategori-</option>
                            <?php $__currentLoopData = $tipeBangunan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipeBangunan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tipeBangunan->tipe_id); ?>"><?php echo e($tipeBangunan->nama_tipe); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button id="findBtn" class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>

            </div>
        </div>
    </center>
</div>
<!-- End Pencari wilayah -->

<?php if(auth()->guard()->check()): ?>
<div class="container">
    <center class="py-3">
        <h3>Rekomendasi Tempat</h3>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endif; ?>

<div class="container">
    <center class="py-3">
        <h3>Kontrakan Dan Kos-Kosan</h3>
    </center>
    <div class="row">
        <?php $__currentLoopData = $detailbangunan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bangunan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card " style="width: 15rem;">
            <a href="/detail/<?php echo e($bangunan->building_id); ?>" style="text-decoration: none;">
                <div class="inner">
                    <img class="card-img" src="<?php echo e(asset('uploads/' . $bangunan->gambar1)); ?>">
                </div>
                <div class="card-body">
                    <span class="e53_74"><?php echo e($bangunan->harga); ?></span><br>
                    <span class="e53_74"><?php echo e($bangunan->nama_tipe); ?></span><br>
                    <span class="e53_76"><?php echo e($bangunan->alamat); ?></span><br>
                    <span class="e53_77"><?php echo e($bangunan->published_date); ?></span><br>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#findBtn").click(function () {
            var kk = $("kkId").val();
            var tipe = $("tipeId").val();
            alert(kk);

            $.ajax({
                type: 'get',
                dataType: 'html',
                url: "<?php echo e(url('/home/advancesearch')); ?>",
                data: 'kk_id=' + kk + '&tipe_id=' + tipe,
                success: function (response) {
                    console.log(response);
                    $("#buildingData").html(response);
                }
            });
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\App Laravel\kostrakan\Kostrakan\resources\views/home.blade.php ENDPATH**/ ?>