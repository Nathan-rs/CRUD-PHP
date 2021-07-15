<?php

namespace App\db;

use PDO;
use PDOException;

class Database {
    const HOST = 'localhost';
    const NAME = 'db_vagas';
    const USER = 'root';
    const PASS = '';
    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }


    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "ERROR: ".$e->getMessage();
        }
    }


    //executa querys no banco de dados
    public function execute($query, $params = []){
        try{
            // o metodo preprare da classe PDO prepara a query antes de exutar, ou seja, 
            //substitui os valores na query deixando pronto
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }
    }


    //executar a query insert
    public function insert($values){
        //definir os campos dinamicos no insert
        $fields = array_keys($values);


        // a função array_pad retorna um novo array com o numero de possições definidas e valores para as possiçoes
        $binds = array_pad([], count($fields), "?");

        // definir os valores a ser inseridos no insert
        $query = 'INSERT INTO '.$this->table.' ('.implode(",",$fields).') VALUES ('.implode(",",$binds).')';


        //executa o insert no banco de dados
        $this->execute($query, array_values($values));
        //retorna o ID inserido
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){

        $where = strlen($where) ? 'WHERE '.$where : "";
        $order = strlen($order) ? 'ORDER BY '.$order : "";
        $limit = strlen($limit) ? 'LIMIT '.$limit : "";

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }


    public function update($where, $values){
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode("=?,",$fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));
        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }

}