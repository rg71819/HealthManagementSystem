<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<title>Display Customers</title>
    <link rel="stylesheet" href="assets/baseStyle.css">
<body>
<h1 style="text-align:center;">Monthly Profit Report</h1>

    <section>
        <?php
                    // Include database config file
                    require_once "dbConfig.php";
                    // Querying buyer details from buyer_information table
                    $sql = "SELECT EXTRACT(MONTH FROM `transaction_date_time`) as month, (sum(`AmountToBePaid`) - sum(`CostPriceofOrder`)) as profit FROM `payment_information` WHERE Payment_status='success' GROUP by EXTRACT(MONTH FROM `transaction_date_time`)";
                    if($result = $dbConnection->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table>';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Month</th>";
                                    echo "<th>Profit</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    $month[]=$row['month']."th Month";
                                    $profit[]=$row['profit'];
                                    echo "<tr>";
                                    echo "<td>" . $row['month'] . "th month</td>";
                                    echo "<td>" . $row['profit'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                                echo "</table>";
                                $jmonth=json_encode($month);
                                $jprofit=json_encode($profit);
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
<section>
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
</section>
<script>
var xValues = <?php echo $jmonth;?>;
var yValues = <?php echo $jprofit;?>;
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Monthly Profit Report Graph"
    }
  }
});
</script>

</body>
</html>

