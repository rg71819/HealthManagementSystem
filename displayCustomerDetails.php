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
            <h1>Customer Details</h1>
        </header>
                    <?php
                    // Include database config file
                    require_once "dbConfig.php";
                    // Querying Customer details from customer_information table
                    $sql = "SELECT * FROM customer_information";
                    if($result = $dbConnection->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table>';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Customer ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Phone</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['CustomerID'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
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