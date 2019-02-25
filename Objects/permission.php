<?php

class Permission
{
    protected $name;
    protected $table = "permissions";
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function showAllPermissions(){
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}