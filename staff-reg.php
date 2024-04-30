<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }
    include 'connect.php';

    if (isset($_POST['send'])) {
        
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $position = $_POST['position'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];

      $insert = mysqli_query($con, "INSERT INTO staff VALUES(null,'$firstname','$lastname','$phone','$address','$position','$dob')");
      if ($insert) {
        header("location:staff.php");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employee Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
    <?php include './assets/navbar.php' ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include './assets/sidebar.php' ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employee registration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Registration</li>
          <li class="breadcrumb-item active">Staff</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registration Form</h5>

              <form class="row g-3 needs-validation" novalidate method="post">
           
                <div class="col-md-6">
                  <label for="firstname" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                  <div class="invalid-feedback">Please write a First Name.</div>
                </div>
                <div class="col-md-6">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                  <div class="invalid-feedback">Please write a Last Name.</div>
                </div>
                <div class="col-md-6">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" class="form-control" id="position" name="position" required>
                  <div class="invalid-feedback">Please write employee's position.</div>
                </div>
                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" id="inputAddres5" name="dob" required>
                  <div class="invalid-feedback">Please select a date of birth.</div>
                </div>

                <div class="col-6">
                  <label for="inputAddress2" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddress2" name="address" required>
                  <div class="invalid-feedback">Please write address.</div>
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="inputCity" name="phone" required>
                  <div class="invalid-feedback">Please write a phone number.</div>
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="Submit" name="send">
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './assets/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>