<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sessionConfirmation = $_SESSION["confirmation"] ?? "";
    $postConfirmation = $_POST["confirmation"] ?? "";
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($sessionConfirmation === "" || $postConfirmation === "" || $sessionConfirmation !== $postConfirmation) {
        $message = "Request blocked: invalid confirmation token.";
    } else {
        if ($username === "host" && $password === "pass") {
            $message = "Login successful.";
        } else {
            $message = "Login failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSFR Mitigated Action</title>
</head>
<body>
    <h1>CSFR Mitigated Action</h1>

    <form method="POST" action="csfr_action.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <label>Confirmation:</label>
        <input type="text" name="confirmation" required>
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <?php if ($message !== ""): ?>
        <div><?php echo $message; ?></div>
    <?php endif; ?>
</body>
</html>