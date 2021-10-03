<?php 

class Students {
    private $id = null;
    private $name = null;
    private $email = null;
    private $password = null;
    private $phone = null;
    private $course = null;
    private $status = null;
    private $created_at = null;
    private $updated_at = null;

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

}