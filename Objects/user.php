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
                  VALUES (0, ?, ?, null)        
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->name, $this->password]);

        return $stmt;
    }

    public function userRead($id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE user_id = :id and deleted_at IS NULL
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt;
    }

    public function userUpdate($id){
        $query = "UPDATE ".$this->table."
                  SET name = :name, password = :password
                  WHERE user_id = :id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'name' => $this->name,
            'password' => $this->password,
            'id' => $id
        ]);

        return $stmt;
    }

    public function userDelete($id){
        $query = "UPDATE ".$this->table."
                  SET deleted_at = NOW()
                  WHERE user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $id
        ]);

        return $stmt;
    }

    public function userLogin(){
        $query = "SELECT * FROM ".$this->table."
                  WHERE name = ? and password = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->name,
            $this->password
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
