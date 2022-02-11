<?php
    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Post;

    const BOTAO = "Atualizar";

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location:index.php?status=erro');
        exit;
    }

    $obPost = Post::getPost($_GET['id']);

    if(!$obPost instanceof Post){
        header('location:index.php?status=erro');
        exit;
    }

    #Cadastrando dados no Banco de dados
    if(isset($_POST['titulo'], $_POST['conteudo'])){
        $obPost->titulo = $_POST['titulo'];
        $obPost->conteudo = $_POST['conteudo'];
        $obPost->id = $_GET['id'];

        // echo '<pre>';
        //     print_r($obPost);
        // echo '</pre>';
        // echo '</pre>';
        $obPost->atualizar();
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/form_up.php';
    include __DIR__.'/includes/footer.php';
