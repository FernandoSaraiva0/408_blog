<?php
namespace App\Entity;

use App\Db\Database;
use PDO;

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
        $this->id = $obDatabase->insert([
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo,
            'data' => $this->data
        ]);
    }

    public function atualizar(){
        return (new Database('post'))->update('id='.$this->id, [
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo,
            'data' => $this->data
        ]);
    }

    public function excluir(){
        return (new Database('post'))->delete(' id= '.$this->id);
    }

    #Metodo para pegar dados do banco
    public static function getPosts($where = null, $order = null, $limit = null){
        return (new Database('post'))->select($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getPost($id){
        return (new Database('post'))->select('id='.$id)
                                    ->fetchObject(self::class);
    }

}