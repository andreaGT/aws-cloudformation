<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Upload Image</h1>
                        <a href="main.php" class="btn btn-warning pull-right">Home</a>
                    </div>
                    <div>
                        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                          <input type="file" name="uploaded_file"></input><br />
                          <input type="submit" class="btn btn-success" value="Upload"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?PHP
include '../globals.php';

  if(!empty($_FILES['uploaded_file']))
  {
    $path = "../uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      try{
        mysqli_select_db($dbh,$DBName);
        $namef = "". basename( $_FILES['uploaded_file']['name']);
        $sql = "INSERT INTO imageLog(name) VALUES('$namef')";
        if(mysqli_query($dbh, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbh);
        }
        mysqli_close($dbh);
        echo "The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded";
      }catch(Exception $e){
        echo "Something is wrong :(". $e;
      }
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>