<?php 
include "../connect.php";
include "../connect.php";
include "auth.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result=mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
    # code...
    include "temp.php";
    $team = "SELECT * FROM team WHERE id='$result[team]'";
    $listTeam = mysqli_query($connect, $team);
    while ($resultTeam = mysqli_fetch_array($listTeam)) {
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
            <p>Welcome <?php echo $result['name']; ?></p>
            <p>Manager of Team <?php echo $resultTeam['team'];} ?></p>
            <div class="col-12">
                <div class="card">
                    <div class="container-p-y flex-grow-1 container-xxl">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a href="new.php"><button class="btn btn-primary">Add New Player</button></a>
                </li>
              </ul>
            </div>
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Player Name</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            
                            <?php 
                            $bil = 1;
                            $list = "SELECT * FROM players WHERE team='$result[team]'"; 
                            $team = mysqli_query($connect, $list);
                            while ($mgr = mysqli_fetch_array($team)){
                                $roleQuery = "SELECT * FROM position WHERE part='$mgr[position]'";
                                $role = mysqli_query($connect, $roleQuery);
                                while ($roleName = mysqli_fetch_array($role)) {
                                    # code...
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <td><?php echo $mgr['name']; ?></td>
                                <td><?php echo $roleName['description']; ?></td>
                                <td><a href="edit.php?id=<?php echo $mgr['id']; ?>"><button class="btn btn-warning">Edit</button></a>
                                <a href="delete.php?id=<?php echo $mgr['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                            </tr>
                            <?php 
                            $bil++;
                            }
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