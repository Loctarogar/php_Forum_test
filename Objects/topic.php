<?php

Class Topic
{
    protected $db;
    protected $table = "topic";
    protected $name;
    protected $body;
    protected $user;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function topicCreate(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?, ?, ?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->user,
            $this->name,
            $this->body
        ]);

        return $stmt;
    }

    public function topicRead($id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE topic_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

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
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}