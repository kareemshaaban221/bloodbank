<?php

use App\Core\Request;

?>

<?php if (Request::get('message')): ?>
    <div class='alert alert-success alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= Request::get('message') ?>
        </strong>
    </div>
<?php endif; ?>