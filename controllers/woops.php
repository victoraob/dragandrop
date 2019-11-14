

<?php 


/**
 * 
 */
class Woops extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Woops No se Encontro la Pagina Solicitada";
        $this->view->render('error/index');
        #echo "Controlador Woops";
    }


    function metoo(){
    	echo "Metodo de Woops";

    }
}
?>