 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?php echo e(url('/admin/home')); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('user')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA USER</span>
         </a>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('bangunan')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA BANGUNAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('daerah')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA DAERAH</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('kecamatan')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KECAMATAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('kelurahan')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KELURAHAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('tipeBangunan')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA TIPE BANGUNAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('cities')); ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KOTA/KABUPATEN</span>
         </a>
     </li>


     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <?php if(auth()->guard()->guest()): ?>
         <?php if(Route::has('login')): ?>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
     </li>
     <?php endif; ?>

     <?php if(Route::has('register')): ?>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
     </li>
     <?php endif; ?>
     <?php else: ?>
     <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false" v-pre>
             <?php echo e(Auth::user()->name); ?>

         </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 <?php echo e(__('Logout')); ?>

             </a>

             <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                 <?php echo csrf_field(); ?>
             </form>
         </div>
     </li>
     <?php endif; ?>
     </li>

 </ul>
 <!-- End of Sidebar -->
<?php /**PATH E:\Kuliah\App Laravel\kostrakan\Kostrakan\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>