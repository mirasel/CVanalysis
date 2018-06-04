<?php if (count($errors)>0): ?>
  <div>
    <?php foreach ($errors as $error): ?>
      <p style="text-align:center; margin:10px;"><?php echo $error; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
