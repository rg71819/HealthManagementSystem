<?php
date_default_timezone_set("America/Chicago");


define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'adstest');
 

$dbConnection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($dbConnection === false){
    die("Could not connect to the database\nError: " . mysqli_connect_error());
}

if(isset($_POST['action']) and $_POST['action']=='checkout'){
    session_start();

    $serialized_array = serialize($_SESSION["shopping_cart"]); 

    // $unserialized_array = unserialize($serialized_array);
    $tot=0;
    $costTot=0;
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
    $costTot = $costTot + ($values["item_quantity"] * $values["item_cost_price"]);
    $tot = $tot + ($values["item_quantity"] * $values["item_price"]);
    }
    $date = date('Y/m/d H:i:s');

    $sql1 = "SELECT * FROM payment_information where CustomerID= ".$_POST['customerID']." and ( Payment_status ='pending' or Payment_status='default');";
    if($result1 = $dbConnection->query($sql1)){
        if($result1->num_rows > 0){
			echo '<script>alert("Unable to process this order the customer has pending payments")</script>';
        }
     
    else{
        $sql = "INSERT INTO `payment_information`(`CustomerID`, `order_details`, `Payment_status`, `AmountToBePaid`, `transaction_date_time`,`CostPriceofOrder`) VALUES (?,?,?,?,?,?)";
        foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $stckID=$values['item_id'];
                $sql1 = "UPDATE stock_information SET QuantityInStock=? where StockID=$stckID";
                $stmt1 = $dbConnection->prepare($sql1);
                $stmt1->bind_param("i", $param_qty);
                $param_qty = $values['stock_quantity'] - $values['item_quantity'];
                $stmt1->execute();
            }
        if($stmt = $dbConnection->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("issisi", $param_id, $param_order_details, $param_status,$param_tot, $param_date, $param_costTot);
            
            // Set parameters
            $param_id = $_POST['customerID'];
            $param_order_details = $serialized_array;
            $param_status = $_POST['paymentStatus'];
            $param_tot = $tot;
            $param_costTot = $costTot;
            $param_date = $date;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                echo '<div class="alert alert-danger"><em>Order Placed</em></div>';
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }        
        }
        unset($_SESSION['shopping_cart']);
    }}
}
?>