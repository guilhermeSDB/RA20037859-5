<?php

//Crud
class cursoService
{

    private $conexao;
    private $course;

    public function __construct(Conexao $conexao, Courses $course)
    {
        $this->conexao = $conexao->conectar();
        $this->course = $course;
    }

    public function inserir()
    { // CREATE
        $query = 'INSERT INTO courses(nameCourse,description,status,dateStart,dateFinish,created_at) values (:nameCourse,:description,:status,:dateStart,:dateFinish,now())';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":nameCourse", $this->course->__get('nameCourse'));
        $stmt->bindValue(':description', $this->course->__get('description'));
        $stmt->bindValue(':status', $this->course->__get('status'));
        $stmt->bindValue(':dateStart', $this->course->__get('dateStart'));
        $stmt->bindValue(':dateFinish', $this->course->__get('dateFinish'));
        $stmt->execute();
    }

    public function recuperar()
    { // READ
        $query = '
        SELECT 
            *
        FROM 
            courses
        ORDER BY id ASC';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar()
    { // UPDATE
        $query = "
                UPDATE  
                    courses 
                SET 
                    nameCourse = :nameCourse,
                    description = :description,
                    dateStart = :dateStart,
                    dateFinish = :dateFinish,
                    status = :status,
                    updated_at = NOW()
                WHERE 
                    id = :id
                ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->course->__get('id'));
        $stmt->bindValue(':nameCourse', $this->course->__get('nameCourse'));
        $stmt->bindValue(':description', $this->course->__get('description'));
        $stmt->bindValue(':dateStart', $this->course->__get('dateStart'));
        $stmt->bindValue(':dateFinish', $this->course->__get('dateFinish'));
        $stmt->bindValue(':status', $this->course->__get('status'));
        return (bool)$stmt->execute();
    }

    public function remover()
    { // DELETE
        $query = 'DELETE FROM courses where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->course->__get('id'));
        echo $this->course->__get('id');
        $stmt->execute();
    }
}
