<?php 
class Users{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	 

	public function user_exists($username) {
	
		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ?");
		$query->bindValue(1, $username);
	
		try{

			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}

	}
	 
	public function email_exists($email) {

		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`= ?");
		$query->bindValue(1, $email);
	
		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}

	}

	public function register($fullname, $username, $password, $photo, $session){
		
		$time 		= time();
		$password   = ($password);
	 
		$query 	= $this->db->prepare("INSERT INTO `users` (`Fullname`, `username`, `password`, `photo`, `date_added`, `session_id`) VALUES (?, ?, ?, ?, ?,?) ");
	 
		$query->bindValue(1, $fullname);
		$query->bindValue(2, $username);
		$query->bindValue(3, $password);
		$query->bindValue(4, $photo);
		$query->bindValue(5, $time);
		$query->bindValue(6, $session);
	 
		try{
			$query->execute();
	 
			// mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function update($firstname, $lastname, $email, $level, $dept, $gender, $username, $id, $role){
	 
		$query 	= $this->db->prepare("UPDATE `users` SET `firstname` = ?, `lastname` = ?,`email` = ?, `level` = ?, `department` = ?, `gender` = ?,`username` = ?, `role`= ? WHERE `id`=?");
	 
		$query->bindValue(1, $firstname);
		$query->bindValue(2, $lastname);
		$query->bindValue(3, $email);
		$query->bindValue(4, $level);
		$query->bindValue(5, $dept);
		$query->bindValue(6, $gender);
		$query->bindValue(7, $username);
		$query->bindValue(8, $role);
		$query->bindValue(9, $id);
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	
	public function changePass($user_id, $password){
		$query 	= $this->db->prepare("UPDATE users SET password = ? WHERE `id`=?");
	 
		$query->bindValue(1, $password);
		$query->bindValue(2, $user_id);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	
	public function changeAvater($user_id, $avaterUrl){
		$query 	= $this->db->prepare("UPDATE users SET photo = ? WHERE `id`=?");
	 
		$query->bindValue(1, $avaterUrl);
		$query->bindValue(2, $user_id);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	

	public function activate($email, $email_code) {
		
		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");

		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);

		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				
				$query_2 = $this->db->prepare("UPDATE `users` SET `confirmed` = ? WHERE `email` = ?");

				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				

				$query_2->execute();
				return true;

			}else{
				return false;
			}

		} catch(PDOException $e){
			die($e->getMessage());
		}

	}


	public function email_confirmed($email) {

		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ? AND `confirmed` = ?");
		$query->bindValue(1, $email);
		$query->bindValue(2, 1);
		
		try{
			
			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function login($email, $password) {

		$query = $this->db->prepare("SELECT `password`, `id` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $email);
		
		try{
			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password'];
			$id   				= $data['id'];
			
			if($stored_password === ($password)){
				return $id;	
			}else{
				return false;	
			}

		}catch(PDOException $e){
			die($e->getMessage());
		}
	
	}

	public function userdata($id) {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	  	  	 
	public function get_users() {

		$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `time` DESC");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}
	public function isAdmin($id)
	{
		$query = $this->db->prepare("SELECT role FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			$data= $query->fetchColumn();
			
			if($data=="1")
			{
				return true;
			}else
			{
				return false;
			}
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delUser($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function suspend($id)
	{
		$query = $this->db->prepare("UPDATE `users` SET `status` = ? WHERE `id` = ?");
		$query->bindValue(1, 1);
		$query->bindValue(2, $id);				
		try
		{
			$query->execute();
				header('Location:users.php');
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function unSuspend($id)
	{
		$query = $this->db->prepare("UPDATE `users` SET `status` = ? WHERE `id` = ?");
		$query->bindValue(1, 0);
		$query->bindValue(2, $id);				
		try
		{
			$query->execute();
				header('Location:users.php');
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	
	public function makeAdmin($role, $id)
	{
		$query = $this->db->prepare("UPDATE users SET role = ? WHERE id = ?");
		$query->bindValue(1, $role);
		$query->bindValue(2, $id);				
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function isSuspended($username)
	{
		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username` = ? AND `status` = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, "1");				
		try
		{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}	
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function showStudents() {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `role`= ? ORDER BY `time` DESC");
		$query->bindValue(1, 0);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}
	
	public function showStaffs() {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `role`!= ? ORDER BY `time` DESC");
		$query->bindValue(1, 0);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}
public function validate($id)
{
	$query = $this->db->prepare("UPDATE `users` SET `confirmed` = ? WHERE `id` = ?");

				$query->bindValue(1, 1);
				$query->bindValue(2, $id);				

				$query->execute();
}

}