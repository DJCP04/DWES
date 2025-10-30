<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use Models\Employee;

$employees = Employee::all();
?>

<div id="section">
	<h3>Employees</h3>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Department</th>
				<th>Job ID</th>
				<th>Actions
					<a href="Formulario.php" class="mr-2" title="New File" data-toggle="tooltip"><span class="fa fa-pencil-square-o"></span></a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($employees as $row) {
				echo
				"<tr>" .
					"<td>" . $row->employee_id     . "</td>" .
					"<td>" . $row->last_name       . "</td>" .
					"<td>" . $row->first_name      . "</td>" .
					"<td>" . $row->department_id   . "</td>" .
					"<td>" . $row->job_id   . "</td>" .

					"<td>" .
					'<a href="Update.php?id=' . $row->employee_id . "&name=" . $row->first_name . "&last_name=" . $row->last_name . "&dep_id=" . $row->department_id . "&job_id=" . $row->job_id . '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
					'<a href="Destroy.php?id=' 		   . $row->employee_id . '" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>'               .
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