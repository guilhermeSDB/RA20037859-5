<?php 

class Courses {
    private $nameCourse = null;
    private $description = null;
    private $status = null;

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

}