<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';

use Models\Customer;

$customers = Customer::all();
?>

<script>
function confirmDelete(id, name) {
    return confirm(`¿Estás seguro que deseas eliminar al cliente ${name}?`);
}
</script>

<div id="section">
    <h3>Customers</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Address</th>
                <th>Credit Limit</th>
                <th>Actions
                    <a href="Formulario.php" class="mr-2" title="New File" data-toggle="tooltip">
                        <span class="fa fa-pencil-square-o"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customers as $row) {
                echo
                "<tr>" .
                    "<td>" . $row->customer_id . "</td>" .
                    "<td>" . $row->cust_last_name . "</td>" .
                    "<td>" . $row->cust_first_name . "</td>" .
                    "<td>" . $row->cust_street_address . "</td>" .
                    "<td>" . $row->credit_limit . "</td>" .
                    "<td>" .
                    '<a href="Update.php?' . 
                    'id=' . $row->customer_id . 
                    '&name=' . $row->cust_first_name . 
                    '&last_name=' . $row->cust_last_name . 
                    '&address=' . $row->cust_street_address . 
                    '&credit_limit=' . $row->credit_limit . 
                    '&postal_code=' . $row->cust_postal_code . 
                    '&city=' . $row->cust_city . 
                    '&state=' . $row->cust_state . 
                    '&country=' . $row->cust_country . 
                    '&phone=' . $row->phone_numbers . 
                    '&language=' . $row->nls_language . 
                    '&territory=' . $row->nls_territory . 
                    '&email=' . $row->cust_email . 
                    '&account_mgr=' . $row->account_mgr_id . 
                    '&geo_location=' . $row->cust_geo_location . 
                    '&birth=' . $row->date_of_birth . 
                    '&marital=' . $row->marital_status . 
                    '&gender=' . $row->gender . 
                    '&income=' . $row->income_level . 
                    '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
                    '<a href="Destroy.php?id=' . $row->customer_id . 
                    '" onclick="return confirmDelete(' . $row->customer_id . ', \'' . 
                    htmlspecialchars($row->cust_first_name . ' ' . $row->cust_last_name, ENT_QUOTES) . 
                    '\')" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>' .
                    "</td>" .
                    "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>