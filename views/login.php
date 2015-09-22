<?php require "fragments/head.php"; ?>
<body>
	<div class="container" style="margin-top: 30px;">
		<div class="row">
			<form action="/private/login" method="POST" class="col l2 offset-l5">
				<h5>Connexion</h5>
				<input type="text" placeholder="Username" name="username" />
				<input type="password" placeholder="Mot de passe" name="password" />
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
					<i class="material-icons right">send</i>
				</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php require "fragments/script.php"; ?>