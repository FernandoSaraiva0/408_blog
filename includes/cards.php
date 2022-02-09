<?php
    $result = '';
    foreach($posts as $post){
        $result .=' <div class="card" style="width: 18rem;">
        <img src="img/0'.$post['id'].'.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">'.$post['titulo'].'</h5>
            <p class="card-text">'.$post['conteudo'].'</p>
        </div>
        <div class="card-body">
            <a href="#" class="card-link">Leia mais...</a>
        </div>
        </div>';
    }
?>
<section class="m-5 d-flex flex-wrap justify-content-center">
   <?= $result ?>
</section>