<?php require "fragments/head.php"; ?>
<body>
	<div>
		<form action="/private/login" method="POST">
			<input type="text" placeholder="Username" name="username" />
			<input type="password" placeholder="Mot de passe" name="password" />
			<button type="submit">Connexion</button>
		</form>
	</div>
</body>
</html>
<?php require "fragments/script.php"; ?>