<?php
class Posts
{
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}
	
	public function insert_post($id, $content, $title, $author)
	{
		$time= time();
	$query= $this->db->prepare("INSERT INTO `lectures` (`course_id`, `content`, `topic`, `author`, `date_created`) VALUES (?, ?, ?, ?, ?)");
	$query->bindValue(1, $id);
	$query->bindValue(2, $content);
	$query->bindValue(3, $title);
	$query->bindValue(4, $author);
	$query->bindValue(5, $time);
	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}		
	public function update_post($cos, $content, $title, $id){
	 
		$query 	= $this->db->prepare("UPDATE `lectures` SET `course_id` = ?, `content` = ?, `topic` = ? WHERE `id`=?");
	 
	$query->bindValue(1, $cos);
	$query->bindValue(2, $content);
	$query->bindValue(3, $title);
	$query->bindValue(4, $id);
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function showMyQuestions($id) {

		$query = $this->db->prepare("SELECT * FROM `que` WHERE `lecture_id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

		} catch(PDOException $e){

			die($e->getMessage());
		}
		return $query->fetchAll();

	}
}

?>