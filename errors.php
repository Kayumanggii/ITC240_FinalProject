<?php // errors page - shortest page

//IF THERE ARE ERRORS SHOW THEM TO ME - ERRORS IS AN ARRAY

if(count($errors) > 0) : ?>


<?PHP
//RUN A FOR EACH LOOP TO IDENTIFY THE ERRORS

foreach($errors as $error): ?>

<p>
<?php echo $error; ?>
</p>

<?php endforeach ?>

<?php endif ?>