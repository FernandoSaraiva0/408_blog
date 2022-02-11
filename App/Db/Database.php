<?php

namespace App\Db;

use PDO;
use PDOException;

class Database{

    const HOST = 'localhost';
    const DB = 'blogc';
    const USER = 'root';
    const PASS = '';

    private $con; // Variavel de conexão com o banco de dados
    private $table; // Variavel que guarda o nome da tabela

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setCon();
    }

    #Conexão com banco de dados
    public function setCon(){
        try{
            $this->con = new PDO('mysql:host='.self::HOST.';dbname='.self::DB.'', self::USER, self::PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        }catch(PDOException $ex){
            echo "<pre>";
            echo $ex->getMessage();
            echo "</pre>";
        }
    }

    #Método que executa o meu PDOStatement
    public function execute($query, $params = []){
        try{
            $stmt = $this->con->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $ex){
            echo "<pre>";
            echo $ex->getMessage();
            echo "</pre>";
        }
        
    }

    #Método para inserir dados no banco
    public function insert($values){
        #Utilizando a função array_key para pegar apenas as chaves do meu array
        $fields = array_keys($values);
        #utilizando a função array_pad para criar binds com base em quantos resultados eu receber em fields
        $binds = array_pad([],count($fields), '?');
        #Query de consulta
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
        #executando a consulta
        $this->execute($query, array_values($values));
        #retornando o ultimo id inserido
        return $this->con->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        #pegar os dados para a consulta
        $where = strlen($where) ? ' WHERE '.$where : ' ';
        $order = strlen($order) ? ' WHERE '.$order : ' ';
        $limit = strlen($limit) ? ' WHERE '.$limit : ' ';

        #montando a consulta
        $query = 'SELECT '.$fields.' FROM '.$this->table.$where.$order.$limit;

        #executando a consulta
        return $this->execute($query);
    }

    public function update($where, $values){
        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '.implode(' =?, ', $fields).' =? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }



}