<?php
require "./db/db.php";
final class Item {

    private int $id;
    private string $name;
    private int $status;
    private bool $changed;
    private $databaseConnection;
    
    function __construct(int $id)
    {
        $this->id = $id;
        $this->databaseConnection = initAndReturnDatabase();
        $this->init($id);
    }

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        if (strcmp($name, "id") == 0){}
        else if (property_exists($this, $name) && gettype($this->name) == gettype($value)){
            $this->changed = true;
            $this->$name = $value;
        }
    }
    
    private function init(int $id){

        $object_query = $this->databaseConnection->query("SELECT name, status FROM objects WHERE id = $id");

        if ($this->databaseConnection->error){
            throw "There is an error occured: " . $this->databaseConnection->error;
        }

        if ($object_query->num_rows > 0 ){
            $row = $object_query->fetch_array();

            $this->name = $row["name"];
            $this->status = $row["status"];
        } else {
            echo "0 results";
        }

        echo "Name: " . $this->name . PHP_EOL;
        echo "Status: " . $this->status . PHP_EOL;

    }

    public function save(){
        if($this->changed){
            $this->databaseConnection->query("UPDATE objects SET name = $this->name, status = $this->status WHERE id = $this->id");
            $this->changed = false;
        }
    }
}
?>