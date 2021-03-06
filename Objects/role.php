<?php

class Role
{
    protected $name;
    protected $db;
    protected $table = "roles";
    protected $tableUserRole = "user_role";

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

    public function readRole($role_id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE role_id = ?  
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$role_id]);
        $stmt = $stmt->fetch();

        return $stmt;
    }

    public function roleUsersRole($user_id){
        $query = "SELECT * FROM user_role
                  WHERE user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);
        $role = $stmt->fetch();
        if(!empty($role)){
            return true;
        }else{
            return false;
        }
    }

    public function roleForUserUpdate($user_id, $role_id){
        $roleIsExists = $this->roleUsersRole($user_id);
        if($roleIsExists === true){
            $query = "UPDATE ".$this->tableUserRole."
                      SET role_id = :roleId
                      WHERE user_id = :userId
            ";
        }else{
            $query = "INSERT INTO user_role
                      VALUES (:userId, :roleId)
            ";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'userId' => $user_id,
            'roleId' => $role_id
        ]);
        $stmt = $stmt->rowCount();
        if($stmt > 0){
            $stmt = true;
        }else{
            $stmt = false;
        }

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