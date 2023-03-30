<?php 
include "connect.php";

switch ($_POST['action']) {
    case 'register': //For new users
        # code...
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO login_user (username, pwd, lvl) VALUES ('$username', '$password', 'User')";
        $register = mysqli_query($connect, $query);

        if ($register) {
            # code...
            $profile ="INSERT INTO profile_user (username, photo) VALUES ('$username', 'uploads/blank.png')";
            mysqli_query($connect, $profile); 
            header("location: login.html");
        }
        break;
    case 'login': // For registered user
        # code...
        $username = $_POST['username'];
        $password = $_POST['password'];

        $profile = "SELECT * FROM login_user WHERE username='$username'";
        $login = mysqli_query($connect, $profile);
        if (mysqli_num_rows($login)>0) {
            # code...
            while ($row = mysqli_fetch_assoc($login)) {
                # code...
                # Checking the validation of the login
                if ($username == $row['username'] && password_verify($password, $row['pwd'])) { 
                    # code...
                    session_start();
                    $_SESSION['authenticated'] = true; //To ensure that the login is real and not a bot
                    $_SESSION['username'] = $row['username']; //Username for the session login
                     // A column that linked to all table to the database
                    $_SESSION['lvl'] = $row['lvl']; // for access level
                    // Access level for the user
                    switch ($_SESSION['lvl']) {
                        case 'Admin':
                            # code...
                            header('location: admin/index.php'); # Redirect it to the admin page
                            break;    

                        default:
                            # code...
                            header('location: lecturer/index.php'); # Redirect it to the user page
                            break;
                    }
                }
                else {
                    # code...
                    header("location: login.html");
                }
            }
        }
        else {
            # code...
            header("location: login.php");
        }
        break;
    default:
        # code...
        break;
}

?>