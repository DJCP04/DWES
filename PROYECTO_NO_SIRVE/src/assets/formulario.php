<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="estils.css" />
    <title>Human Resource</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../../css/estils.css" rel="stylesheet" />
    <link href="../../css/formStyles.css" rel="stylesheet" />

    <style>
      .wrapper {
        width: 600px;
        margin: 0 auto;
      }

      table tr td:last-child {
        width: 120px;
      }
      .btn {
        border-radius: 5px;
        color: white;
      }
      .btn-blue {
        background-color: #3579f6;
      }
      .btn-grey {
        background-color: grey;
      }
    </style>
    <script>
      $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
  </head>

  <body>
    <div id="header">
      <h1>HR & OE Management</h1>
    </div>
    <div id="content">
      <div id="menu">
        <ul>
          <li><a href="../../index.php">Home</a></li>
          <li>
            <ul>
              HR
              <li><a href="employeeAll.php">Employees</a></li>
              <li><a href="departments.php">Departments</a></li>
              <li><a href="jobs.php">Jobs</a></li>
              <li><a href="locations.php">Locations</a></li>
            </ul>
          </li>
          <li>
            <ul>
              OE
              <li><a href="warehouses.php">Warehouses</a></li>
              <li><a href="categories.php">Categories</a></li>
              <li><a href="customers.php">Customers</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="orders.php">Orders</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <div id="section">
        <h3>NUEVO EMPLEADO</h3>
        <form method="POST" action="">
          <div class="form-group">
            <label>ID Empleat:</label>
            <input
              type="number"
              name="employee_id"
              class="form-control"
              required
            />
          </div>

          <div class="form-group">
            <label>Nom:</label>
            <input
              type="text"
              name="first_name"
              class="form-control"
              required
            />
          </div>

          <div class="form-group">
            <label>Llinatge:</label>
            <input type="text" name="last_name" class="form-control" required />
          </div>

          <div class="form-group">
            <label>Job ID:</label>
            <input
              type="text"
              name="job_id"
              class="form-control"
              value="IT_PROG"
              required
            />
          </div>

          <div class="form-group">
            <label>ID del Departament:</label>
            <input type="number" name="department_id" class="form-control" />
          </div>

          <input class="btn btn-blue" type="submit" value="Submit"" />
          <input class="btn btn-grey" type="submit" value="Cancel" />
        </form>
      </div>
    </div>

    <div id="footer">
      <p>(c) IES Emili Darder - 2025</p>
    </div>
  </body>
</html>
