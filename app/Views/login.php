<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="<?= base_url()?>favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/lte/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>kdir</b>lulus</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start <b>kdir</b>lulus</p>

                <form action="<?= base_url('auth/logproses') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>" autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-check"></span>
                            </div>
                        </div>
                      </div>
                      <?= session('errors.username')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.username').'</div>':''; ?>
                    
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= session('errors.password')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.password').'</div>':''; ?> 
                    <div class="input-group mb-3">
                        <select class="form-control" name="tapel">
                            <?php foreach($tapel as $tp): ?>
                                <?=$tp->tp_id?><option value="<?=$tp->tp_id?>"><?=$tp->tp_nama?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-clock"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/lte/js/adminlte.min.js"></script>
</body>
</html>