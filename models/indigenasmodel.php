<?php 
/**
 * 
 */
class IndigenasModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}



    /************************************
       READ 
    *************************************/

    public function getQuestion($llave){

    	$questions = [];

        try {

         $query = $this->db->connect()->prepare("SELECT * FROM answers INNER JOIN questions on answers.questions_id=id_questions WHERE id_questions = :llave ");

         $query->execute(['llave' => $llave]);

            while($filas = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                #echo $filas['questions'];
               $questions = $filas;
            }
            return $questions ;
            
        } catch (PDOException $e) {

            #return [];
            echo "entro en el catch";
            
        }

		#echo "en model";
    }//fin getQuestions


    function getUser($correo){
        $items = [];

        $query = $this->db->connect()->prepare("SELECT * FROM estudent_part WHERE correo = :correo");
        
            try {

            $query->execute(['correo' => $correo]);
            while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                $items = $row;
            }

            return $items;
            
        } catch (PDOException $e) {
            return null;            
        }


    }//FIN DE obtener usuario


    public function getUserExist($correo, $pass){


        $query = $this->db->connect()->prepare('SELECT * FROM estudent_part WHERE correo = :correo AND password = :pass');
        $query->execute(['correo' => $correo, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }






    /********************************************************
           INSERT
    **********************************************************/


    public function insertpart($datos){

    	try {

    		$query = $this->db->connect()->prepare("INSERT INTO estudent_part(nombre,apellido,cedula,edad,grado,codigo) VALUES (:nombre,:apellido,:cedula,:edad,:grado,:codigo)");

    		$query->execute([
    			'nombre' => $datos['nombre'],
    			'apellido' => $datos['apellido'],
    			'cedula' => $datos['cedula'],
    			'edad' => $datos['edad'],
    			'grado' => $datos['grado'],
    			'codigo' => $datos['codigo']
    		]);

    		return true;	
    	} catch (PDOException $e) {
    		return false;
    	}
    }//fin de insertpart




    /*******************************************************
              CREATE
    *********************************************************/


    public function insertarNota($datos){

        try {

            $query = $this->db->connect()->prepare("INSERT INTO estudent_evaluation(estudent_ee,evaluation_ee,nota_final) VALUES (:estudent,:evaluation,:nota)");

            $query->execute([
                'estudent' => $datos['usuario'],
                'evaluation' => $datos['evaluacion'],
                'nota' => $datos['nota'],
                
            ]);

            return true;    
        } catch (PDOException $e) {
            return false;
        }

        


    }


    function getEvaluacion($aidi){
        $items = [];

        $query = $this->db->connect()->prepare("SELECT * FROM evaluation WHERE id_evaluation = :id");
        
            try {

            $query->execute(['id' => $aidi]);
            while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                $items = $row;
            }

            return $items;
            
        } catch (PDOException $e) {
            return null;            
        }


    }//FIN DE obtener usuario


    public function getUserNote($correo){

        $usernote = [];

        try {

         $query = $this->db->connect()->prepare("SELECT * FROM estudent_evaluation WHERE estudent_ee=:correo");

         $query->execute(['correo' => $correo]);

            while($filas = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                #echo $filas['questions'];
               $usernote = $filas;
            }
            return $usernote ;
            return true;
            
        } catch (PDOException $e) {

            return [];
            return false;
            
            
        }





    }










}//fin de la clase



 ?>