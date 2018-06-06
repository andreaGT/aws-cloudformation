<?php 
    include "../globals.php";
    $result = 'https://s3-us-west-2.amazonaws.com/labbuckets3-andre-220520180928/uploads/'. $_GET['name']; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Image</h1>
                        <a href="main.php" class="btn btn-warning pull-right">Home</a>
                    </div>
                    <div>
                        <img src="<?php echo $result; ?>" width="500" height="500">
                    </div>
                <div>
            </div>
        </div>
    </div>
</body>
</html>