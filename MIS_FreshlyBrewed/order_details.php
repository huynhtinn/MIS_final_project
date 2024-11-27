<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get Order ID
$order_id = $_GET['order_id'];

// Fetch order details
$orderDetailsQuery = "SELECT od.Quantity, od.UnitPrice, p.ProductName 
                      FROM OrderDetails od
                      JOIN Products p ON od.ProductID = p.ProductID
                      WHERE od.OrderID = ?";
$stmt = $conn->prepare($orderDetailsQuery);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$orderDetails = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Order Details</h3>
    <?php if (count($orderDetails) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $detail): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($detail['ProductName']); ?></td>
                        <td><?php echo htmlspecialchars($detail['Quantity']); ?></td>
                        <td><?php echo number_format($detail['UnitPrice'], 2); ?></td>
                        <td><?php echo number_format($detail['Quantity'] * $detail['UnitPrice'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No details found for this order.</p>
    <?php endif; ?>
    <a href="user.php" class="btn btn-primary">Back to User Dashboard</a>
</div>
</body>
</html>
