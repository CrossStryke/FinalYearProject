<?php 
include "auth.php";
include "../connect.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result=mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
    # code...
    include "temp.php";
        # code...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
        <div class="container-xxl flex-grow-1 container-p-y">
            <p>Welcome Monitor Lecturer <?php echo $result['username']; ?></p>
            <p>The index of <?php echo $result['username']; ?></p>
            <div class="col-12">
                <div class="card">
                    <div class="container-p-y flex-grow-1 container-xxl">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Student Name</th>
                                <th>Attendance time</th>
                                <th>Attendance Status</th>
                            </tr>
                            
                            <?php 
                            $bil = 1; //Index count

                            //getting data from course using card ID

                            //Display data from query
                            $list = "SELECT * FROM main"; 
                            $class = mysqli_query($connect, $list);
                            while ($classResult = mysqli_fetch_array($class)){
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <td><?php //echo date("d/m/Y", strtotime($mgr['dt'])); ?></td>
                                <td><?php //echo date("h:i A", strtotime($mgr['time_st'])); ?></td>
                                <td><?php //echo date("h:i A", strtotime($mgr['time_ed'])); ?></td>
                            </tr>
                            <?php 
                            $bil++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>     

                </div> <!--Do not touch. This is not supposed to be touched -->
            <?php include 'foot.html';?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>