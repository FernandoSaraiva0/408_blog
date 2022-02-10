<?php

namespace App\Entity;

use App\Db\Database;

class Post{

    public $id;
    public $titulo;
    public $conteudo;
    public $data;

    #Metodo para cadastrar Post
    public function cadastrar(){

        // Cadastrando data
        $this->data = date('Y-m-d H:i:s');
        // Instancia de banco de dados passando os dados para
        $obDatabase = new Database('post');
        $obDatabase->insert([
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo,
            'data' => $this->data
        ]);
    }

    public function getPosts(){

    }

}