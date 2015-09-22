<?php require "fragments/head.php"; ?>
<body>
	<?php require "fragments/nav.php"; ?>
	<div class="container">
		<div class="row">
			<table class="highlight responsive-table col l6 offset-l3">
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
	<?php require "fragments/script.php"; ?>
</body>
</html>
