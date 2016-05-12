<?php
session_start ();

	if (! isset ( $_SESSION ['nonce'] )) {
		$_SESSION ['nonce'] = md5(mt_rand ( 10, 1000000 ));
	}

	require ("include/global.inc");

			$poruka = "";
			$uname_err = "";
			$ime_err = "";
			$obaviInsert = true;

	if( isset ( $_POST ['anticsrf'] ) && ($_SESSION ['nonce'] == $_POST ['anticsrf']) ){
		global $conn;

		$username = AppWide::cleanString($_POST['username']);

		// da li je username prazan
		if($_POST['username'] == "" ) { 
			$poruka .= "polje username nesme biti prazno "; 
			$uname_err = "has-error";
			$obaviInsert = false;
		} 
		elseif(AppWide::isUniq($username) ){
			$poruka = "korisnicko ime vec postoji"; 
			$uname_err = "has-error";
			$obaviInsert = false;			
		}
		elseif($_POST['ime']==""){
			$poruka .= "polje ime nesme biti prazno "; 
			$ime_err = "has-error";
			$obaviInsert = false;
		}
		else{
			error_log("skoro sve je uredu");
		}

		if($obaviInsert){
			$ime = AppWide::cleanString($_POST['ime']);
			$prezime = AppWide::cleanString($_POST['prezime']);
			$email = AppWide::cleanString($_POST['email']);
			$pass = hash( 'sha256', trim($_POST['password']));

			$insert = "INSERT INTO `korisnici` (`username`, `ime`, `prezime`, `email`, `pass`) VALUES ( ? , ? , ? , ? , ?);";
			$query = $conn->prepare($insert);
			$query->bind_param('sssss', $username , $ime, $prezime, $email, $pass);
			$query->execute();
			$query->close();

			$poruka = "regok";
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>MetHotels :: Registracija</title>
		<!-- Bootstrap and demo CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--if lt IE 9
		script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
		script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')
		-->
	</head>
	<body>
		<div class="container">
			<!-- Static navbar -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">MetHotels</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="onama.php">O Nama</a>
							</li>
							<li>
								<a href="login.php">Login</a>
							</li>
							<li class="active">
								<a href="reg.php">Registracija</a>
							</li>
					<?php if(isset($_SESSION['username'])) : ?>
							<li>
								Zdravo <?php echo $_SESSION['username']; ?><a href="logout.php">Log Out</a>
							</li>						
					<?php endif; ?>															
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</nav>
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron">
						<h1>MetHotels</h1>
						<h3>Gost u centru paznje</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Registrujte se</h3>
					
					<?php if(@$poruka == "regok") : ?>
					<div class="alert alert-success" role="alert">
						<span class="glyphicon glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
						<span class="sr-only">Potvrda:</span>
						Registracija usplela
					</div>
					<?php endif; ?>
					
					<?php if($obaviInsert == false) : ?>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Greška:</span>
						<?php echo $poruka; ?>
					</div>
					<?php endif; ?>

					<form action="reg.php" method="post">
						<div class="input-group <?php echo $uname_err; ?>">
							<input type="text" name="username" class="form-control" placeholder="username" aria-describedby="basic-addon2">
						</div>
						<br>
						<div class="input-group <?php echo $ime_err; ?>">
							<input type="text" name="ime" class="form-control" placeholder="ime" aria-describedby="basic-addon2">
						</div>
						<br>
						<div class="input-group">
							<input type="text" name="prezime" class="form-control" placeholder="prezime" aria-describedby="basic-addon2">
						</div>
						<br>
						<div class="input-group">
							<input type="email" name="email" class="form-control" placeholder="email" aria-describedby="basic-addon2">
						</div>
						<br>																		
						<div class="input-group">
							<input type="password" name="password" class="form-control" placeholder="password"aria-describedby="basic-addon2">
						</div>
						<br>
						<div class="input-group">
							<button type="submit" name="submit" id="submit"	class="btn btn-success" value="Login">
								Registruj se
							</button>
							<br>
						</div>
						<input type="hidden" name="anticsrf" value="<?php echo $_SESSION ['nonce']; ?>">
						<br>
					</form>
				</div>
			</div>
			<div class="row">
				<footer class="well">
					<p class="text-center">
						&copy; Nikola Bodrozic
					</p>
				</footer>
			</div>
			<!-- Bootstrap core JavaScript-->
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>