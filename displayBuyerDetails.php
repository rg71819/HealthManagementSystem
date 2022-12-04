<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Customers</title>
    <link rel="stylesheet" href="assets/baseStyle.css">
</head>
<body>
    <section>
        <header>
            <h1>Buyer Details</h1>
        </header>
                    <?php
                    // Include database config file
                    require_once "dbConfig.php";
                    // Querying buyer details from buyer_information table
                    $sql = "SELECT * FROM buyer_information";
                    if($result = $dbConnection->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table>';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Buyer ID</th>";
                                        echo "<th>Buyer Name</th>";
                                        echo "<th>Stock supllied by buyer</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Phone</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['BuyerID'] . "</td>";
                                        echo "<td>" . $row['BuyerName'] . "</td>";
                                        echo "<td>" . $row['StockID'] . "</td>";
                                        echo "<td>" . $row['Address'] . "</td>";
                                        echo "<td>" . $row['Phone'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            $result->free();
                        } else{
                            echo '<p><sup>No Customer details were found.</sup></p>';
                        }
                    } else{
                        echo "<p><sup>Something went wrong. Please try again after sometime.</sup></p>";
                    }
                    $dbConnection->close();
                    ?>
    </section>
</body>
</html>