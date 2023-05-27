<?php
    include 'layouts/components/header-parts/nav.php';
    include 'layouts/components/header-parts/header2.php';
?>

<?php
// if(!isset($_SESSION['patient_id'])){
//     header("location:../visitor/index.php");
//     exit;
// }
?>

<?php if (isset($_GET['massage'])): ?>
    <div class='alert alert-success alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= $_GET['massage'] ?>
        </strong>
    </div>
<?php endif; ?>

<!-- * for patient -->
<!-- Login Start -->
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Request For Donation</h1>
        <img src="imgs/logo.png" alt="">
        <form action="../backend/insert_in_patient_request.php" method="post">
            <select class="username" name="type" id="">
                <option value="" disabled selected>Select Blood Type</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
            </select>
            <!-- <input class="password" type="date" placeholder="Date" required> -->
            <div class="reg-group">
                <button class="btn btn-danger" type="submit" style="width: 200px;">Send Request</button>
            </div>
        </form>
    </div>
</section>
<!-- Footer Start -->
<section class="bg-dark text-light p-3 text-center">
    <div class="container">
        <h5>© Designed By Blood Bank Team</h5>
    </div>
</section>
<!-- Footer End -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="../js/swiper.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
</body>

</html>