<?php

class HeaderHasUser {
    private $header_id;
    private $user_id;

    

    /**
     * Get the value of header_id
     */ 
    public function getHeader_id()
    {
        return $this->header_id;
    }

    /**
     * Set the value of header_id
     *
     * @return  self
     */ 
    public function setHeader_id($header_id)
    {
        $this->header_id = $header_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO header_has_user VALUES('{$this->header_id}',
                                                   '{$this->user_id}')";
        return $this->db->query($sql);
    }
}