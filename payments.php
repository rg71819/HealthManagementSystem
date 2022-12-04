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

    <style>
        body{
            text-align:center;
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
        <label for="list">Display Payments:</label>
        <select id="list" name="list">
            <option value="all">ALL</option>
            <option value="success">Successful Payments list</option>
            <option value="pending">Pending Payments list</option>
            <option value="default">Defaulters list</option>
        </select>
        <input type="submit" class="btn btn-primary">
        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Include config file
                    require_once "dbConfig.php";
                    
                    // Attempt select query execution
                    if(isset($_POST['list'])){
                        $list=$_POST['list'];
                        if($_POST['list']=='all'){
                        $sql = "SELECT * FROM payment_information";
                        }
                    else if($_POST['list']=='success' or $_POST['list']=='default' or $_POST['list']=='pending'){
                        // $sql = "SELECT * FROM payment_information WHERE Payment_status = ?";
                        $sql = "SELECT * FROM payment_information where Payment_status = '$list'";
                    }
                    else{
                        echo "<script>alert('invalid request')<script>";
                    }
                    if($result = $dbConnection->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Transaction ID</th>";
                                        echo "<th>Customer ID</th>";
                                        echo "<th>Payment Status</th>";
                                        echo "<th>Bill Amount</th>";
                                        echo "<th>Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['TransactionId'] . "</td>";
                                        echo "<td>" . $row['CustomerID'] . "</td>";
                                        echo "<td>" . $row['Payment_status'] . "</td>";
                                        echo "<td>" . $row['AmountToBePaid'] . "</td>";
                                        echo "<td>" . $row['transaction_date_time'] . "</td>";
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
                }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>