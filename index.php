<?php 

include_once("include/db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--Datatable plugin JS library file -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/99018a594b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>CRUD TEST</title>
    <style>
    td {
        text-align: center;
    }

    th {
        text-align: center;
    }
    </style>
</head>

<body style="overflow:auto; ">
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
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
        </div>
        
        <div class="container " id="crudApp">
            <div class=" home_content ">
                <div class="col-12 mt-5" align="center">
                    <h1 class="mt-5">CREATE USERS</h1>
                    <div class=" form-group mb-3 col-lg-8 mt-4  ">   
                    </div>
                    <br>
                    <a href="insert.php" class="btn btn-success">Go to Insert</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <th>ลำดับ</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>ชื่อ</th>
                            <th>สิทธผู้ใช้งานระบบ</th>
                            <th>แก้ไขล่าสุดโดย</th>
                            <th>วันที่/เวลาแก้ไขล่าสุด</th>
                            <th>สถานะ</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                include_once('functions.php');
                                $fetchdata = new DB_con();
                                $sql = $fetchdata->fetchdata();
                                while($row = mysqli_fetch_array($sql))
                                {?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['Name'] ,' ',$row['Lastname']; ?></td>
                                <td><?php echo $row['RoleTypeID']; ?></td>
                                <td><?php echo $row['UpdateBy']; ?></td>
                                <td><?php 
                                        $res = substr($row['UpdateDate'],8,3);
                                        $res1 = substr($row['UpdateDate'],5,2);
                                        $res2 = substr($row['UpdateDate'],0,4);
                                        $res3 = substr($row['UpdateDate'],10,-3);
                                        $times = $res."/".$res1."/".(($res2)+543)." ".$res3;
                                         echo $times;
                                ?></td>
                                <td><?php
                                $show = $row['Status'];
                                if( $show == 0)
                                {
                                    $show = "&#10060;";
                                } 
                                else
                                {
                                    $show = "&#9989;";
                                }
                                echo $show;
                                ?></td>
                                <td>
                                    <!-- <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a> -->
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="far fa-edit"
                                        style='color:blue'></a>
                                    <!-- <a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> -->
                                    <a href="delete.php?del=<?php echo $row['id']; ?>" class="far fa-trash-alt"
                                        style='color:red'></a>
                                </td>
                            </tr>

                            <?php 
                }
            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </div>
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