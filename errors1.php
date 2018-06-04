
 <?php if (count($errors1)>0): ?>
  <div>
    <?php foreach ($errors1 as $err): ?>
      <p style="text-align:center; margin:10px;"><?php echo $err; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
