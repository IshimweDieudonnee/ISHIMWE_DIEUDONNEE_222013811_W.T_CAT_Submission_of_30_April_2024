<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }
    include 'connect.php';

    $id = $_GET['id'];
    
    $sel = mysqli_query($con, "SELECT * FROM staff WHERE empid=$id ");
    $row = mysqli_fetch_array($sel);

    if (isset($_POST['sub'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $position = $_POST['position'];
      

      $update = mysqli_query($con, "UPDATE staff SET firstname='$firstname', lastname='$lastname', dob='$dob', phone='$phone', address='$address', position='$position' WHERE empid=$id");
      if ($update) {
        header("location:staff.php");
      }
    }
      if (isset($_GET['del'])) {
        mysqli_query($con, "DELETE from staff WHERE empid=$id");
        header("location:staff.php");
      }
    $user = mysqli_query($con, "SELECT * FROM users JOIN staff ON users.empid=staff.empid WHERE userid=".$_SESSION['id']);
    $d = mysqli_fetch_array($user);
?>
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employee</title>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Staff</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center text-center">

              <i class="bi bi-person-circle h1 rounded-circle" style="font-size:80px"></i>
              <h2><?php echo $row['firstname']." ".$row['lastname']; ?></h2>
              <h3 class="mt-3"><?php echo $row['position'];?></h3>
              <div class="mt-2">
                    
              <!-- Small Modal -->
              <?php
                if ($id != $d['empid']) {
               ?>
                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#smallModal">
                  <i class="ri-delete-bin-6-line"></i>
                </button>
                <?php
                  }
                ?>
                <div class="modal fade" id="smallModal" tabindex="-1">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content bg-light">
                      <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body d-flex align-items-center">
                        <div class="">
                          <i class="bi bi-exclamation-triangle-fill h2 text-warning"></i>
                        </div>
                        Are you sure you want to delete <?php echo $row['firstname']." ".$row['lastname']; ?>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a href="?id=<?php echo $id?>&del=1" class="btn btn-success">Delete</a>
                      </div>
                    </div>
                  </div>
                </div><!-- End Small Modal-->
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit info</button>
                </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview mt-3" id="profile-overview">
                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['dob'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">Rwanda</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['address'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['phone'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['position'];?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post">
                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $row['firstname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['lastname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="dob" type="date" class="form-control" id="dob" value="<?php echo $row['dob'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="address" type="text" class="form-control" id="Address" value="<?php echo $row['address'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="phone" type="text" class="form-control" id="Phone" value="<?php echo $row['phone'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input required name="position" type="text" class="form-control" id="position" value="<?php echo $row['position'];?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Save Changes" name="sub">
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


              </div><!-- End Bordered Tabs -->

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