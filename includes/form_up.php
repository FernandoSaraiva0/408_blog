
<section class="col-6 m-auto mt-5 d-flex flex-column">
    <form method="POST">
        <div class="mb-3">
        <label  class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="<?= $obPost->titulo?>">
        </div>
        <div class="mb-3">
        <label class="form-label">Conteudo</label>
        <textarea class="form-control" rows="5" name="conteudo"  value="<?php $obPost ? $obPost->conteudo : '' ?>"><?= $obPost->conteudo ?></textarea>
        </div>
        <button type="submit" class=" mb-5 btn btn-primary"><?= BOTAO ?></button> 
    </form>
</section> 