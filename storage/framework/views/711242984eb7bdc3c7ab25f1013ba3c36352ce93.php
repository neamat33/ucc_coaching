<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UCC Coaching | Admin Login</title>
    <meta name="title" content="East Foundation Barisal">
    <meta name="keywords" content="East Foundation, Foundation Barisal, East Foundation Barishal">
    <meta name="author" content="Md Monirul Islam">
    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/asset/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>UCC Barisal</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="<?php echo e(route('admin.login')); ?>">
            <?php echo csrf_field(); ?>
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" name="email" type="email" placeholder="Email" autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" name="password" type="password" placeholder="Password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">



                    </div>
                    
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?php echo e(asset('admin/asset/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/asset/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/asset/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/asset/js/main.js')); ?>"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo e(asset('admin/asset/js/plugins/pace.min.js')); ?>"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>
<?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>