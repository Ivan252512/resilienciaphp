<?php

class Glossary {
    private $id;
    private $word;
    private $description;
    private $header_id;
    private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of word
     */ 
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Set the value of word
     *
     * @return  self
     */ 
    public function setWord($word)
    {
        $this->word = $this->db->real_escape_string($word);

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);

        return $this;
    }

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

    public function save()
    {
        $sql = "INSERT INTO glossary VALUES(NULL,
                                           '{$this->word}',
                                           '{$this->description}', 
                                           '{$this->header_id}')";
        return $this->db->query($sql);
    }
}