<?php 

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $slogan;
    private $description;
    private $image;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);

        return $this;
    }

    /**
     * Get the value of slogan
     */ 
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set the value of slogan
     *
     * @return  self
     */ 
    public function setSlogan($slogan)
    {
        $this->slogan = $this->db->real_escape_string($slogan);

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
        $this->image = $image;

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO user VALUES(NULL,
                                       '{$this->name}',
                                       '{$this->email}', 
                                       '{$this->password}',
                                       '{$this->slogan}',
                                       '{$this->description}',
                                       '{$this->image}')";
        return $this->db->query($sql);
    }


    public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
    }
    
    public function getAll(){
		$users = $this->db->query("SELECT id, name, slogan, description, image FROM user ORDER BY id DESC");
		return $users;
    }
    
    public function edit(){
		$sql = "UPDATE user SET name        = '{$this->name}',
                                email       = '{$this->email}', 
                                password    = '{$this->password}',
                                slogan      = '{$this->slogan}',
                                description = '{$this->description}',
                                image       = '{$this->image}'
                                WHERE id    =  {$this->id};";		
		
		return $this->db->query($sql);

	}
	
	public function delete(){
		$sql = "DELETE FROM user WHERE id = {$this->id}";
		return $this->db->query($sql);
    }
    
}