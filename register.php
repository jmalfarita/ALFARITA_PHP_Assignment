<?php
session_start();
$error = '';
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    if (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) {
        $error = 'Username must be 3–20 characters and contain only letters, numbers, or underscores.';
    } elseif (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
        $error = 'Please enter a valid email address.';
    } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*[0-9]).{5,}$/', $password)) {
        $error = 'Password must be at least 5 characters and include a letter and a number.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $_SESSION['registered_user'] = ['username' => $username, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)];
        header('Location: login.php?registered=1');
        exit;
    }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Absolvement - Register</title><link rel="stylesheet" href="../assets/login.css"></head><body>
<main class="container"><div class="symbol">✦</div><h1>Absolvement</h1><p class="subtitle">Forge your destiny in search of redemption.</p>
<?php if ($error): ?><p style="color:#ff7777;text-align:center"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post" action="register.php"><label for="username">Username</label><input type="text" id="username" name="username" placeholder="Choose a username" required><label for="email">Email Address</label><input type="email" id="email" name="email" placeholder="Enter your email" required><label for="password">Password</label><input type="password" id="password" name="password" placeholder="Create a password" required><label for="confirm_password">Confirm Password</label><input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required><button type="submit">Create Account</button></form>
<p class="bottom">Already have an account? <a href="login.php">Return to the realm</a></p></main></body></html>
