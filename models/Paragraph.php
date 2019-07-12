<?php

class Paragraph{
    private $id;
    private $text;
    private $subtitle;
    private $video;
    private $description_video;
    private $image;
    private $description_image;
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
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $this->db->real_escape_string($text);

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
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $this->db->real_escape_string($video);

        return $this;
    }

    /**
     * Get the value of description_video
     */ 
    public function getDescription_video()
    {
        return $this->description_video;
    }

    /**
     * Set the value of description_video
     *
     * @return  self
     */ 
    public function setDescription_video($description_video)
    {
        $this->description_video = $this->db->real_escape_string($description_video);

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $this->db->real_escape_string($image);

        return $this;
    }

    /**
     * Get the value of description_image
     */ 
    public function getDescription_image()
    {
        return $this->description_image;
    }

    /**
     * Set the value of description_image
     *
     * @return  self
     */ 
    public function setDescription_image($description_image)
    {
        $this->description_image = $this->db->real_escape_string($description_image);

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
        $sql = "INSERT INTO paragraph VALUES(NULL,
                                         '{$this->text}',
                                         '{$this->subtitle}', 
                                         '{$this->video}',
                                         '{$this->description_video}',
                                         '{$this->image}',
                                         '{$this->description_image}',
                                         '{$this->header_id}')";
        return $this->db->query($sql);
    }
}