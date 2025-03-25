<div class="tab-pane fade" id="a_password" role="tabpanel" aria-labelledby="item_password">
    <form action="<?= base_url('admin/gantipassword'); ?>" method="post">
    <?= csrf_field() ?>
        <div class="form-group">
        <label for="olpass">Password Lama</label>
        <input type="password" class="form-control" id="olpass" placeholder="Password Lama" name="oldpass">
        </div>
        <?= session('errors.oldpass')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.oldpass').'</div>':''; ?>
        <div class="form-group">
        <label for="p1pass">Password Baru</label>
        <input type="password" class="form-control" id="p1pass" placeholder="Password Baru" name="newpass">
        </div>
        <?= session('errors.newpass')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.newpass').'</div>':''; ?>
        <div class="form-group">
        <label for="p2pass">Ulangi Password Baru</label>
        <input type="password" class="form-control" id="p2pass" placeholder="Ulangi Password Baru" name="repass">
        </div>
        <?= session('errors.repass')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.repass').'</div>':''; ?>
        <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
    </form>
</div>