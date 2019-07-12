<?php

class Header {
    private $id;
    private $titile;
    private $subtitle;
    private $type;
    private $category;
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
     * Get the value of titile
     */ 
    public function getTitile()
    {
        return $this->titile;
    }

    /**
     * Set the value of titile
     *
     * @return  self
     */ 
    public function setTitile($titile)
    {
        $this->titile = $this->db->real_escape_string($titile);

        return $this;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $this->db->real_escape_string($subtitle);

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $this->db->real_escape_string($type);

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $this->db->real_escape_string($category);

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO header VALUES(NULL,
                                         '{$this->title}',
                                         '{$this->subtitle}', 
                                         '{$this->type}',
                                         '{$this->category}')";
        return $this->db->query($sql);
    }
}