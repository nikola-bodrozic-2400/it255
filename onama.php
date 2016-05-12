<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>MetHotels :: O Nama</title>
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
							<li class="active">
								<a href="onama.php">O Nama</a>
							</li>
							<li>
								<a href="login.php">Login</a>
							</li>
							<li>
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
				<div class="col-sm-12">
					<h3>O nama</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit...
					</p>
					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					</p>
					<table class="table">
						<thead>
							<tr>
								<th>Soba</th>
								<th>Opremljenost</th>
								<th>cena po danu</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Ekonomik</td>
								<td>Minimalna, dva kreveta i sto</td>
								<td>10 &euro;</td>
							</tr>
							<tr>
								<td>Bussiness</td>
								<td>dva kreveta, sto frizider</td>
								<td>20 &euro;</td>
							</tr>
							<tr>
								<td>Royal</td>
								<td>Po dogovoru</td>
								<td>od 30 &euro;</td>
							</tr>
						</tbody>
					</table>
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