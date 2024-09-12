<?php
session_start();
require 'includes/database.php';


include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_uuid = $_SESSION['user_uuid'];

// Fetch all budgets for the logged-in user
$stmt = $pdo->prepare("SELECT * FROM budgets WHERE user_uuid = ?");
$stmt->execute([$user_uuid]);
$budgets = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<body>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    
    <h3>Your Budgets:</h3>
    <?php if (count($budgets) > 0): ?>
        <table border="1">
            <tr>
                <th>Budget Name</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr>
            <?php foreach ($budgets as $budget): ?>
            <tr>
                <td><?php echo htmlspecialchars($budget['budget_name']); ?></td>
                <td><?php echo htmlspecialchars($budget['amount']); ?></td>
                <td><?php echo htmlspecialchars($budget['created_at']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>You have no budgets yet.</p>
    <?php endif; ?>

    <br>
    <a href="add_budget.php">Add New Budget</a>



    <?php include 'includes/footer.php'; ?>
