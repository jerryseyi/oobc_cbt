<?php
class Cbt
{
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}
	
	public function insert_question($cos, $question, $ans, $opt1, $opt2, $opt3, $opt4)
	{
		$time= time();
	$query= $this->db->prepare("INSERT INTO `questions` (`course_id`, `question`, `ans`, `option_one`, `option_two`, `option_three`, `option_four`, `date_added`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$query->bindValue(1, $cos);
	$query->bindValue(2, $question);
	$query->bindValue(3, $ans);
	$query->bindValue(4, $opt1);
	$query->bindValue(5, $opt2);
	$query->bindValue(6, $opt3);
	$query->bindValue(7, $opt4);
	$query->bindValue(8, $time);
	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function showQuestion($course_id)
	{
		$query= $this->db->prepare("SELECT * FROM `questions` WHERE `course_id`= ?");
		$query->bindValue(1, $course_id);
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
	public function fetchMyResult($id,$semester)
	{
		$query= $this->db->prepare("SELECT * FROM `result` WHERE `user_id`= ? AND semester = ?");
		$query->bindValue(1, $id);
		$query->bindValue(2, $semester);
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
	public function examByIds($id)
	{
		$query= $this->db->prepare("SELECT * FROM `exam` WHERE `exam_id`= ?");
		$query->bindValue(1, $id);
		try
		{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getAllSession()
	{
		$query= $this->db->prepare("SELECT * FROM session");
		try
		{
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getSession($id)
	{
		$query= $this->db->prepare("SELECT * FROM `session` WHERE `session_id`= ?");
		$query->bindValue(1, $id);
		try
		{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getCurrentSession(){
		$query= $this->db->prepare("SELECT * FROM `session` WHERE active = 1");
		try
		{
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function setCurrentSession($id){
		$query= $this->db->prepare("UPDATE session SET active = 0 WHERE active = 1");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
		$query2= $this->db->prepare("UPDATE session SET active = 1 WHERE session_id = ?");
		$query2->bindValue(1, $id);
		try
		{
			$query2->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getAllSemester()
	{
		$query= $this->db->prepare("SELECT * FROM semester");
		try
		{
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getSemester($id)
	{
		$query= $this->db->prepare("SELECT * FROM `semester` WHERE `semester_id`= ?");
		$query->bindValue(1, $id);
		try
		{
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function getCurrentSemester(){
		$query= $this->db->prepare("SELECT * FROM `semester` WHERE active = 1");
		try
		{
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function setCurrentSemester($id){
		$query= $this->db->prepare("UPDATE semester SET active = 0 WHERE active = 1");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		
		$query2= $this->db->prepare("UPDATE semester SET active = 1 WHERE semester_id = ?");
		$query2->bindValue(1, $id);
		try
		{
			$query2->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function countQue($id)
	{
		$query= $this->db->prepare("SELECT * FROM `question` WHERE `exam_id`= ?");
		$query->bindValue(1, $id);
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
	public function fetchDone($user_id, $exam_id)
	{
		$query= $this->db->prepare("SELECT * FROM `user_attempt` WHERE `usr_id`= ? AND `exam_id`=?");
		$query->bindValue(1, $user_id);
		$query->bindValue(2, $exam_id);
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
	public function fetchResult($id)
	{
		$query= $this->db->prepare("SELECT * FROM `question` WHERE `que_id`= ?");
		$query->bindValue(1, $id);
		try
		{
			$query->execute();
			
		return $query->fetch();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function listQuestions()
	{
		$query= $this->db->prepare("SELECT * FROM `questions`");
		try 
		{
			$query->execute();
		}
		catch(PDOException $e )
		{
			die($e->getMessage());	
		}
		return $query->fetchAll();
	}
	public function listTests()
	{
		$query= $this->db->prepare("SELECT * FROM `exams`");
		try 
		{
			$query->execute();
		}
		catch(PDOException $e )
		{
			die($e->getMessage());	
		}
		return $query->fetchAll();
	}
	public function delQuestion($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `questions` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delExam($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `exams` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function questionById($id) {

		$query = $this->db->prepare("SELECT * FROM `questions` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function addScore($user_id, $exam, $sco)
	{
		$time= time();
		$query= $this->db->prepare("INSERT INTO `result`(`user_id`, `exam_id`, `score`, date_attempted) VALUES(?,?,?,?)");
		$query->bindValue(1, $user_id);
		$query->bindValue(2, $exam);
		$query->bindValue(3, $sco);
		$query->bindValue(4, $time);
		try
		{
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function insAtt($user_id, $exam)
	{
		$time= time();
		$query= $this->db->prepare("INSERT INTO `user_attempt`(`usr_id`, `exam_id`, `is_attempted`, date_done) VALUES(?,?,?,?)");
		$query->bindValue(1, $user_id);
		$query->bindValue(2, $exam);
		$query->bindValue(3, 1);
		$query->bindValue(4, $time);
		try
		{
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function examById($id) {

		$query = $this->db->prepare("SELECT * FROM `exam` WHERE `exam_id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function update_question($cos, $question, $ans, $opt1, $opt2, $opt3, $opt4, $id){
	 
		$query 	= $this->db->prepare("UPDATE `questions` SET `course_id` = ?, `question` = ?, `ans` = ?,`option_one` = ?, `option_two` = ?, `option_three` = ?, `option_four` = ? WHERE `id`=?");
	 
	$query->bindValue(1, $cos);
	$query->bindValue(2, $question);
	$query->bindValue(3, $ans);
	$query->bindValue(4, $opt1);
	$query->bindValue(5, $opt2);
	$query->bindValue(6, $opt3);
	$query->bindValue(7, $opt4);
	$query->bindValue(8, $id);
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function updateExam($name, $instructions, $time_allowec, $course_code, $id){
	 
		$query 	= $this->db->prepare("UPDATE `exams` SET `name` = ?, `question_no` = ?, `time_allowed` = ?,`course_id` = ? WHERE `id`=?");
	 
	$query->bindValue(1, $name);
		$query->bindValue(2, $instructions);
		$query->bindValue(3, $time_allowec);
		$query->bindValue(4, $course_code);
		$query->bindValue(5, $id);
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function addExam($name, $instructions, $time_allowec, $course_code)
	{
			$time= time();
		$query= $this->db->prepare("INSERT INTO `exams` (`name`, `status`, `question_no`, `time_allowed`, `course_id`, 			`date_added`) VALUES (?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $name);
		$query->bindValue(2, 0);
		$query->bindValue(3, $instructions);
		$query->bindValue(4, $time_allowec);
		$query->bindValue(5, $course_code);
		$query->bindValue(6, $time);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
}

?>