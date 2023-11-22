<?php

require 'connect.php';

// (1) Mulai session
session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // b. Ambil nilai input name
    $name = mysqli_real_escape_string($db,$_POST['name']);
    // c. Ambil nilai input username
    $username = mysqli_real_escape_string($db,$_POST['username']);
    // d. Ambil nilai input password
    $password = mysqli_real_escape_string($db,$_POST['password']);
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
$query = "SELECT * FROM users WHERE email = '$email'";
$result=mysqli_query($db,$query);

// (4) Buatlah perkondisian ketika ketika tidak ada data email yang sama(gunakan mysqli_nun_row == 0)
if (mysqli_num_rows($result)==0){

    // a. Buatlah query untuk melakukan insert data ke dalam database
    $insert_query="INSERT INTO users (name, username, email, password) VALUES ('$name','$username','$email','$hash_password')";

    // b. buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    if (mysqli_query($db, $insert_query)){
        //buat didalamnya variabel session dengan key message untuk menampilkan pesan pendaftaran berhasil
        $_SESSION['message']= "pendaftaran sudah berhasil, silakan login";
    }else{
        $_SESSION['message']= "error:".mysqli_error($db);
        $_SESSION['message']= "error:".mysqli_error($db);
    } 
    }else{

    //(5) Buat juga kondisi else
    // buat didalmnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
    $_SESSION['message']="email sudah terdaftar";
}

header("location: register.php");
exit;
    //$query2 = "INSERT INTO users (email,name,username,password) VALUES ('$email','$name','$username','$password')";
    //if($insert){
        //$_SESSION['message'] = 'Pendaftaran Berhasil, silahkan login';
       // $_SESSION['color'] = 'success';
        //header('Location: ../views/login.php');
    //}else{
      //  $_SESSION['message'] = 'pendaftaran gagal';
//$_SESSION['message'] = 'username telah terdaftar';
//header('Location: ../views/register.php');
//if ($user) {
  //  return redirect()->route('login')->with('success', 'Registrasi berhasil, silahkan login.');
//} else {
  //  return redirect()->route('register')->with('error', 'Registrasi gagal, silahkan coba lagi.');
//}
//}

?>