<!-- partial:assets/new-cryptotrades-dash/partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/"><img src="<?php echo e(asset($settings['logo'])); ?>" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="<?php echo e(asset($settings['logo'])); ?>" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item nav-search d-none d-md-flex">
                <div class="nav-link">

                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="<?php echo e(url('about-us')); ?>">
                    <span class="btn btn-warning text-white">About Us</span>
                </a>


            </li>



            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="<?php echo e(asset('images/user.jpg')); ?>" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="<?php echo e(url('edit_account')); ?>" class="dropdown-item">
                        <i class="fas fa-cog text-warning"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-warning"></i>
                        Logout</a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>

                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>

    </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:assets/new-cryptotrades-dash/partials/_settings-panel.html -->


    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <div class="nav-link">
                    <div class="profile-image">
                        <img src="<?php echo e(asset('images/user.jpg')); ?>" alt="image"/>
                    </div>
                    <div class="profile-name">
                        <p class="name">
                            <?php if(session()->has('login.content')): ?>
                            <?php echo session('login.content'); ?>

                            <?php endif; ?> <?php echo e(Auth::user()->username); ?>

                        </p>
                        <p class="designation">
                            <?php echo e(Auth::user()->full_name); ?>

                        </p>
                    </div>
                </div>
            </li>
       
            <li class="nav-item <?php if(request()->path() == 'home'): ?> active <?php endif; ?>">
                <a class="nav-link " href="<?php echo e(url('home')); ?>">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
             <li class="nav-item <?php if(request()->path() == 'settings'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('settings')); ?>">
                    <i class="fa fa-cog menu-icon"></i>
                    <span class="menu-title">Web Settings</span>
                </a>
            </li>
              <li class="nav-item <?php if(request()->path() == 'manage-deposit'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('manage-deposit')); ?>">
                    <i class="fa fa-hands-helping menu-icon"></i>
                    <span class="menu-title">Manage Deposit</span>
                </a>
            </li>
              <li class="nav-item <?php if(request()->path() == 'manage-withdraw'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('manage-withdraw')); ?>">
                    <i class="fa fa-handshake menu-icon"></i>
                    <span class="menu-title">Manage Withdraw</span>
                </a>
            </li>
            
              <li class="nav-item <?php if(request()->path() == 'users'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('users')); ?>">
                    <i class="fa fa-users-cog menu-icon"></i>
                    <span class="menu-title">Manage Users</span>
                </a>
            </li>
              <li class="nav-item <?php if(request()->path() == 'plan-setting'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('plan-setting')); ?>">
                    <i class="fa fa-box-open menu-icon"></i>
                    <span class="menu-title">Plans Setting</span>
                </a>
            </li>
               <li class="nav-item <?php if(request()->path() == 'compound-setting'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('compound-setting')); ?>">
                    <i class="fa fa-times-circle menu-icon"></i>
                    <span class="menu-title">Compounds Setting</span>
                </a>
            </li>
               <li class="nav-item <?php if(request()->path() == 'coin-setting'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('coin-setting')); ?>">
                    <i class="fa fa-database menu-icon"></i>
                    <span class="menu-title">Coins Setting</span>
                </a>
            </li>
			  <li class="nav-item <?php if(request()->path() == 'mailing'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('mailing')); ?>">
                    <i class="fa fa-box menu-icon"></i>
                    <span class="menu-title">Mailling System</span>
                </a>
            </li>
            <?php endif; ?>
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
            <li class="nav-item <?php if(request()->path() == 'deposit'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('deposit')); ?>">
                    <i class="fa fa-share-square menu-icon"></i>
                    <span class="menu-title">Make Deposit</span>
                </a>
            </li>
            <li class="nav-item  <?php if(request()->path() == 'withdraw'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('withdraw')); ?>">
                    <i class="fa fa-download menu-icon"></i>
                    <span class="menu-title">Request Withdraw</span>
                </a>
            </li>
            <li class="nav-item <?php if(request()->path() == 'deposit_list'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('deposit_list')); ?>">
                    <i class="fa fa-list menu-icon"></i>
                    <span class="menu-title">Deposit List</span>
                </a>
            </li>
              <li class="nav-item <?php if(request()->path() == 'withdraw_history'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('withdraw_history')); ?>">
                    <i class="fa fa-money-bill menu-icon"></i>
                    <span class="menu-title">Withdraw History</span>
                </a>
            </li>
            <li class="nav-item <?php if(request()->path() == 'earnings'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('earnings')); ?>">
                    <i class="fa fa-list-ol menu-icon"></i>
                    <span class="menu-title">Earnings</span>
                </a>
            </li>
            <li class="nav-item <?php if(request()->path() == 'referals'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('referals')); ?>">
                    <i class="fa fa-unlink menu-icon"></i>
                    <span class="menu-title">Referrals</span>
                </a>
            </li>
            <li class="nav-item <?php if(request()->path() == 'referallinks'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('referallinks')); ?>">
                    <i class="fa fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Promotional Banners</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item <?php if(request()->path() == 'edit_account'): ?> active <?php endif; ?>">
                <a class="nav-link" href="<?php echo e(url('edit_account')); ?>">
                    <i class="fa fa-cogs menu-icon"></i>
                    <span class="menu-title">Account Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">

                    <i class="fa fa-arrow-circle-right menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>





        </ul>
    </nav>
<?php /**PATH C:\xampp\htdocs\naijacrawl soft\new_ik_btc\greengold\resources\views/layouts/navuser.blade.php ENDPATH**/ ?>