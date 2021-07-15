<?php

namespace App\Entity;

use \App\db\Database;
use \PDO;

class Vaga{

    public $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;


    public function cadastrar(){
        $this->data = date('Y-m-d H:i:s');
        $Connect = new Database('vagas');
        $this->id = $Connect->insert([
                                        'titulo' => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'ativo' => $this->ativo,
                                        'data' => $this->data,
                                    ]);

        return true;
    }

    public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id, [
                                                        'titulo' => $this->titulo,
                                                        'descricao' => $this->descricao,
                                                        'ativo' => $this->ativo,
                                                        'data' => $this->data,
        ]);
    }

    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }

    public static function getVaga($id){

        return (new Database('vagas'))->select('id = '.$id)->fetchObject(self::class);
    }

    //retorna o resultado da instâncias de vagas
    public static function getVagas($where = null, $order = null, $limit = null){
        // return (new Vaga('vagas'));
        
        return (new Database('vagas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }
}