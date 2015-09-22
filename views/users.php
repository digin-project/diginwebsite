<?php require "fragments/head.php"; ?>
<body>
	<?php require "fragments/nav.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col l6 offset-l3">
				<div>
					<form method="POST" action="/private/users/add">
						<input type="text" placeholder="Username" name="username" />
						<input type="password" placeholder="Mot de passe" name="password" />
						<input type="number" placeholder="Role" name="role" />
						<button class="btn waves-effect waves-light" type="submit" name="action">Ajouter un utilisateur
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
				<div>
					<table class="highlight responsive-table">
				        <thead>
				          <tr>
				              <th data-field="id">id</th>
				              <th data-field="username">username</th>
				              <th data-field="role">role</th>
				          </tr>
				        </thead>
				        <tbody>
							<?php foreach ($users as $user) { ?>
								<tr>
									<td><?php print $user->id; ?></td>
									<td><?php print $user->username; ?></td>
									<td><?php print $user->role; ?></td>
								</tr>
							<?php } ?>
				        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php require "fragments/script.php"; ?>
</body>
</html>
