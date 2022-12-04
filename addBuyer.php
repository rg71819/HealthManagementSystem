<?php
// Include config file
require_once "dbConfig.php";
 
// Define variables and initialize with empty values
$name = $address = $phone = $stockId = "";
$name_err = $address_err = $phone_err = $stockId_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "<sup>Please enter a name.</sup>";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "<sup>Please enter a valid name.</sup>";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "<sup>Please enter an address.</sup>";     
    } else{
        $address = $input_address;
    }
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "<sup>Please enter the phone number</sup>";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "<sup>Please enter a valid phone number.</sup>";
    } else{
        $phone = $input_phone;
    }

    // Validate stockid
    $input_stockId = trim($_POST["stockId"]);
    if(empty($input_stockId)){
        $stockId_err = "<sup>Please enter the stock ID</sup>";     
    } elseif(!ctype_digit($input_stockId) or !($input_stockId >= 10000001 and $input_stockId <= 10000020)){
        $stockId_err = "<sup>Please enter a valid stock ID.</sup>";
    } else{
        $stockId = $input_stockId;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($phone_err) && empty($stockId_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO buyer_information (BuyerName, Address, Phone, StockID) VALUES (?, ?, ?, ?)";
 
        if($stmt = $dbConnection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssii", $param_name, $param_address, $param_phone, $param_stockId);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_phone = $phone;
            $param_stockId = $stockId;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                echo '<div class="alert alert-danger"><em>Customer added</em></div>';

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $dbConnection->close();
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Buyer</title>
    <link rel="stylesheet" href="assets/baseStyle.css">
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>" >
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Stock ID</label>
                            <input type="text" name="stockId" class="form-control <?php echo (!empty($stockId_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stockId; ?>">
                            <span class="invalid-feedback"><?php echo $stockId_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>