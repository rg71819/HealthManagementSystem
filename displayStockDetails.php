<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/baseStyle.css">

</head>
<body>
<section>
        <header>
            <h1>Stock Details</h1>
        </header>
                    <?php
                    // Include config file
                    require_once "dbConfig.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM stock_information";
                    if($result = $dbConnection->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Stock ID</th>";
                                        echo "<th>Product Name</th>";
                                        echo "<th>Quantity In Stock</th>";
                                        echo "<th>Buy Price</th>";
                                        echo "<th>Sell Price</th>";
                                        echo "<th>Stock Next Delivery Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['StockID'] . "</td>";
                                        echo "<td>" . $row['StockName'] . "</td>";
                                        echo "<td>" . $row['QuantityInStock'] . "</td>";
                                        echo "<td>" . $row['buyPrice'] . "</td>";
                                        echo "<td>" . $row['sellPrice'] . "</td>";
                                        echo "<td>" . $row['nextDeliveryDate'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $dbConnection->close();
                    ?>
</section>
</body>
</html>