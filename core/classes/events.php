<?php
class Events{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	
	public function addEvent($name, $type, $venue, $dsc, $date, $time)
	{
		$query = $this->db->prepare("INSERT INTO `events` (`name`,`type`,`description`,`venue`,`time`,`date`) VALUES(?, ?, ?, ?, ?, ?) ");
		$query->bindValue(1, $name);
		$query->bindValue(2, $type);
		$query->bindValue(3, $dsc);
		$query->bindValue(4, $venue);
		$query->bindValue(5, $time);
		$query->bindValue(6, $date);
		
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delEvent($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `events` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function listEvent()
	{
		$query= $this->db->prepare("SELECT * FROM `events`");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function timer()
	{
		$time= time();
		$query= $this->db->prepare("INSERT INTO timer (`username`, `time`) VALUES(?, ?)");
		$query->bindValue(1, "oluseg");
		$query->bindValue(2, $time);
	try
	{
		$query->execute();
	}
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
  }
  public function getTime()
	{
		$query= $this->db->prepare("SELECT * FROM timer WHERE `session_id`='session_id' ORDER BY `id` DESC");
		
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function EventById($id) {

		$query = $this->db->prepare("SELECT * FROM `events` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function updateEvent($name, $type, $venue, $dsc, $date, $time, $id){
	 
		$query 	= $this->db->prepare("UPDATE `events` SET `name` = ?, `type` = ?, `description`=?,`venue` = ?, `time` = ?, `date` = ? WHERE `id`=?");
	 
	$query->bindValue(1, $name);
		$query->bindValue(2, $type);
		$query->bindValue(3, $dsc);
		$query->bindValue(4, $venue);
		$query->bindValue(5, $time);
		$query->bindValue(6, $date);
		$query->bindValue(7, $id);
	
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
}
?>