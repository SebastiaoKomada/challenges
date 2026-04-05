<?php
$error = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];
    if ($user == 'guest' && $password == 'guest') {
        setcookie("role", "guest", time() + 3600, "/");
        header("Location: /dashboard.php");
        exit;
    } else {
        header("Location: /index.php?error=1");
        exit;
    }
}
if (isset($_GET['error']) && $_GET['error'] == '1') {
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal — The Black Pearl</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="pirate.css">
</head>
<body>
    <div class="skull-bg">☠</div>

    <div class="container">
        <div class="ship-header">
            <span class="flag-emoji">🏴‍☠️</span>
        </div>

        <div class="portal-card">
            <h1 class="portal-title">Employee Portal</h1>
            <p class="portal-subtitle">The Black Pearl — Crew Access</p>

            <div class="divider"><span class="divider-icon">⚓</span></div>

            <?php if ($error): ?>
                <div class="error-msg">Wrong credentials, ye scallywag!</div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="field-group">
                    <label for="user">⚓ Seafarer's Name</label>
                    <input type="text" id="user" name="user" autocomplete="off">
                </div>
                <div class="field-group">
                    <label for="password">🗝 Secret Passphrase</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" class="submit-btn">⛵ Set Sail</button>
            </form>

            <p class="hint">Try the guest quarters with guest / guest</p>
        </div>
    </div>
</body>
</html>