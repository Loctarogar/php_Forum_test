<?php

class Comment
{
    protected $db;
    protected $table = "comments";
    protected $topic;
    protected $body;
    protected $userId;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function commentCreate(){
        $query = "INSERT INTO ".$this->table."
                  VALUES (0, ?, ?, NULL, ?)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->topic,
            $this->body,
            $this->userId
        ]);

        return $stmt;
    }

    public function commentRead($comment_id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE comment_id = ? and deleted_at IS NULL
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$comment_id]);

        return $stmt;
    }

    public function commentUpdate($comment_id){
        $query = "UPDATE ".$this->table."
                  SET body = ?
                  WHERE comment_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->body,
            $comment_id
        ]);

        return $stmt;
    }

    public function commentDelete($comment_id){
        $query = "UPDATE ".$this->table."
                  SET deleted_at = NOW()
                  WHERE comment_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$comment_id]);

        return $stmt;

    }

    public function commentShowALl(){
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function commentAllForUser($id){
        $query = "SELECT * FROM ".$this->table."
                  WHERE user_id = ? 
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
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
    public function getUserId()
    {
        return $this->userId;
    }
}