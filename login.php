<?php 
session_start();
if(isset($_SESSION['login'])){
    echo "<script>
    alert('Anda Sudah Login!');
    document.location.href = 'index.php';
    </script>";
    exit;
}

require 'fungsi.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];     
    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
    //cek username
    if(mysqli_num_rows ($result) === 1 ) {
	//cek password
    	$row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
        	//set session
            $_SESSION["login"] = $username; 
            header("Location: index.php");
            exit;
        }
    }
        $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kantor Serba Ada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="text-center text-light header pt-2">
        <h2><div>DAFTAR INVENTARIS BARANG</div>
        <div>KANTOR SERBA ADA</div></h2>
    </div>
    <?php if(isset($error)) {
	echo "<script>
	alert('Email/Pasword Salah!');
	document.location.href = 'login.php';
	</script>";}
?>


	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Log In</h3>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" id="username" class="form-control" placeholder="username">						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"></span>
						</div>
						<input type="password" name="password" id="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn float-right login_btn" >
					</div>
				</form>
            </div>        
            </div>  
            </div>
    <div class="footer text-center text-white p-3">
        Inventaris 2016
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


    