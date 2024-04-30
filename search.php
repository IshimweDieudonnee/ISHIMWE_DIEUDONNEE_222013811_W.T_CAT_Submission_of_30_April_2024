<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }
    include 'connect.php';
    $query = $_POST['query'];
    $sel1 = mysqli_query($con, "SELECT * FROM students WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%' OR address LIKE '%$query%' OR class LIKE '%$query%'");
    $sel2 = mysqli_query($con, "SELECT * FROM staff WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%' OR position LIKE '%$query%' OR address LIKE '%$query%'");

    
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Students</title>
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
      <h1>Search results</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Search</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (mysqli_num_rows($sel1) !=0 ) {
                        
                        ?>
                        <h5 class="card-title">Students</h5>
                            <?php
                                while ($row1 = mysqli_fetch_array($sel1)) {
                            ?>
                            <div class="my-4">
                                <strong><a href="student.php?id=<?php echo $row1['stid'];?>"><?php echo $row1['firstname']." ".$row1['lastname'];?></a></strong>
                                <p>
                                    <b>RegNo: </b> <?php echo $row1['regno'];?><br>
                                    <b>Address: </b> <?php echo $row1['address'];?><br>
                                    <b>Phone: </b> <?php echo $row1['phone'];?><br>
                                    <b>Class: </b> <?php echo $row1['class'];?><br>
                                    <b>Date of birth: </b> <?php echo $row1['dob'];?><br>
                                </p>
                            </div>
                            <?php
                                }
                            ?>
                    <?php
                    }
                    ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        if (mysqli_num_rows($sel2) != 0 ) {
                        
                        ?>
                        
                        <h5 class="card-title">Employees</h5>
                        <?php
                            while ($row2 = mysqli_fetch_array($sel2)) {
                        ?>
                      
                        <div class="my-4">
                                <strong><a href="employee.php?id=<?php echo $row2['empid'];?>"><?php echo $row2['firstname']." ".$row2['lastname'];?></a></strong>
                                <p>
                                    <b>Address: </b> <?php echo $row2['address'];?><br>
                                    <b>Phone: </b> <?php echo $row2['phone'];?><br>
                                    <b>Position: </b> <?php echo $row2['position'];?><br>
                                    <b>Date of birth: </b> <?php echo $row2['dob'];?><br>
                                </p>
                            </div>
                        <?php
                            }
                        }

                        ?>
                    </div>
                    <?php
                    if (mysqli_num_rows($sel1) === 0 && mysqli_num_rows($sel2) === 0) {
                        
                        ?>
                        <h4 class="my-4 text-center">No result found for "<?php echo $query;?>"</h4>
                        <?php
                        }
                        ?>
                </div>
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