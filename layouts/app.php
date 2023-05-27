<?php

    use App\Core\Session;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/components/head.php'; ?>
</head>

<body>

<?php include Session::get('content'); ?>

<?php
    include 'layouts/components/footer.php';
    include 'layouts/components/scripts.php';
?>

</body>

</html>
