<?php
session_start();

if (!isset($_SESSION['correto1'])) $_SESSION['correto1'] = false;
if (!isset($_SESSION['correto2'])) $_SESSION['correto2'] = false;
if (!isset($_SESSION['correto3'])) $_SESSION['correto3'] = false;
if (!isset($_SESSION['correto4'])) $_SESSION['correto4'] = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $flag1 = $_POST['flag1'] ?? '';
    $flag2 = $_POST['flag2'] ?? '';
    $flag3 = $_POST['flag3'] ?? '';
    $flag4 = $_POST['flag4'] ?? '';

    if($flag1 == 'DUCK{c00kie_t4mp3r-find_admin}') $_SESSION['correto1'] = true;
    if($flag2 == 'DUCK{qu4ck_7h3_c0d3}')           $_SESSION['correto2'] = true;
    if($flag3 == 'DUCK{h1dd3n_1n_pl41n_s1ght}')    $_SESSION['correto3'] = true;
    if($flag4 == 'DUCK{n4d4_3r4_t40_s3gur0}')      $_SESSION['correto4'] = true;
}

$correto1 = $_SESSION['correto1'];
$correto2 = $_SESSION['correto2'];
$correto3 = $_SESSION['correto3'];
$correto4 = $_SESSION['correto4'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF — Curso 07/04</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="scanline"></div>

    <header>
        <div class="badge">CTF · Curso 07/04</div>
        <h1>Dominando Desafios CTF<br><span>Estratégias e Ferramentas em Cibersegurança</span></h1>
        <p class="subtitle">QUESTÕES PRÁTICAS</p>
    </header>

    <main>
        <p class="section-label">Desafios</p>

        <div class="grid">

            <div class="cartao" data-cat="web" <?php if($correto1) echo 'data-solved'; ?>>
                <div class="cartao-header">
                    <h3>Web</h3>
                    <span class="tag">ONLINE</span>
                </div>
                <p>Os registros indicam que nem todos os privilégios são definidos no servidor. Alguns dados parecem ser controlados diretamente pelo navegador do usuário… e talvez manipuláveis.

                    Seu objetivo é assumir o controle como capitão e acessar o tesouro escondido.</p>
                <a href="https://kz0-lab.discloud.app/" target="_blank">Acessar sistema</a>
                <?php if($correto1): ?>
                    <div class="success-badge">Flag capturada</div>
                <?php else: ?>
                    <form class="flag-form" action="" method="post">
                        <input type="text" id="flag1" name="flag1" placeholder="DUCK{...}" autocomplete="off">
                        <button type="submit">Enviar</button>
                    </form>
                <?php endif; ?>
            </div>

            <div class="cartao" data-cat="rev" <?php if($correto2) echo 'data-solved'; ?>>
                <div class="cartao-header">
                    <h3>Análise Reversa</h3>
                    <span class="tag">BINARY</span>
                </div>
                <p>Quack me if you can

                    Um pato muito desconfiado escondeu sua mensagem secreta dentro de um programa. Dizem que ele odeia deixar senhas em texto puro e adora embaralhar tudo com truques bobos o suficiente para confundir humanos apressados.

                    Seu objetivo é descobrir a senha escondida e arrancar o segredo desse pato criptógrafo.</p>
                <a href="compilado" download>Baixar binário</a>
                <br>
                <?php if($correto2): ?>
                    <div class="success-badge">Flag capturada</div>
                <?php else: ?>
                    <form class="flag-form" action="" method="post">
                        <input type="text" id="flag2" name="flag2" placeholder="DUCK{...}" autocomplete="off">
                        <button type="submit">Enviar</button>
                    </form>
                <?php endif; ?>
            </div>

            <div class="cartao" data-cat="net" <?php if($correto3) echo 'data-solved'; ?>>
                <div class="cartao-header">
                    <h3>Análise de Rede</h3>
                    <span class="tag">PCAP</span>
                </div>
                <p>À primeira vista, o conteúdo parece comum. Porém, algo foi alterado para dificultar a leitura direta, exigindo um pouco mais de atenção durante a análise.

                    Sua tarefa é inspecionar a captura, identificar o ponto relevante da comunicação, extrair o conteúdo oculto e revelar a flag.</p>
                <a href="capture.pcap">Baixar captura</a>
                <?php if($correto3): ?>
                    <div class="success-badge">Flag capturada</div>
                <?php else: ?>
                    <form class="flag-form" action="" method="post">
                        <input type="text" id="flag3" name="flag3" placeholder="DUCK{...}" autocomplete="off">
                        <button type="submit">Enviar</button>
                    </form>
                <?php endif; ?>
            </div>

            <div class="cartao" data-cat="crypto" <?php if($correto4) echo 'data-solved'; ?>>
                <div class="cartao-header">
                    <h3>Criptografia</h3>
                    <span class="tag">CIPHER</span>
                </div>
                <p>Receita do Pato

                    Um pato muito organizado decidiu proteger sua receita secreta de quacks.

                    No caderno dele, havia a seguinte anotação:

                    "Nada complicado. Só avancei o alfabeto em 3 casas, depois li tudo do fim para o começo e, por fim, guardei num formato que parece complicado, mas não é."

                    A mensagem encontrada foi:

                    fTB1eGozdl8wNHdfNHUzXzRnNHF7TkZYRw==</p>
                <?php if($correto4): ?>
                    <div class="success-badge">Flag capturada</div>
                <?php else: ?>
                    <form class="flag-form" action="" method="post">
                        <input type="text" id="flag4" name="flag4" placeholder="DUCK{...}" autocomplete="off">
                        <button type="submit">Enviar</button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </main>

</body>

</html>