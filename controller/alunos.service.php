<?php

//Crud
class alunoService
{

    private $conexao;
    private $student;

    public function __construct(Conexao $conexao, Students $student)
    {
        $this->conexao = $conexao->conectar();
        $this->student = $student;
    }

    public function inserir()
    { // CREATE
        $query = 'INSERT INTO students(name,email,password,phone,course,status,created_at) values (:nome,:email,:password,:phone,:course,:status,now())';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":nome", $this->student->__get('name'));
        $stmt->bindValue(':email', $this->student->__get('email'));
        $stmt->bindValue(':password', $this->student->__get('password'));
        $stmt->bindValue(':phone', $this->student->__get('phone'));
        $stmt->bindValue(':course', $this->student->__get('course'));
        $stmt->bindValue(':status', $this->student->__get('status'));
        $stmt->execute();
    }

    public function recuperar()
    { // READ
        $query = '
        SELECT 
            t.id,t.name,t.email,t.password,t.phone,s.nameCourse,t.status,t.created_at,t.updated_at
        FROM 
            students as t
            left join courses as s on (t.course = s.id)
        ORDER BY t.id ASC';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function recuperarCourse()
    {
        $query = 'SELECT id,nameCourse FROM courses';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperarRowsAlunos()
    {
        $sql = "SELECT COUNT(*) FROM students";
        $stmt = $this->conexao->query($sql);
        $count = $stmt->fetchColumn();
        return $count;
    }


    public function atualizar()
    { // UPDATE
        $query = "
                UPDATE  
                    students 
                SET 
                    name = :nome,
                    email = :email,
                    password = :senha,
                    phone = :phone,
                    course = :curso,
                    status = :status,
                    updated_at = NOW()
                WHERE 
                    id = :id
                ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->student->__get('id'));
        $stmt->bindValue(':nome', $this->student->__get('name'));
        $stmt->bindValue(':email', $this->student->__get('email'));
        $stmt->bindValue(':senha', $this->student->__get('password'));
        $stmt->bindValue(':phone', $this->student->__get('phone'));
        $stmt->bindValue(':curso', $this->student->__get('course'));
        $stmt->bindValue(':status', $this->student->__get('status'));
        return (bool)$stmt->execute();
    }



    public function remover()
    { // DELETE
        $query = 'DELETE FROM students where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->student->__get('id'));
        echo $this->student->__get('id');
        $stmt->execute();
    }
}
