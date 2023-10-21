<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="gsap.min.js"></script>
    <script src="index.js" defer></script>
    <script src="jquery.js"></script>
	<script src="jquery.dataTables.js"></script>
	<script src="datatables-bootstrap3.js"></script>
    <script src="animation.js" defer></script>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="datatables-bootstrap3.css" rel="stylesheet">
    <title>Financial Management</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="close">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="nav"> 
            <div class="nav-header">
                
            </div>
            <div class="nav-links">
                <ul>
                    <li class="pay">Accounts Payable</li>
                    <li class="rec">Accounts Receivable</li>
                    <li class="state">Income Statement</li>
                    <li class="ledg">Ledger</li>
                </ul>

                <button>
                    <a href="logout.php">Log Out</a>
                </button>
            </div>
        </div>
        <div class="main">
            <div class="table-wrapper">
                <div class="payable">
                    <h1>Accounts Payable</h1>
                    <table id="table">
                        <thead>
                            <tr>
                                <td>Invoice #</td>
                                <td>Supplier</td>
                                <td>Invoice Date</td>
                                <td>Due Date</td>
                                <td>Amount Owed</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "itpfl_db");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                if (isset($_POST['add'])) {
                                    $supplier_name = $_POST['supplier_name'];
                                    $invoice_date = $_POST['invoice_date'];
                                    $due_date = $_POST['due_date'];
                                    $amount_owed = $_POST['amount_owed'];

                                    $query = "INSERT INTO tbl_accntpayable (supplier_name, invoice_date, due_date, amount_owed) VALUES ('$supplier_name', '$invoice_date', '$due_date', $amount_owed)";

                                    if (mysqli_query($conn, $query)) {
                                        echo "Record added successfully.";
                                    } else {
                                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                    }
                                }

                                $query = $conn->query("SELECT * FROM tbl_accntpayable");

                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $data['invoice_no'] ?></td>
                                <td><?php echo $data['supplier_name'] ?></td>
                                <td><?php echo $data['invoice_date'] ?></td>
                                <td><?php echo $data['due_date'] ?></td>
                                <td><?php echo $data['amount_owed'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="table2">
            <h1>Accounts Receivable</h1>
            <table id="table2">
                <thead>
                    <tr>
                        <td>Invoice #</td>
                        <td>Customer</td>
                        <td>Invoice Date</td>
                        <td>Due Date</td>
                        <td>Amount Receivable</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_accntsreceivable");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $data['invoice_no'] ?></td>
                        <td><?php echo $data['customer_name'] ?></td>
                        <td><?php echo $data['invoice_date'] ?></td>
                        <td><?php echo $data['due_date'] ?></td>
                        <td><?php echo $data['amount_receivable'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="table3">
            <h1>Income Statement</h1>
            <table id="table3">
                <thead>
                    <tr>
                        <td>Report Date</td>
                        <td>Revenue</td>
                        <td>Cost Of Goods Sold</td>
                        <td>Operating Expenses</td>
                        <td>Net Income</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_incstatement");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $data['report_date'] ?></td>
                        <td><?php echo $data['revenue'] ?></td>
                        <td><?php echo $data['cost_of_golds_sold'] ?></td>
                        <td><?php echo $data['operating_expenses'] ?></td>
                        <td><?php echo $data['net_income'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="table4">
            <h1>Ledger</h1>
            <table id="table4">
                <thead>
                    <tr>
                        <td>Transaction Date</td>
                        <td>Description</td>
                        <td>Debit Amount</td>
                        <td>Credit Amount</td>
                        <td>Account Type</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_ledger");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $data['transaction_date'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['debit_amount'] ?></td>
                        <td><?php echo $data['credit_amount'] ?></td>
                        <td><?php echo $data['account_type'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>