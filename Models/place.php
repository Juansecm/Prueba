<?php
class place{
    // 1ra Parte: Atributos
    private $dbh;
    private $cod_place;
    private $place_name;

    public function __construct(){
        try {
            $this->dbh = DataBase::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    # Constructor: Objeto 00 parámetros
    public function __construct0(){}

            # Constructor: Objeto 02 parámetros
            public function __construct2($cod_place,$place_name){
                $this->cod_place = $cod_place;
                $this->place_name= $place_name;
            }
 # Código lugar
 public function setPlaceCode($cod_place){
    $this->cod_place = $cod_place;
}
public function getPlaceCode(){
    return $this->cod_place;
}
# Nombre lugar
public function setPlaceName($place_name){
    $this->place_name = $place_name;
}
public function getPlaceCode(){
    return $this->cod_place;
}

  # RF03_CU20 - Registrar lugar
  public function create_Place(){
    try {
        $sql = 'INSERT INTO "PLACES" VALUES (:cod_place,:place_name)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue('cod_place', $this->getPlaceCode());
        $stmt->bindValue('place_name', $this->getPlaceName());
        $stmt->execute();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

# RF04_CU04 - Consultar lugar
public function read_category(){
try {
$typeList = [];
$sql = 'SELECT * FROM "PLACES"';
$stmt = $this->dbh->query($sql);
foreach ($stmt->fetchAll() as $type) {
    $typeObj = new User;
    $typeObj->setCategoryCode($type['cod_category']);
    $typeObj->setCategoryName($type['category_name']);
    array_push($categoryList, $categoryObj);
}
return $typeList;
} catch (Exception $e) {
die($e->getMessage());
}
}
# RF05_CU05 - Obtener lugar por el código
public function getcategory_bycode($categoryCode){
try {
$sql = "SELECT * FROM 'PLACES' WHERE cod_category=:categoryCode";
$stmt = $this->dbh->prepare($sql);
$stmt->bindValue('categoryCode', $categoryCode);
$stmt->execute();
$typeDb = $stmt->fetch();
$type = new User;
$type->setCategoryCode($typeDb['cod_category']);
$type->setCategoryName($typeDb['category_name']);
return $type;
} catch (Exception $e) {
die($e->getMessage());
}
}
# RF06_CU06 - Actualizar lugar
public function update_category(){
try {
$sql = 'UPDATE "PLACES" SET
            cod_category = :categoryCode,
            category_name = :category_name
        WHERE cod_category = :categoryCode';
$stmt = $this->dbh->prepare($sql);
$stmt->bindValue('categoryCode', $this->getCategoryCode());
$stmt->bindValue('cstegory_name', $this->getCategory_name());
$stmt->execute();
} catch (Exception $e) {
die($e->getMessage());
}
}

# RF07_CU07 - Eliminar lugar
public function delete_category ($categoryCode){
try {
$sql = 'DELETE FROM "PLACES" WHERE cod_category = :categoryCode';
$stmt = $this->dbh->prepare($sql);
$stmt->bindValue('categoryCode', $categoryCode);
$stmt->execute();
} catch (Exception $e) {
die($e->getMessage());
}
}
}

?>