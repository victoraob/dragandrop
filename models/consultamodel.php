<?php 

/**
 * 
 */
include_once 'models/alumnos.php';
class ConsultaModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function insertar(){
		//insertar datos en la base de datos

		#$this->db->connect();
		echo "Insertar Datos modelo desde clase consultamodellll";
	}

	public function get(){

		/*la variable items es un arreglo query es la consulta y la otra query es la funcion nativa el tercer query es la misma variable accediendo a la consulta sql que es select y en el while en row se estan entregando los datos de la consulta en columnas*/
		$items = [];

		try {

         $query = $this->db->connect()->query("SELECT * FROM alumnos");

			while ($row = $query->fetch()) {

				$item = new Alumnos();
				$item->matricula = $row['matricula'];
				$item->nombre    = $row['nombre'];
				$item->apellido  = $row['apellido'];

				array_push($items, $item);
				
			}
			return $items;
			
		} catch (PDOException $e) {

			return [];
			
		}
	}//fin function get 


	public function getById($id){


		$item = new Alumnos();

        $query 
        = $this->db->connect()
        ->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");

		try {

			$query->execute(['matricula' => $id]);

			while ($row = $query->fetch()) {

				$item->matricula = $row['matricula'];
				$item->nombre    = $row['nombre'];
				$item->apellido  = $row['apellido'];	
			}

			return $item;	
		} catch (PDOException $e) {
			return null;			
		}

	}//fin de getById

	public function update($datos){

		$query 
        = $this->db->connect()
        ->prepare("UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula");

        try {

        	$query->execute([
        		'matricula' => $datos['matricula'],
        		'nombre'    => $datos['nombre'],
        		'apellido'  => $datos['apellido']
        	]);

        	return true;
        	
        } catch (PDOException $e) {
        	return false;
        	
        }

	}

	public function delete($id){

		$query 
        = $this->db->connect()
        ->prepare("DELETE  FROM alumnos WHERE matricula = :id");

        try {

        	$query->execute(['id' => $id]);

        	return true;
        	
        } catch (PDOException $e) {
        	return false;
        	
        }



	}







}



 ?>