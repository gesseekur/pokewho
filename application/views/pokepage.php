<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pokes</title>

	 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
</head>
<style>
	body{
		background-color:#f5f5f5;
	}

	.info {
		border:1px solid black;
		display: inline-block;
		margin-left:15%;
		background-color:white;
	}
	
	.welcome {
		font-family:'Indie Flower', Arial;
	}

	.pokeTable {
		/*margin-left:5%;*/
	}

	table {
		border:1px solid black;
		background-color: white;
	}

	.brand-logo {
		font-family:Montserrat, Arial;
	}
	
	.logout {
		font-family:Montserrat, Arial;
	}

	.montserrat {
		font-family:'Indie Flower', Arial;
		font-size:20px;
	}

	thead {
		font-weight:bold;
	}
</style>

<body>

	<nav>
		<div class="nav-wrapper cyan darken-4">
			<a href="#" class="brand-logo center">PokeIt</a>
			<ul id="nav-mobile" class="right">
				<li><a class="logout" href="/sessions/logout">Logout</a></li>
			</ul>
		</div>
	</nav>
        
	<h3 class="center welcome"> Welcome <?= $this->session->userdata('currentUser')['name']?></h3>

<div class="info container center">
	<p><strong><?=$pokeCount?></strong> people poked you!</p>

<?php foreach ($pokeArray as $pokeInfo){
?>
	<p><strong><?=$pokeInfo['name']?></strong> poked you <strong><?=$pokeInfo['poke_count']?></strong> times </p>
<?php
	}
?>
</div>

<div class="row pokeTable center">
	<p class="montserrat"><em>People you may want to poke:</em></p>
	<table class="bordered container striped">
		<thead>
		<tr>
			<td>Name</td>
			<td>Alias</td>
			<td>Email Address</td>
			<td>Poke History</td>
			<td>Action</td>
		</tr>
		</thead>
		<tbody>
<?php    foreach ($totalPokesArray as $pokeDetail){
?>
		<tr>
			<td><?= $pokeDetail['name']?></td>
			<td><?= $pokeDetail['alias']?></td>
			<td><?= $pokeDetail['email']?></td>
			<td><?= $pokeDetail['TOTAL_POKES']?></td>
			<td>


				<a href="users/pokeUser/<?= $pokeDetail['id']?>/<?=$this->session->userdata('currentUser')['id']?>">
					<i class="material-icons">thumb_up</i>
				</a>
		<!-- 		<form method="post" action="/users/count">
					<input type="submit" value="Poke!">
					<input type="hidden" name="poked_id" value=">
				</form> -->
			</td>
		</tr>
<?php
		}
?>
		</tbody>
	</table>
</div>
</body>


</html>