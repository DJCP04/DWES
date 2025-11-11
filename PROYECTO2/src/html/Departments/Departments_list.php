<?php

require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';

use Models\Department;

$departments = Department::all();
?>

<script>
	function confirmDelete(id, name) {
		return confirm(`¿Estás seguro que deseas eliminar el departamento ${name}?`);
	}
</script>

<div id="section">
	<h3>Department</h3>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Department Name</th>
				<th>Manager ID</th>
				<th>Location ID</th>
				<th>Actions
					<a href="Formulario.php" class="mr-2" title="New File" data-toggle="tooltip">
						<span class="fa fa-pencil-square-o"></span>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($departments as $row) {
				echo
				"<tr>" .
					"<td>" . $row->department_id     . "</td>" .
					"<td>" . $row->department_name       . "</td>" .
					"<td>" . $row->manager_id      . "</td>" .
					"<td>" . $row->location_id   . "</td>" .
					"<td>" .
					'<a href="Update.php?id=' . $row->department_id . '&name=' . $row->department_name . '&manager=' . $row->manager_id . '&location=' . $row->location_id . '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
					'<a href="Destroy.php?id=' . $row->department_id . '" onclick="return confirmDelete(\'' . $row->department_id . '\', \'' . htmlspecialchars($row->department_name, ENT_QUOTES) . '\')" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>' .
					"</td>" .
					"</tr>";
			}
			?>
		</tbody>
	</table>
</div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>