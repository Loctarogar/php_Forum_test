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
                  VALUES (0, ?, ?, ?, null)
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

    public function topicUpdate($id){
        $query = "UPDATE ".$this->table."
                  SET name = :topicName, body = :topicBody
                  WHERE topic_id = :topicId
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'topicName' => $this->name,
            'topicBody' => $this->body,
            'topicId'   => $id
        ]);

        return $stmt;
    }

    public function topicDelete($id){
        $query = "UPDATE ".$this->table."
                  SET deleted_at = NOW()
                  WHERE topic_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $id
        ]);

        return $stmt;
    }

    public function topicShowAll(){
        $query = "SELECT * FROM ".$this->table."
                  WHERE deleted_at IS NULL
        ";
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