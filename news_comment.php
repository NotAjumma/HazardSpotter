<?php 
    include('./backend/dbconn.php');
    include ("./backend/session.php");
    session_start();
    $user = $_SESSION['username'];
    if (!isset($_SESSION['username'])) {
            header('Location: index.html');
            } 
    $news_id = $_GET['news_id'];	

    // SQL Select news by news_id
    $query = "SELECT * FROM news WHERE news_id='$news_id'";
	$result = mysqli_query($conn, $query) or die ("Error: " . mysqli_error($conn));
	$row = mysqli_fetch_array($result);

     // SQL Select comments by news_id
    $queryComment = "SELECT * FROM comments WHERE news_id='$news_id'";
	$resultComment = mysqli_query($conn, $queryComment) or die ("Error: " . mysqli_error($conn));
    $rowsComment = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);
	// $rowComment = mysqli_fetch_array($resultComment);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>News : <?php echo $row['title']; ?></title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link rel="icon" href="./assets//img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="./assets//js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Open+Sans:300,400,600,700"] },
        custom: {
          families: [
            "Flaticon",
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
          ],
          urls: ["./assets//css/fonts.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <script
      src="https://kit.fontawesome.com/607f9bcbf8.js"
      crossorigin="anonymous"
    ></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets//css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets//css/azzara.min.css" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="./assets//css/demo.css" />


        <style>
    .description-div {
        min-height: 50px; /* Set the initial minimum height of the div */
        overflow-y: hidden; /* Hide vertical scrollbar */
        border: 1px solid #ccc; /* Optional: Add a border for aesthetics */
    }
    </style>

  </head>
  <body>
    <div class="wrapper">
      <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
      <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
        <div class="logo-header">
          <a href="../index.html" class="logo" style="color: #ffffff">
            <!-- <img
              src="./assets//img/logoazzara.svg"
              alt="navbar brand"
              class="navbar-brand"
            /> -->
            HazardSpotter
          </a>
          <button
            class="navbar-toggler sidenav-toggler ml-auto"
            type="button"
            data-toggle="collapse"
            data-target="collapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon">
              <i class="fa fa-bars"></i>
            </span>
          </button>
          <button class="topbar-toggler more">
            <i class="fa fa-ellipsis-v"></i>
          </button>
          <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
              <i class="fa fa-bars"></i>
            </button>
          </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg">
          <div class="container-fluid">
            <div class="collapse" id="search-nav">
              <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pr-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </form>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              <li class="nav-item dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-toggle="dropdown"
                  href="#"
                  aria-expanded="false"
                >
                  <div class="avatar-sm">
                    <img
                      src="./assets/img/admin.png"
                      alt="..."
                      class="avatar-img rounded-circle"
                    />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg">
                        <img
                          src="./assets/img/admin.png"
                          alt="image profile"
                          class="avatar-img rounded"
                        />
                      </div>
                      <div class="u-text">
                        <h4>Admin</h4>
                        <p class="text-muted">admin@admin.com</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin_profile.php"
                      >My Profile</a
                    >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./backend/logout.php">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="sidebar-background"></div>
        <div class="sidebar-wrapper scrollbar-inner">
          <div class="sidebar-content">
            <div class="user">
              <div class="avatar-sm float-left mr-2">
                <img
                  src="./assets/img/admin.png"
                  alt="..."
                  class="avatar-img rounded-circle"
                />
              </div>
              <div class="info">
                <a
                  data-toggle="collapse"
                  href="#collapseExample"
                  aria-expanded="true"
                >
                  <span>
                    <span class="user-level" style="font-size: medium"
                      >Administrator</span
                    >
                    <span class="caret"></span>
                  </span>
                </a>
                <div class="clearfix"></div>
              </div>
            </div>
            <ul class="nav">
              <li class="nav-item">
                <a href="dashboard.php">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <!-- <span class="badge badge-count">5</span> -->
                </a>
              </li>
              <li class="nav-item">
                <a href="news-list.php">
                  <i class="fa-solid fa-newspaper fa-lg"></i>
                  <p>News</p>
                  <!-- <span class="badge badge-count">5</span> -->
                </a>
              </li>
              <li class="nav-item">
                <a href="users-list.php">
                  <i class="fa-solid fa-users fa-lg"></i>
                  <p>User</p>
                  <!-- <span class="badge badge-count">5</span> -->
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->
      <div class="main-panel">
        <div class="content">
          <div class="page-inner">
            <h4 class="page-title">News : <?php echo $row['title']; ?>.</h4>
            <div class="row">
              <div class="col-md-8">
                <div class="card card-with-nav">
                  <div class="card-header">
                    <div class="row row-nav-line">
                      <ul
                        class="nav nav-tabs nav-line nav-color-secondary"
                        role="tablist"
                      >
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            data-toggle="tab"
                            href="#profile"
                            role="tab"
                            aria-selected="false"
                            >News Details</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                  <form method="post" action="./backend/db_update_news.php">
                    <div class="card-body">
                      <div class="row mt-3">
                        <div style="display: flex; justify-content: center;" class="form-group form-group-default">
                        <img style="height: 21rem;" src="<?php echo $row['image_url'];?>" />
                            </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Title</label>
                            <input
                              type="text"
                              class="form-control"
                              name="title"
                              placeholder="title"
                              value="<?php echo $row['title']; ?>"
                              readonly
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Location</label>
                            <div
                              type="text"
                              class="form-control"
                              name="location"
                              placeholder="location"
                              value=""
                              readonly
                            ><?php echo $row['location']; ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Description</label>
                            <div
                                class="form-control description-div"
                                name="description"
                                id="description"
                                placeholder="description"
                                style="text-align: justify;"
                            ><?php echo isset($row['description']) ? $row['description'] : ''; ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Date</label>
                            <div
                              type="date"
                              class="form-control"
                              name="date"
                              value=""
                            ><?php echo $row['date']; ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-4">
                          <div class="form-group form-group-default">
                            <label>Reporter Name</label>
                            <div
                              type="text"
                              class="form-control"
                              value=""
                              name="reporter"
                              placeholder="reporter"
                              readonly
                            ><?php echo $row['reporter_name']; ?></div>
                          </div>
                        </div>
                      </div>
                        <input type="hidden" name="news_id" value="<?php echo $news_id ?>" />
                     
                      <!-- <div class="text-right mt-3 mb-3">
                        <input
                          type="submit"
                          value="Save"
                          name="save"
                          class="btn btn-success"
                        />
                      </div> -->
                    </div>
                  </form>
                </div>
            </div>

              <?php
                    if (empty($rowsComment)) {
                    ?>
                        <div class="col-md-4">
                            <!-- <div style="width: 100%; padding: 1rem; background-color: #177dff; margin-bottom: 1rem; text-align: center; color: #ffffff; font-size: 1rem;">Comments</div> -->
                            <div class="card card-profile card-secondary">
                                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg'); height: auto !important;">
                                    <div class="user-profile text-center" style="color: #ffffff;">
                                            <div class="name">No comments</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                            <div class="col-md-4">
                            <div style="width: 100%; padding: 1rem; background-color: #177dff; margin-bottom: 1rem; text-align: center; color: #ffffff; font-size: 1rem;">Comments</div>
                         <?php
                        //   print_r($rowsComment);
                            usort($rowsComment, function($a, $b) {
                            $commentDateTimeA = new DateTime($a['date']);
                            $commentDateTimeB = new DateTime($b['date']);
                            return $commentDateTimeB <=> $commentDateTimeA;
                            });
                          foreach ($rowsComment as $row) {

                            $user_id = $row['user_id'];
                            $queryUser = "SELECT * FROM user WHERE user_id='$user_id'";
                            $resultUser = mysqli_query($conn, $queryUser) or die ("Error: " . mysqli_error($conn));
                            // $row = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);
                            $rowUser = mysqli_fetch_array($resultUser);
                          ?>
                          

                                <div class="card card-profile card-secondary">
                                    <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                        <div class="user-profile text-center" style="color: #ffffff;">
                                            <div class="name" style="font-size: 1rem;"><?php echo $rowUser['name']; ?></div>
                                            <div class="job" style="color: #ffffff;"><?php echo $rowUser['email']; ?></div>
                                            <div class="desc"><?php echo calculateTimeAgo($row['date']); ?></div>
                                            <!-- <div class="desc"><?php echo $row['date']; ?></div> -->
                                    
                                            <!-- <div class="view-profile">
                                                <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card-body" style="padding-top: 1rem !important;">
                                        <div class="row user-stats text-center">
                                            
                                            <div class="col">
                                                <div style="text-align:justify !important;" class="title"><?php echo $row['comments']; ?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="card-footer">
                                        
                                    </div> -->
                                </div>

                          <?php } ?>  
                            </div>

                    <?php }?>
              </div>

          </div>
        </div>
      </div>
    </div>
    <?php
function calculateTimeAgo($commentDate) {
    $commentTimestamp = strtotime($commentDate);
    $currentTimestamp = time();
    $timeDifference = $currentTimestamp - $commentTimestamp;

    if ($timeDifference < 60) {
        return 'Just now';
    } elseif ($timeDifference < 3600) {
        $minutes = floor($timeDifference / 60);
        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($timeDifference < 86400) {
        $hours = floor($timeDifference / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } else {
        $days = floor($timeDifference / 86400);
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    }
}



    ?>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Moment JS -->
    <script src="../assets/js/plugin/moment/moment.min.js"></script>
    <!-- DateTimePicker -->
    <script src="../assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Azzara JS -->
    <script src="../assets/js/ready.min.js"></script>
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo.js"></script>
    <script>
      $("#datepicker").datetimepicker({
        format: "MM/DD/YYYY",
      });
function autoResizeDiv() {
    var descriptionDiv = document.getElementById("description");
    descriptionDiv.style.height = "auto";
    descriptionDiv.style.height = descriptionDiv.scrollHeight + "px";
}

document.addEventListener("input", autoResizeDiv);

// Call autoResizeDiv initially to set the div height correctly on page load
window.addEventListener("load", autoResizeDiv);




    </script>
  </body>
</html>
