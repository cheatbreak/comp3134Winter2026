<?php
session_start();
$_SESSION["confirmation"] = bin2hex(random_bytes(16));
$confirmation = $_SESSION["confirmation"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected CSFR Form</title>
</head>
<body>
    <h1>Protected CSFR Form</h1>

    <form method="POST" action="csfr_action.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <input type="hidden" name="confirmation" value="<?php echo $confirmation; ?>">

        <button type="submit">Login</button>
    </form>
</body>
</html>