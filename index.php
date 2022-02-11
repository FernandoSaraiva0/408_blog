<?php
    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Post;

    #pegando posts do banco de dados com PDO
    $posts = Post::getPosts();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cards.php';
    include __DIR__.'/includes/footer.php';
