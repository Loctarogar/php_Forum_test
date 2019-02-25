<?php

class Role
{
    protected $name;
    protected $db;
    protected $table = "roles";

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function showAllRoles(){
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