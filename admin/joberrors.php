
 <?php if (count($joberrors)>0): ?>
  <div>
    <?php foreach ($joberrors as $err): ?>
      <p style="text-align:center; margin:10px;"><?php echo $err; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
