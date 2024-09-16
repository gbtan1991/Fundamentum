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
$stmt = $pdo->prepare("SELECT * FROM budgets WHERE user_uuid = ? ORDER BY amount DESC");
$stmt->execute([$user_uuid]);
$budgets = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<body>

   
  
           <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="row">
               <h2 class="mt-5">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
               <h3 class="lead">Your budget overview</h3>
                </div>
                <a href="add_budget.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>

            </div>
               <div class="row">
        <?php if (count($budgets) > 0): ?>
            <?php foreach ($budgets as $budget): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($budget['budget_name']); ?></h5>
                            <p class="card-text">Amount: PHP<?php echo htmlspecialchars($budget['amount']); ?></p>
                            <p class="card-text"><small class="text-muted">Created on: <?php echo htmlspecialchars($budget['created_at']); ?></small></p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No budgets found. Start by <a href="add_budget.php" class="btn btn-success">Creating a Budget</a></p>
            </div>
        <?php endif; ?>
    </div>
</div>

 </div>


    <?php include 'includes/footer.php'; ?>
