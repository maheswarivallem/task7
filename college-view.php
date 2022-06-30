<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>College View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>College View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $college_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM college WHERE id='$college_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $college = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>College Name</label>
                                        <p class="form-control">
                                            <?=$college['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>College branches</label>
                                        <p class="form-control">
                                            <?=$college['branches'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>College year</label>
                                        <p class="form-control">
                                            <?=$college['year'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>College fees</label>
                                        <p class="form-control">
                                            <?=$college['fees'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>