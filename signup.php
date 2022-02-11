<?php

ob_start();

$_POST["title"] = "Sign Up";
include_once("includes/header.php");

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

?>

<h1>Sign Up</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" class="signup">
    <input type="text" name="firstName" placeholder="First name" autocomplete="off" />
    <input type="text" name="lastName" placeholder="Last name" autocomplete="off" />
    <input type="email" name="email" placeholder="Email" autocomplete="off" />
    <input type="password" name="password" placeholder="Password" autocomplete="off" />
    <div class="buttons">
        <button type="submit" name="submit">Sign Up</button>
        <a href="login.php">Login</a>
    </div>
</form>

<?php

if (isset($_POST["submit"])) {
    if (!isset($_POST["firstName"])) {
        echo "First name not set";
        return;
    }

    if (!isset($_POST["lastName"])) {
        echo "Last name not set";
        return;
    }

    if (!isset($_POST["email"])) {
        echo "Email not set";
        return;
    }

    if (!isset($_POST["password"])) {
        echo "Password not set";
        return;
    }

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    include(CLASS_PATH . "User.php");

    $user = new User(null);
    if ($user->signUp($firstName, $lastName, $email, $password)) {
        header("Location: index.php");
    } else {
        echo "Failed";
    }

}

ob_end_flush();

?>

<?php include_once(INCLUDE_PATH . "footer.php"); ?>
