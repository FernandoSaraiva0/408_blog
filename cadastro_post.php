<?php
    require __DIR__.'/conexao.php';

    #Cadastrando dados no Banco de dados
    if(isset($_GET['titulo'], $_GET['conteudo'])){
        $stmt = $con->prepare('INSERT INTO post (titulo, conteudo) VALUES (?, ?)');
        $stmt->bindParam(1, $_GET['titulo']);
        $stmt->bindParam(2, $_GET['conteudo']);
        $stmt->execute();
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/form.php';
    include __DIR__.'/includes/footer.php';
