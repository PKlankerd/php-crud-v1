<?php 

    include_once('functions.php');
    include_once("include/db_connect.php");
    $insertdata = new DB_con();

    if (isset($_POST['insert'])) {
        $prefix = $_POST['prefix'];
        $fname = $_POST['Name'];
        $lname = $_POST['lastname'];
        $position = $_POST['position'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Role = $_POST['Role'];
        $status = $_POST['status'];
        
        $sql = $insertdata->insert($prefix,$fname,$lname,$position,$address,$email,$PhoneNumber,
        $username,$password,$Role,$status);

        if ($sql) {
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='insert.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
</head>
<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-hand'></i>
            <span class="logo_name">CRUD TEST</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="link_name">HOME</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="index.php">HOME</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">constant</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">**constant**</a></li>
                    <li><a href="insert.php">Members</a></li>

                </ul>
            </li>
        </ul>
    </div>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
        </div>
        <div class="container" >
            <h1 class="mt-5">Insert Page</h1>
            <a href="index.php" class="btn btn-primary mt-3">Go Back</a>
            <hr>
            <form action="" method="post">
                <div class="col-md-6 mt-8" align="center">
                    <label for="prod code"><i class='bx bx-bookmark-plus'></i>PROD CODE:</label><br>
                    <select name="prefix" id="employee" class="form-select form-select-sm prdno "
                        aria-label="Default select example" >
                        <option value="" selected="selected">Select prefix</option>
                        <?php
                                        $sql = "SELECT  PrefixName	FROM prefix ORDER BY PrefixName ASC";
                                        $resultset = mysqli_query($conn, $sql);
                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                        ?>

                        <option value="<?php echo $rows["PrefixName"]; ?>"><?php echo $rows["PrefixName"]; ?></option>

                        <?php }	?>
                    </select>
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="First Name"><i class='bx bx-user-pin'></i>????????????:</label><br>
                    <input type="text" name="Name" v-model="first_name" class="form-control  form-control-sm "
                         maxlength="25">
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Last Name"><i class='bx bx-user-pin'></i>?????????????????????:</label><br>
                    <input type="text" name="lastname" v-model="last_name" class="form-control form-control-sm"
                       maxlength="25">
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Position"><i class='bx bx-bookmark-plus'></i>Position:</label><br>
                    <select name="position" id="position" class="form-select form-select-sm prdno "
                        aria-label="Default select example" >
                        <option value="" selected="selected">Select Position</option>
                        <?php
                                        $sql = "SELECT  PositionName FROM position ORDER BY PositionName ASC";
                                        $resultset = mysqli_query($conn, $sql);
                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                        ?>

                        <option value="<?php echo $rows["PositionName"]; ?>"><?php echo $rows["PositionName"]; ?>
                        </option>
                        <?php }	?>
                    </select>
                </div>
                <br>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Address"><i class='bx bx-building-house'></i>?????????????????????:</label><br>
                    <input name="address" v-model="local_address" class="form-control form-control-lg"
                         maxlength="255">
                    </input>
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Age"><i class='bx bx-at'></i>???????????????:</label><br>
                    <input type="Age" name="email" v-model="email" class="form-control form-control-sm"
                        maxlength="30">
                </div>
                <br>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Age"><i class='bx bx-phone'></i>????????????????????????:</label><br>
                    <input type="Age" name="PhoneNumber" v-model="phone_number" class="form-control form-control-sm"
                       maxlength="30">
                </div>
                <br>
                <div class="modal-header">
                    <h4 class="modal-title">?????????????????????????????????????????????????????????</h4>

                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="First Name"><i class='bx bx-user-pin'></i>???????????????????????????????????????:</label><br>
                    <input type="text" name="username" class="form-control form-control-sm" 
                        maxlength="25">
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Last Name"><i class='bx bx-key'></i>????????????????????????:</label><br>
                    <input type="password" name="password" class="form-control form-control-sm"
                        placeholder="???????????????????????????????????????????????????????????????????????? 6 ????????????????????????"  maxlength="25">
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Role"><i class='bx bx-bookmark-plus'></i>Role:</label><br>
                    <select name="Role" class="form-select form-select-sm prdno " aria-label="Default select example"
                        >
                        <option value="" selected="selected">Select RoleType</option>
                        <?php
                                        $sql = "SELECT  Name FROM roletype ORDER BY Name ASC";
                                        $resultset = mysqli_query($conn, $sql);
                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                        ?>

                        <option value="<?php echo $rows["Name"]; ?>"><?php echo $rows["Name"]; ?></option>
                        <?php }	?>
                    </select>
                </div>
                <div class="col-md-6 mt-8" align="center">
                    <label for="Department"><i class='bx bx-user-circle'></i>???????????????:</label><br>
                    <select name="status" class="form-select form-select-sm" >
                        <option value="1">online</option>
                        <option value="0">offline</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="insert" class="btn btn-success">Insert</button>
                <hr>
            </form>
        </div>
    </section>
    <script src="js/dropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>