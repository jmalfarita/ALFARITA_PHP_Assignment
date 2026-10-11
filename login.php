<?php
session_start();
if (empty($_SESSION['registered_user'])) {
    header('Location: register.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) {
        $error = 'Username must be 3–20 characters using letters, numbers, or underscores.';
    } elseif ($username === $_SESSION['registered_user']['username'] && password_verify($password, $_SESSION['registered_user']['password'])) {
        session_regenerate_id(true);
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: ../index.php');
        exit;
    } else { $error = 'Invalid username or password.'; }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Absolvement - Login</title><link rel="stylesheet" href="../assets/login.css"></head><body>
<main class="container"><div class="symbol">✦</div><h1>Absolvement</h1><p class="subtitle">Rise, Fragment. The Soul Continent awaits.</p>
<?php if ($error): ?><p style="color:#ff7777;text-align:center"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post" action="login.php"><label for="username">Username</label><input type="text" id="username" name="username" placeholder="Enter your username" required><label for="password">Password</label><input type="password" id="password" name="password" placeholder="Enter your password" required><button type="submit">Enter the Realm</button></form>
<p class="bottom">Not a warrior yet? <a href="register.php">Create an account</a></p></main></body></html>
