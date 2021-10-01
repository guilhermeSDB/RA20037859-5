<?php 

class Students {
    private $name = null;
    private $email = null;
    private $password = null;
    private $phone = null;
    private $course = null;
    private $status = null;

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

}