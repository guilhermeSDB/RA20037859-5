<?php 

class Courses {
    private $nameCourse = null;
    private $description = null;    
    private $dateStart = null;
    private $dateFinish = null;
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