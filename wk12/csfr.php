<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === "host" && $password === "pass") {
        $message = "Login successful.";
    } else {
        $message = "Login failed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSFR Demo</title>
</head>
<body>
    <h1>CSFR Demo</h1>

    <form method="POST" action="csfr.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>

    <?php if ($message !== ""): ?>
        <div><?php echo $message; ?></div>
    <?php endif; ?>
</body>
</html>