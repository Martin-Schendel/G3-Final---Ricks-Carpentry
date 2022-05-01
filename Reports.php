<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "Header.html";?>
    <div class="content">
        <table>
            <caption style="caption-side: top;">Daily Sales Report</caption>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Employee</th>
                <th>Order Date</th>
                <th>Sale Total</th>
                <th>Profit</th>
            </tr>
            <?php include "GetDailySalesReport.php";?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Profit:</td>
                <td id="totalProfitDaily"><?php echo($DailyProfit); ?></td>
            </tr>
        </table>
        <table>
            <caption style="caption-side: top;">Weekly Sales Report</caption>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Employee</th>
                <th>Order Date</th>
                <th>Sale Total</th>
                <th>Profit</th>
            </tr>
            <?php include "GetWeeklySalesReport.php";?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Profit:</td>
                <td id="totalProfitWeekly"><?php echo($WeeklyProfit); ?></td>
            </tr>
        </table>
        <table>
            <caption style="caption-side: top;">Monthly Sales Report</caption>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Employee</th>
                <th>Order Date</th>
                <th>Sale Total</th>
                <th>Profit</th>
            </tr>
            <?php include "GetMonthlySalesReport.php";?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Profit:</td>
                <td id="totalProfitMonthly"><?php echo($MonthlyProfit); ?></td>
            </tr>
        </table>

    </div>
    <footer>
        Copyright 2022 Pat's Bakery
    </footer>
</body>
</html>