<?php
include('./config/koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT  * from user where username='" . $username . "' AND password='" . $password . "' ";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        header('Location:index.php?username:' . $row["username"]);
    }
} else {
    echo "Username atau password salah";
}
$connection->close();
// if(($email=="saya@gmail.com")&&($password=="qwerty")){
//  echo'Anda berhasil masuk';
// }else{
//     echo 'Email atau password Anda salah';
// }
