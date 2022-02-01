<?php

include_once("includes/header.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<span id="greeting">Hi, Jesse</span>
<a href="includes/logout.php" id="logout">Logout</a>
<h1>What do you want to accomplish?</h1>
<form action="edit-goal.php" method="POST" class="goal">
    <input type="text" name="goal" placeholder="I want to ..." />
    <input type="hidden" name="categoryIdPreselect" /> <!-- add option data like category selected -->
    <button type="submit" class="go">Go</button>
</form>

<div class="divider"></div>

<?php 

$_GET["showNewCategory"] = false;
include_once("includes/categories.php");

?>
<span class="sort-by">Sort By</span>

<div class="goals">
    <?php

    include("classes/Goal.php");;

    $goals = Goal::getGoals($_SESSION["user_id"]);
    foreach ($goals as $goal) {
        include("includes/view-goal.php");
    }

    ?>
</div>

<script src="javascript/click-to-view-goal.js"></script>
<script src="javascript/select-category.js"></script>
<script src="javascript/sort-goals.js"></script>
<script src="javascript/new-goal-category-preselect.js"></script>

<?php include_once("includes/footer.php"); ?>
