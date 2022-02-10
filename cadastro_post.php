<?php
    require __DIR__.'/App/Entity/Post.php';

    use App\Entity\Post;

    #Cadastrando dados no Banco de dados
    if(isset($_GET['titulo'], $_GET['conteudo'])){
        $obPost = new Post();
        $obPost->titulo = $_POST['titulo'];
        $obPost->conteudo = $_POST['conteudo'];
        $obPost->cadastrar();
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/form.php';
    include __DIR__.'/includes/footer.php';
