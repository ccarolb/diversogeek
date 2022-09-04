<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>diversogeek</title>

    <!-- linka a fonte Oswald e a fonte Lato como parte da família de fontes do projeto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Oswald:wght@700&display=swap"
        rel="stylesheet">

    <!-- linka o documento css ao projeto -->
    <link rel="stylesheet" href="style.css" type="text/css">

    <!-- linka o jquery ao projeto -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- linka o script.js ao projeto -->
    <script src="script.js"></script>
</head>

<body>

    <!-- Header da página com logo e menu -->
    <header class="container">

        <!-- Logo da página -->
        <div class="item"><a href="index.html"><img src="assets/logo.png" alt="logo diversogeek" class="logo"></a></div>

        <!-- Menu principal da página, dentro do header. -->
        <nav class="menu item">
            <ul class="container ul">
                <li><a id="home" href="index.html">home</a></li>
                <li><a id="contato" href="contato.html">contato</a></li>
                <li><a id="sobre">sobre</a></li>
                <li><a href="#">cinema</a></li>
                <li><a href="#">animes</a></li>
                <li><a href="#">séries</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <h1>Login</h1>
        <div class="form">
       <?php include_once('cadastro2.php'); ?>
        </div>
       
    </main>



    <!-- Rodapé da página -->
    <footer class="container">

        <!-- Logo da página -->
        <div class="item"><img src="assets/logo.png" alt="logo diversogeek" class="logo"></div>

        <!-- Ícones das redes sociais -->
        <div class="redes-sociais"><img src=" /assets/instagram.png" alt="">
            <div><img src="/assets/facebook.png" alt=""></div>
            <div><img src="/assets/youtube.png" alt=""></div>
            <div><img src="/assets/twitter.png" alt=""></div>
        </div>
    </footer>

</body>

</html>