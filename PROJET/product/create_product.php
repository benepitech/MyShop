<?php
// Include config file
require_once("../config.php");
 
// Define variables and initialize with empty values
$name = $price = $category_id = $description = $image = "";
$name_err = $price_err = $category_id_err = $description_err = $image_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
  
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter a price.";
    } elseif(!ctype_digit($input_price)){
            $price_err = "Please enter a positive integer value.";    
    } else{
        $price = $input_price;
    }
    
    // Validate category_id
    $input_category_id = trim($_POST["category_id"]);
    if(empty($input_category_id)){
        $category_id_err = "Please enter the category_id amount.";     
    } elseif(!ctype_digit($input_category_id)){
        $category_id_err = "Please enter a positive integer value.";
    } else{
        $category_id = $input_category_id;
    }

    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";
    } else{
        $description = $input_description;
    }

    $input_image = trim($_POST["image"]);
    if(empty($input_image)){
            $image_err = "Please enter an image url.";
    } else{
        $image = $input_image;
    }


    // Check input errors before inserting in database
    if(empty($name_err) && empty($price_err) && empty($category_id_err) && empty($description_err) && empty($image_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (name, price, category_id, description, image) VALUES (?, ?, ?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("siiss", $param_name, $param_price, $param_category_id, $param_description, $param_image);
            
            // Set parameters
            $param_name = $name;
            $param_price = $price;
            $param_category_id = $category_id;
            $param_description = $description;
            $param_image = $image;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ..\admin.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Product</h2>
                    <p>Please fill this form and submit to add product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <textarea name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>"><?php echo $price; ?></textarea>
                            <span class="invalid-feedback"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>category_id</label>
                            <input type="text" name="category_id" class="form-control <?php echo (!empty($category_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category_id; ?>">
                            <span class="invalid-feedback"><?php echo $category_id_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="url" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../admin.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>