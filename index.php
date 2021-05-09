<?php

/**
 * Including file with database interaction
 */
require "./db/db.php";

/**
 * @package MainPackage
 * @author Ivan Egorov <www.Len244@gmail.com>
 * @version 1.0.0
 */

 /**
 * Item class that represents one item from database
 * @package MainPackage
 * @author Ivan Egorov <www.Len244@gmail.com>
 * @version 1.0.0
 */
final class Item {

    /**
     * Variable stores id of an Item
     * @access private
     * @var int
     */
    private int $id;

    /**
     * Variable stores name of an Item
     * @access private
     * @var string
     */
    private string $name;

    /**
     * Variable stores status of an Item
     * @access private
     * @var int
     */
    private int $status;

    /**
     * Varibale represents if Item vas changed or not.
     * @access private
     * @var bool
     */
    private bool $changed;

    /**
     * Stores database connection that we getting from
     * @access private
     * @var mysql
     * @see ./db/db.php
     */
    private $databaseConnection;
    
    /**
     * Item constructor
     * It is saves id inside object, gets database connection
     * And doing init.
     *
     * @param int $id ID of an item
     */
    function __construct(int $id)
    {
        $this->id = $id;
        $this->databaseConnection = initAndReturnDatabase();
        $this->init($id);
    }

    /**
     * Magic method that allow you to get properties of an item if them exists.
     *
     * @param string $name
     * 
     * @throws Exception if $name does not exists in Item.
     * 
     * @return int|string|bool|mysql
     */
    function __get($name)
    {
        if (property_exists($this, $name)){
        return $this->$name;
        } else {
            throw new Exception("Property $name does not exists");
        }
    }

    /**
     * Magic method that allows you redefine parametrs of an Item.
     * It will not redefine $id or $databaseConnection.
     *
     * @param string $name name of parametr
     * @param int|string|bool $value depends on type of parametr
     */
    function __set($name, $value)
    {
        if (strcmp($name, "id") == 0 || strcmp($name, "databaseConnection") == 0){}
        else if (property_exists($this, $name) && gettype($this->name) == gettype($value)){
            $this->changed = true;
            $this->$name = $value;
        }
    }
    
    /**
     * Method init call only in constructor.
     * You mustn't use it anywhere else.
     * 
     * Method fetch data from database and stores it in Item.
     *
     * @param integer $id
     * @return void
     */
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

    /**
     * Method save saves changes into database.
     * Before save it is check $changed variable.
     *
     * @return void
     */
    public function save(){
        if($this->changed){
            $this->databaseConnection->query("UPDATE objects SET name = $this->name, status = $this->status WHERE id = $this->id");
            $this->changed = false;
        }
    }
}
?>