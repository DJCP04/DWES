<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use Models\Employee;

$employees = Employee::all();
?>

<script>
	// Función de confirmación
	function confirmDelete(id, name) {
		return confirm(`¿Estás seguro que deseas eliminar al empleado ${name}?`);
	}

	// Asegurarse de que los elementos existan antes de añadir eventos
	document.addEventListener('DOMContentLoaded', function() {
		const deleteLinks = document.querySelectorAll('.delete-employee');
		deleteLinks.forEach(function(link) {
			link.addEventListener('click', function(e) {
				e.preventDefault();
				const id = this.dataset.id;
				const name = this.dataset.name;
				if (confirmDelete(id, name)) {
					// Redirige a Destroy.php para eliminar
					window.location.href = 'Destroy.php?id=' + encodeURIComponent(id);
				}
			});
		});
	});
</script>

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
					<a href="Formulario.php" class="mr-2" title="New File" data-toggle="tooltip">
						<span class="fa fa-pencil-square-o"></span>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($employees as $row): ?>
				<tr>
					<td><?= $row->employee_id ?></td>
					<td><?= htmlspecialchars($row->last_name) ?></td>
					<td><?= htmlspecialchars($row->first_name) ?></td>
					<td><?= $row->department_id ?></td>
					<td><?= $row->job_id ?></td>
					<td>
						<a href="Update.php?id=<?= $row->employee_id ?>&name=<?= urlencode($row->first_name) ?>&last_name=<?= urlencode($row->last_name) ?>&email=<?= urlencode($row->email) ?>&phone=<?= urlencode($row->phone_number) ?>&hire_date=<?= $row->hire_date ?>&job_id=<?= urlencode($row->job_id) ?>&salary=<?= $row->salary ?>&commission=<?= $row->commission_pct ?>&manager_id=<?= $row->manager_id ?>&dep_id=<?= $row->department_id ?>" class="mr-2" title="Update File" data-toggle="tooltip">
							<span class="fa fa-pencil"></span>
						</a>
						<a href="#" data-id="<?= $row->employee_id ?>" data-name="<?= htmlspecialchars($row->first_name . ' ' . $row->last_name, ENT_QUOTES) ?>" class="mr-2 delete-employee" title="Delete File" data-toggle="tooltip">
							<span class="fa fa-trash"></span>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>