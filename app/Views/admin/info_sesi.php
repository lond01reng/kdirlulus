<?php if (! empty(session()->getFlashdata('errors'))): ?>
  <?php $errors= session()->getFlashdata('errors'); ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?php foreach ($errors as $error): ?>
        <?= esc($error) ?><br>
      <?php endforeach ?>
      <?php
      ?>
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif ?>
<?php if (! empty(session()->getFlashdata('success'))): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session('success');?>
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
<?php endif ?>