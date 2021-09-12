<?php 
class General{

	public function logged_in() {
		return(isset($_SESSION['id'])) ? true : false;
	}

	public function logged_in_protect() {
		if ($this->logged_in() === true) {
			header('Location: dashboard.php');
			exit();		
		}
	}
	 
	public function logged_out_protect() {
		if ($this->logged_in() === false) {
			$mode = ($_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://');
			$mode.= $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
			header('Location: index.php?returnurl='. urlencode($mode));
			exit();
		}	
	}
	public function truncate($str, $len){
		$tail = max(0, $len-10);
		$trunk = substr($str, 0, $tail);
		$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '\\1...', strrev(substr($str, $tail, $len-$tail))));
		return $trunk;
		}
	public function strim($str, $len){
		$tail = max(0, $len-10);
		$trunk = substr($str, 0, $tail);
		$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '\\1', strrev(substr($str, $tail, $len-$tail))));
		return $trunk;
		}
		
	public function hashed($pass)
	{
		$hasf="fg"; 
		$hasf.= $this->strim(md5($pass), 10);
		$hasf.= $this->strim(md5($pass), 10);
		$hasf.= $this->strim(sha1($pass), 10);
		$hasf.= $this->strim(md5("pressget"), 10);
		return $hasf;
	}
	public function imageUpload()
	{
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/myexam/admin/uploads/';
		$sFileName= $_FILES['file']['name'];
		$ext= substr($sFileName, strrpos($sFileName, '.') + 1);
		$permName= md5(sha1($sFileName.time())).'.'.$ext;
		$uploadfile = $uploaddir . $permName;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			return $permName;
		} else {
			echo "Possible file upload attack!\n";
		}
		
		echo 'Here is some more debugging info:';
	}
}