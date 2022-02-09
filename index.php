<?php
    require __DIR__.'/conexao.php';

    #pegando posts do banco de dados com PDO
    $posts = $select->fetchAll(PDO::FETCH_ASSOC);

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cards.php';
    include __DIR__.'/includes/footer.php';
