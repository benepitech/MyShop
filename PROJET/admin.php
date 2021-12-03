<?php
session_start();?>

  <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    </head>
    <body>
        
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Products Details</h2>
                            <a href="product\create_product.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
                        </div>
                        <?php
                        
                        require_once "config.php";
                        
                    
                        $sql_products = "SELECT * FROM products ";
                        if($result = $mysqli->query($sql_products)){
                            if($result->num_rows > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>name</th>";
                                            echo "<th>price</th>";
                                            echo "<th>Category_id</th>";
                                            echo "<th>description</th>";
                                            echo "<th>image</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = $result->fetch_array()){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['price'] . "</td>";
                                            echo "<td>" . $row['category_id'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td>" . $row['image'] . "</td>";                                       
                                            echo "<td>";
                                                echo '<a href="product/read_product.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">read</a>';
                                                echo '<a href="product/update_product.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">update</a>';
                                                echo '<a href="product/delete_product.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip">delete</a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                    
                                $result->free();
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        
    
                    
                        ?>
                    </div>
                </div>        
            </div>
        </div>

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">User Details</h2>
                            <a href="username\create_username.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
                        </div>
                        <?php
                        
                        require_once "config.php";
                        
                    
                        $sql_users = "SELECT * FROM users";
                        if($result = $mysqli->query($sql_users)){
                            if($result->num_rows > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>username</th>";
                                            echo "<th>password</th>";
                                            echo "<th>email</th>";
                                            echo "<th>admin</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = $result->fetch_array()){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";   
                                            echo "<td>" . $row['admin'] . "</td>";                                    
                                            echo "<td>";
                                                echo '<a href="username/read_username.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">read</a>';
                                                echo '<a href="username/update_username.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">update</a>';
                                                echo '<a href="username/delete_username.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip">delete</a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                    
                                $result->free();
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        
    
                        
                        ?>
                    </div>
                </div>        
            </div>
        </div>



        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Categories Details</h2>
                            <a href="categories\create_categories.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
                        </div>
                        <?php
                        
                        require_once "config.php";
                        
                    
                        $sql_users = "SELECT * FROM categories";
                        if($result = $mysqli->query($sql_users)){
                            if($result->num_rows > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>name</th>";
                                            echo "<th>parent_id</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = $result->fetch_array()){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['parent_id'] . "</td>";                                    
                                            echo "<td>";
                                                echo '<a href="categories/read_categories.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip">read</a>';
                                                echo '<a href="categories/update_categories.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">update</a>';
                                                echo '<a href="categories/delete_categories.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip">delete</a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                    
                                $result->free();
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        
    
                        $mysqli->close();
                        ?>
                    </div>
                </div>        
            </div>
        </div>


        <form method="get" action="index/index.php">
        <button type="submit">Back to index</button>
    </form>
    </body>
    </html>

