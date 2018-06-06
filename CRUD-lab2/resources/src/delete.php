<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
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
                        <h1>Delete Image</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this image?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="main.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    include '../globals.php';
    mysqli_select_db($dbh,$DBName);
    $sql = "DELETE FROM imageLog WHERE id = ?";
    if($stmt = mysqli_prepare($dbh, $sql)){
        $param_id = trim($_POST["id"]);
        // i = integer, d = double, s = string ...
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        if(mysqli_stmt_execute($stmt)){
            header("location: main.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbh);
} else{
    if(empty(trim($_GET["id"]))){
        header("location: test.php");
        exit();
    }
}
?>