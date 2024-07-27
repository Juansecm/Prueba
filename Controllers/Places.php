<?php
 require_once "models/User.php";
 class Places{

     public function __construct(){}

     // Controlador Principal
     public function main(){
         header("Location: ?c=Dashboard");
     }

     // Controlador Crear categoria
 public function placeCreate(){
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once "views/modules/places/place_create.view.php";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $type = new Places;
        $type->setPlaceCode(null);
        $type->setplace($_POST['cod_place']);
        $type->create_place();
        header("Location: ?c=Places&a=placeRead");
    }
}
 // Controlador Consultar categoria
 public function placeRead(){
    $types = new Places;
    $types = $types->read_place();
    require_once "views/modules/places/place_read.view.php";
}
 // Controlador Actualizar categoria
 public function placeUpdate(){
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $typeId = new Places;
        $typeId = $typeId->getplace_bycode($_GET['idplace']);
        require_once "views/modules/places/place_read.view.php";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $typeUpdate = new Places;
        $typeUpdate->setPlaceCode($_POST['cod_category']);
        $typeUpdate->setPlaceName($_POST['category_name']);
        $typeUpdate->update_place();
        header("Location: ?c=Places&a=placeRead");
    }
}
        // Controlador Eliminar categoria
        public function placeDelete(){
            $type = new Places;
            $type->delete_place($_GET['idplace']);
            header("Location: ?c=Places&a=placeRead");
        }
    }
?>