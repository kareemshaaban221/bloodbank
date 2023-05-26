<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/head.php'; ?>
</head>

<body>

<?php include "{$_SESSION['content']}"; ?>

<?php
    include 'components/footer.php';
    include 'components/scripts.php';
?>

</body>

</html>
