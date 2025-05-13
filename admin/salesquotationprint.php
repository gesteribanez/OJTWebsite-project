<?php
include 'dbconnection.php';
$id = mysqli_real_escape_string($mysqli,$_GET['id']);
$result = $mysqli->query("select * from tbl_salesquotation where id='$id'");
$row = mysqli_fetch_assoc($result);
$cname = strtoupper($row['customer_name']);
$caddress = strtoupper($row['address']);
?>

<!DOCTYPE html>
<html>
<head>
<style>
        @media print {
            /* Custom print styles */
            table {
                width: 100%;
            }

            .td-width-1 {
                width: 20%;
                text-align: center; /* Width for the first table cell */
            }

            .td-width-2 {
                width: 40%; /* Width for the second table cell */
            }

            .td-width-3 {
                width: 20%; /* Width for the third table cell */
                text-align: center;
            }
            .td-width-4 {
                width: 205%; /* Width for the third table cell */
                text-align: center;
            }
        }
            .fixed-bottom-text {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                text-align: center;
                font-weight: bold;
                height: 300px;
            }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
        window.onafterprint = function() {
            window.close();
        };
    </script>
</head>
<body>
    <div class="my-content">
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cname ?><br/><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $caddress ?><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/>
        <table>
            <tbody>
            <?php 
                $result1 = $mysqli->query("select * from tbl_salesquotation_details where sales_quotation_id='$id'");
                while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
                <tr>
                    <td class="td-width-1"><?php echo $row1['item'] ?></td>
                    <td class="td-width-2"><?php echo $row1['description'] ?></td>
                    <td class="td-width-3"><?php echo number_format($row1['unit_price'], 2, '.', ','); ?></td>
                    <td class="td-width-3"><?php echo number_format($row1['amount'], 2, '.', ','); ?></td>
                </tr>
                    <?php
                }
            ?>
            </tbody>
        <table>
        <div class="fixed-bottom-text">
            <?php 
                $result1 = $mysqli->query("select sum(amount) as total from tbl_salesquotation_details where sales_quotation_id='$id'");
                $row1 = mysqli_fetch_assoc($result1);
            ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($row1['total'], 2, '.', ','); ?>
        <div>
    </div>
</body>
</html>