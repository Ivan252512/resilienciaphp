<?php

require_once 'models/User.php';

class UserController
{

	public function register()
	{
		require_once 'views/user/register.php';
	}


	public function save()
	{
		if (isset($_POST)) {
			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$slogan = isset($_POST['slogan']) ? $_POST['slogan'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;

			if ($name && $email && $password && $slogan && $description) {
				$user = new User();
				$user->setName($name);
				$user->setEmail($email);
				$user->setPassword($password);
				$user->setSlogan($slogan);
				$user->setDescription($description);

				// Guardar la imagen
				if (isset($_FILES['image'])) {
					$file = $_FILES['image'];
					$filename = $file['name'];
					$mimetype = $file['type'];


					if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

						if (!is_dir('uploads/images/users')) {
							mkdir('uploads/images/users', 0777, true);
						}

						$user->setImage($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/users' . $filename);
					}
				}

				$save = $user->save();
				if ($save) {
					$_SESSION['register'] = "complete";
				} else {
					$_SESSION['register'] = "failed";
				}
			} else {
				$_SESSION['register'] = "failed";
			}
		} else {
			$_SESSION['register'] = "failed";
		}
		header("Location:" . base_url . 'User/register');
	}

	public function login()
	{
		if (isset($_POST)) {
			// Identificar al usuario
			// Consulta a la base de datos
			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);

			$identity = $user->login();

			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
			} else {
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		}
		header("Location:" . base_url);
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:" . base_url);
	}

    public function eliminar(){
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$user = new User();
			$user->setId($id);
			
			$delete = $user->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
        header('Location:'.base_url);
    }
}
