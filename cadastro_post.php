<?php
    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Post;

    const BOTAO = "Cadastar";

    #Cadastrando dados no Banco de dados
    if(isset($_POST['titulo'], $_POST['conteudo'])){
        $obPost = new Post();
        $obPost->titulo = $_POST['titulo'];
        $obPost->conteudo = $_POST['conteudo'];

        // echo '<pre>';
        //     print_r($obPost);
        // echo '</pre>';
        // echo '</pre>';
        $obPost->cadastrar();
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/form.php';
    include __DIR__.'/includes/footer.php';
