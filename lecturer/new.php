<?php
include '../connect.php';
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
if(isset($_POST["submit"])){

  $team = $result['team'];
  $name = $_POST['name'];
  $position = $_POST['position'];


  $insertQuery = "INSERT INTO players(name, position, team) VALUES('$name', '$position', '$team')";
  mysqli_query($connect, $insertQuery);
  echo "<script>alert('Rekod berjaya disimpan');
  window.location='player.php'</script>";
}
$listQuery = mysqli_query($connect, $profile);
while ($result=mysqli_fetch_array($listQuery)) { }
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
  <h4 class="fw-bold py-3 mb-4">Player Registration</h4>
    <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form method="post" action="">
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Player Name</label>
                          <div class="col-sm-5">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                name="name"
                                aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Role</label>
                          <div class="col-sm-3">
                            <div class="input-group input-group-merge">
                              <select class="form-select" name="position">
                                <?php 
                                $roleQuery = "SELECT * FROM position";
                                $role = mysqli_query($connect, $roleQuery);
                                while ($roleResult = mysqli_fetch_array($role)) {
                                    # code...
                                    ?>
                                    <option value="" hidden selected>--PILIH POSITION--</option>
                                    <option value="<?php echo $roleResult['part']; ?>"> <?php echo $roleResult['description']; ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!--Do not touch. This is not supposed to be touched -->
          <?php 
          include 'foot.html';
          ?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>