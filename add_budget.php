<?php
session_start();
require 'includes/database.php';
include 'includes/header.php';


if (!isset($_SESSION['user_uuid'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $budget_name = trim($_POST['budget_name']);
    $amount = trim($_POST['amount']);
    $user_uuid = $_SESSION['user_uuid']; // Get the user's UUID from session

    if (empty($budget_name) || empty($amount)) {
        echo "Please fill in all fields.";
    } else {
        // Insert budget into the database
        $stmt = $pdo->prepare("INSERT INTO budgets (user_uuid, budget_name, amount) VALUES (?, ?, ?)");
        if ($stmt->execute([$user_uuid, $budget_name, $amount])) {
            echo "Budget added successfully!";
            header('Location: dashboard.php');
            exit;
        } else {
            echo "An error occurred while adding the budget.";
        }
    }
}
?>


<body>
    <h2>Add New Budget</h2>
    <form action="add_budget.php" method="post">
        <label for="budget_name">Budget Name:</label><br>
        <input type="text" id="budget_name" name="budget_name" required><br>
        <label for="amount">Amount:</label><br>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <button type="submit">Add Budget</button>
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

<?php include 'includes/footer.php' ?>