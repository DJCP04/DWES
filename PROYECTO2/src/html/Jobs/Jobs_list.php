<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';

use Models\Job;

$jobs = Job::all();
?>

<script>
    function confirmDelete(id, title) {
        return confirm(`¿Estás seguro que deseas eliminar el trabajo ${title}?`);
    }
</script>

<div id="section">
    <h3>Jobs</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Min Salary</th>
                <th>Max Salary</th>
                <th>Actions
                    <a href="Formulario.php" class="mr-2" title="New File" data-toggle="tooltip">
                        <span class="fa fa-pencil-square-o"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($jobs as $row) {
                echo
                "<tr>" .
                    "<td>" . $row->job_id . "</td>" .
                    "<td>" . $row->job_title . "</td>" .
                    "<td>" . $row->min_salary . "</td>" .
                    "<td>" . $row->max_salary . "</td>" .
                    "<td>" .
                    '<a href="Update.php?id=' . $row->job_id . '&title=' . urlencode($row->job_title) . '&min=' . $row->min_salary . '&max=' . $row->max_salary . '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
                    '<a href="Destroy.php?id=' . $row->job_id . '" onclick="return confirmDelete(\'' . $row->job_id . '\', \'' . htmlspecialchars($row->job_title, ENT_QUOTES) . '\')" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>' .
                    "</td>" .
                    "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<?php require('../includes/footer.php'); ?>