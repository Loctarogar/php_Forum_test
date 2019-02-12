<?php

class User
{
    protected $db;
    protected $table = "users";
    protected $name;
    protected $password;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function userCreate(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?, ?)        
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name, $this->password]);

        return $stmt;
    }

    public function getUser($id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE id = :id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);

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
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}
