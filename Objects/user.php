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

    public function userLogout($userId){
        $query = "UPDATE ".$this->table."
                  SET last_access = NOW()
                  WHERE user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        return $stmt;
    }

    public function userShowAll(){
        $query = "SELECT * FROM ".$this->table."
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function userHasRole($userId){
        $query = "SELECT * FROM user_role
                  WHERE user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
        $stmt = $stmt->fetch();

        return $stmt['role_id'];
    }

    public function userHasPermission($userId, $permission){
        $role = $this->userHasRole($userId);
        $query = "SELECT * FROM role_perm
                  WHERE role_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$role]);
        $stmt = $stmt->fetchAll();
        foreach ($stmt as $perm){
            if($perm['perm_id'] === $permission || $perm['perm_id'] === 16) {
                return true;
            }
        }

        return false;
    }

    public function userAllPermissions($userId){
        $role = $this->userHasRole($userId);
        $query = "SELECT permissions.perm_name
                  FROM permissions
                  LEFT JOIN role_perm
                  ON permissions.perm_id = role_perm.perm_id
                  WHERE role_perm.role_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$role]);
        $permissions = $stmt->fetchAll();

        return $permissions;
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
