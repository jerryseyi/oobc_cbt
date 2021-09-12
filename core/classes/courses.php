<?php
class Courses{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}
	public function listCourses()
	{
		$query= $this->db->prepare("SELECT * FROM `courses` ORDER BY id ASC");
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
	
	public function listCoursesById($id)
	{
		$query= $this->db->prepare("SELECT * FROM `courses` WHERE `id`= ?");
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
	public function listLectById($id)
	{
		$query= $this->db->prepare("SELECT * FROM `lectures` WHERE `id`= ?");
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
	public function listBooksById($id)
	{
		$query= $this->db->prepare("SELECT * FROM `library` WHERE `id`= ?");
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
	
	public function getLecturers()
	{
		$query= $this->db->prepare("SELECT *FROM users WHERE role= ?");
		$query->bindValue(1, "1");
		try
		{
			$query->execute();	
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function regCourses($title, $desc, $code, $lect)
	{
		$time = time();
		$query 	= $this->db->prepare("INSERT INTO `courses` (`course_title`, `course_description`, `course_code`, `lecturer_id`, `date_added`) VALUES (?, ?, ?, ?, ?) ");
	 
		$query->bindValue(1, $title);
		$query->bindValue(2, $desc);
		$query->bindValue(3, $code);
		$query->bindValue(4, $lect);
		$query->bindValue(5, $time);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function addQuestion($question, $user_id, $lecture_id)
	{
		$time = time();
		$query 	= $this->db->prepare("INSERT INTO `que` (`question`, `user_id`, `lecture_id`, `date_added`) VALUES (?, ?, ?, ?) ");
	 
		$query->bindValue(1, $question);
		$query->bindValue(2, $user_id);
		$query->bindValue(3, $lecture_id);
		$query->bindValue(4, $time);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function addFile($name, $desc, $code, $dir, $auth, $edition)
	{
		$time = time();
		$query 	= $this->db->prepare("INSERT INTO `library` (`name`, `description`, `course_id`, `directory`, `author`, `edition`, `date_created`) VALUES (?, ?, ?, ?, ?, ?, ?) ");
	 
		$query->bindValue(1, $name);
		$query->bindValue(2, $desc);
		$query->bindValue(3, $code);
		$query->bindValue(4, $dir);
		$query->bindValue(5, $auth);
		$query->bindValue(6, $edition);
		$query->bindValue(7, $time);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function showLectures()
	{
		$query= $this->db->prepare("SELECT * FROM `lectures` ORDER BY id ASC");
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
	public function showLib()
	{
		$query= $this->db->prepare("SELECT * FROM `library` ORDER BY id DESC");
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
	public function showQuestions()
	{
		$query= $this->db->prepare("SELECT * FROM `que` ORDER BY id DESC");
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
	
	public function sortLectures($id)
	{
		$query= $this->db->prepare("SELECT * FROM `lectures` WHERE `course_id`= ? ORDER BY id ASC");
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
	public function sortLib($id)
	{
		$query= $this->db->prepare("SELECT * FROM `library` WHERE `course_id`= ? ORDER BY id ASC");
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
	public function showLecturesById($id)
	{
		$query= $this->db->prepare("SELECT * FROM `lectures` WHERE `id`= ?");
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
	public function showedQuestions($id)
	{
		$query= $this->db->prepare("SELECT * FROM `que` WHERE `user_id`= ?");
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
	public function delLectures($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `lectures` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delCourse($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `courses` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delLib($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `library` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function delQue($id, $loc)
	{
		$query = $this->db->prepare("DELETE FROM `que` WHERE `id`= ?");
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
			header('Location:'.$loc);
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public function courseById($id) {

		$query = $this->db->prepare("SELECT * FROM `courses` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function bookById($id) {

		$query = $this->db->prepare("SELECT * FROM `library` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function queById($id) {

		$query = $this->db->prepare("SELECT * FROM `que` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function lecturesById($id) {

		$query = $this->db->prepare("SELECT * FROM `lectures` WHERE `id`= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}
	public function updateCourse($title, $desc, $code, $lect, $id){
	 
		$query 	= $this->db->prepare("UPDATE `courses` SET `course_title` = ?, `course_description`=?,`course_code` = ?, `lecturer_id` = ? WHERE `id`=?");
	 
		$query->bindValue(1, $title);
		$query->bindValue(2, $desc);
		$query->bindValue(3, $code);
		$query->bindValue(4, $lect);
		$query->bindValue(5, $id);
	
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function updateLib($name, $desc, $code, $author, $edition, $id){
	 
		$query 	= $this->db->prepare("UPDATE `library` SET `name` = ?, `description`=?,`author` = ?, `edition` = ?, `course_id` = ? WHERE `id`=?");
	 
		$query->bindValue(1, $name);
		$query->bindValue(2, $desc);
		$query->bindValue(3, $author);
		$query->bindValue(4, $edition);
		$query->bindValue(5, $code);
		$query->bindValue(6, $id);
	
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	public function updateQue($ans, $id){
	 
		$query 	= $this->db->prepare("UPDATE `que` SET `answer` = ?, `status` = ? WHERE `id`=?");
	 
		$query->bindValue(1, $ans);
		$query->bindValue(2, 1);
		$query->bindValue(3, $id);	
	 
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
}
	
?>
	 