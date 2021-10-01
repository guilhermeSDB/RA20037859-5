<?php 

//Crud
class cursoService{

    private $conexao;
    private $course;

    public function __construct(Conexao $conexao,Courses $course){
        $this->conexao = $conexao->conectar();
        $this->course = $course;
    }

    public function inserir(){ // CREATE
        $query = 'INSERT INTO courses(nameCourse,description,status) values (:nameCourse,:description,:status)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":nameCourse", $this->course->__get('nameCourse'));
        $stmt->bindValue(':description',$this->course->__get('description'));
        $stmt->bindValue(':status',$this->course->__get('status'));      
        $stmt->execute();
    }

    public function recuperar(){ // READ
        $query = '
        SELECT 
            *
        FROM 
            courses';    
        $stmt = $this->conexao->prepare($query);        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

        

    }

    public function atualizar(){ // UPDATE
        
    }

    public function remover(){ // DELETE
        
    }
}

?>