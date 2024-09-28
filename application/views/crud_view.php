<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Operations in CI</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
  <div class="jumbotron">
    <h1 align="center">CRUD CI APP</h1>
  </div>
  <div class="container">
    <div class="clear-fix">
      <h3 style="float: left">All Products</h3>
      <a href="#" class="btn btn-primary" style="float: right">Add Product</a>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Product name</th>
          <th>Product price</th>
          <th>Product quantity</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            Mango
          </td>

          <td>
            200
          </td>

          <td>
            20
          </td>

          <td>
            <a class="btn btn-success" href="#">Edit</a>
            <a class="btn btn-danger" href="#">Delete</a>
          </td>

        </tr>

        <tr>
          <td>
            Cherry
          </td>

          <td>
            500
          </td>

          <td>
            30
          </td>

          <td>
            <a class="btn btn-success" href="#">Edit</a>
            <a class="btn btn-danger" href="#">Delete</a>
          </td>

        </tr>

        <tr>
          <td>
            Apple
          </td>

          <td>
            400
          </td>

          <td>
            30
          </td>

          <td>
            <a class="btn btn-success" href="#">Edit</a>
            <a class="btn btn-danger" href="#">Delete</a>
          </td>

        </tr>

      </tbody>
    </table>
  </div>

  <script>
    window.baseUrl = '<?php echo base_url(); ?>';
  </script>

</body>

</html>