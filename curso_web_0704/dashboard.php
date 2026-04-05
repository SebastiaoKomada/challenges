<?php
if (!isset($_COOKIE['role'])) {
    header("Location: index.php");
    exit;
} else {
    $user = $_COOKIE['role'];
}
$guest = false;
$admin = false;
if ($user == 'guest') {
    $guest = true;
}
if ($user == 'admin') {
    $admin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — The Black Pearl</title>
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
            <h1 class="portal-title">Captain's Dashboard</h1>
            <p class="portal-subtitle">The Black Pearl — Crew Quarters</p>

            <div class="divider"><span class="divider-icon">⚓</span></div>

            <?php if ($guest): ?>
                <p class="dashboard-text">
                    Ye won't find anything here, landlubber. However, I know the pirate
                    really, really likes to cook. His favorite food is cookies.
                </p>
            <?php endif; ?>

            <?php if ($admin): ?>
                <p class="dashboard-text">
                    Now you're on the right track. Remember that pirates like to hide things, you know.
                </p>
                <p id="flag-wrapper" style="visibility: hidden;" data-enc="<?php
                    $flag = 'DUCK{c00kie_t4mp3r-find_admin}';
                    $key  = 'pirate';
                    $enc  = '';
                    for ($i = 0; $i < strlen($flag); $i++) {
                        $enc .= $flag[$i] ^ $key[$i % strlen($key)];
                    }
                    echo base64_encode($enc);
                ?>"></p>
                <script>
                function xorDecrypt(encoded, key) {
                    const raw = atob(encoded);
                    let out = '';
                    for (let i = 0; i < raw.length; i++) {
                        out += String.fromCharCode(raw.charCodeAt(i) ^ key.charCodeAt(i % key.length));
                    }
                    return out;
                }
                const el = document.getElementById('flag-wrapper');
                const observer = new MutationObserver(() => {
                    if (el.style.visibility !== 'hidden') {
                        const enc = el.getAttribute('data-enc');
                        el.textContent = xorDecrypt(enc, 'pirate');
                        observer.disconnect();
                    }
                });
                observer.observe(el, { attributes: true, attributeFilter: ['style'] });
                </script>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>