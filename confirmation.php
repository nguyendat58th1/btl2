<?php
    include('config.php');
    // Passkey được lấy từ link
    $passkey=$_GET["salt"];

    $sql = "SELECT * FROM `tmp_users` WHERE salt ='$passkey'";

    if ($result = mysqli_query($conn,$sql))
    {
        // Return the number of rows in result set
        if ($rowcount=mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $user = $row["username"];
            $pass = $row["password"];
            $email = $row["email"];
            $salt = $row["salt"];
    
            $sql = "INSERT INTO users (username, password, email, salt) VALUES ('$user', '$pass', '$email', '$salt')";

            if (mysqli_query($conn, $sql)) {
                mysqli_close($conn);
                echo "<h1>Thành công</h1>";
                header("location:login.php");
                exit();
            }
            else {
                echo "loi";
            }
        
        }
        else {
            echo "loi";
        }    
    
    }
    else {
        echo "loi";
    }

    mysqli_close($conn);
?>