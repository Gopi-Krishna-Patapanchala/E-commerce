<head>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>
    Admin Panel Dashboard || Product Based Analysis
  </title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="./css/main.css" rel="stylesheet" />
<script
src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>


<body>
  <button data-toggle='modal' data-target='#addproduct'> Add new Product Details</button>

<!-- Modal -->
<div class='modal fade' id='addproduct' role='dialog'>
<div class='modal-dialog'>

  <!-- Modal content-->
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Adding New Product Information</h4>
    </div>
    <div class='modal-body'>
      <div class="form-group">
        <label for="usr">Product ID</label>
          <input type="text" class="form-control" name="UPC"/>
        </div>

        <div class="form-group">
          <label for="usr">Product Name</label>
            <input type="text" class="form-control" name="pname"/>
          </div>

          <div class="form-group">
            <label for="usr">Price for unit</label>
              <input type="text" class="form-control" name="price"/>
            </div>
</div>
</div>
</div>
</div>

</body>
</html>
