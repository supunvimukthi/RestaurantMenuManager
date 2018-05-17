<?php  if (count($errors) > 0) : ?>
    <div class="form-group">
        <?php foreach ($errors as $error) : ?>
            <p  class="form-control" style="color: darkred"><?php echo $error ?></p>
        <?php endforeach ?>
    </div>

<?php  endif ?>