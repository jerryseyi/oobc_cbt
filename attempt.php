<?php 
require_once('Connections/local.php');
require_once('function.php');
//require('core/init.php');
?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_exam = "-1";
if (isset($_GET['exam_id'])) {
  $colname_exam = $_GET['exam_id'];
}

mysqli_select_db($database_local);
//mysql_select_db($database_local, $local);
$query_exam = sprintf("SELECT * FROM exam WHERE exam_id = %s", GetSQLValueString($colname_exam, "int"));
//$exam = mysqli_query($query_exam) or die(mysql_error());
$exam = $local->query($query_exam);
//$exam = $db->prepare($query_exam);
$row_exam = mysqli_fetch_assoc($exam);
//$row_exam = $exam->fetchAll();
//var_dump($row_exam);
//$totalRows_exam = mysql_num_rows($exam);
$totalRows_exam = mysqli_num_rows($exam);
//var_dump($totalRows_exam);
$colname_question = "-1";
$num= $row_exam['number_of_question']+1;
if (isset($_GET['exam_id'])) {
  $colname_question = $_GET['exam_id'];
}
//mysql_select_db($database_local, $local);
$query_question = sprintf("SELECT * FROM question WHERE exam_id = %s", GetSQLValueString($colname_question, "int")." ORDER BY rand()  LIMIT 0, $num");
//$question = mysql_query($query_question, $local) or die(mysql_error());
$question = $local->query($query_question);
//$totalRows_question = mysql_num_rows($question);
$totalRows_question = mysqli_num_rows($question);
?>
<!--$row_question = mysql_fet-->
<?php
	require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	
?>
<?php
$title = "Exam";
require_once("header.php");
?>   
	<div class="container-fluid">
	<div class="row-fluid">
		<?php require_once("sidebar.php") ?>
		<div class="span9" id="content">
			 <div class="row-fluid">
				<!-- block -->
				<div id="block_bg" class="block">
		
					<div class="block-content collapse in">
						<div class="span12">
							<!-- block -->
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Instruction: Please attempt all questions</div>
							</div>
							<div id='calendar'>
								<table align="center" cellpadding="0" bgcolor="#FFFFFF" width="800" border="0">              
									<tr><td>
										<center><h2><u><?php echo $row_exam['exam_name']; ?></u></h2></center>
										<center><h6><u><?php echo $row_exam['exam_desc']; ?></u></h6></center>
									</td></tr>
									<tr align="right"><td>
										<form name="cd">
											<div class="time">
											  <span class="labe"><em>Remaining Time: </em></span>
											  <input name="disp" type="text" class="clock" id="txt" value="<?php echo $row_exam['time_allowed']; ?>" readonly />
											  <span>Minutes</span>
										  </div>
										</form>
									</td></tr>
									<tr><td>
									<form id="examForm" action="result.php?<?php echo $general->hashed('id'); ?>=<?php echo $_GET['exam_id']; ?>" method="post">
									<?php
										$j=1; $i=0;
										while($row = mysqli_fetch_array($question)){
											$que_no[] = $row['que_id'];
											echo '<p><span>'.$j.' </span>'."<font color=blue>". $row['question']."</font>".'<br>'.
											'<span>(a) </span><input type="radio" name="q'.$i.'" value="A" > '.$row['opt_A'].'<br>
											<span>(b) </span><input type="radio" name="q'.$i.'" value="B" > '.$row['opt_B'].'<br>
											<span>(c) </span><input type="radio" name="q'.$i.'" value="C" > '.$row['opt_C'].'<br>
											<span>(d) </span><input type="radio" name="q'.$i.'" value="D" > '.$row['opt_D'].'</p>';
																$j= $j+1;
																$i= $i+1;
										}
										$_SESSION['que_no']= $que_no;
										for($i=0; $i<$num-1; $i++){
											$fetch= $cbt->fetchResult($que_no[$i]);
											$_SESSION[$i.'ans']= $fetch['ans'];
										}
									?>
									<input name="cmdSubmit" type="submit" id="cmdSubmit"  class="btn-info" value="Submit"/>
									</form>
									</td></tr>
								</table>
							</div>		
							<!-- /block -->
						</div>
					</div>
                </div>
			</div>
		</div>
	</div><!-- /End of row-fluid -->
	</div>
	<footer style='text-align:center'>			
		<p>&copy; <?php echo date('Y'); ?> Powered by OOBC<sup>&reg;</sup></p>
	</footer>

<script>
	var mins;
	var secs;

	function cd() {
		mins = 1 * m("<?php echo $row_exam['time_allowed']; ?>"); // change minutes here
		secs = 0 + s(":01"); 
		redo();
	}

	function m(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(0, i));
	}

	function s(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(i + 1, obj.length));
	}

	function dis(mins,secs) {
		var disp;
		if(mins <= 9) {
			disp = " 0";
		} else {
			disp = " ";
		}
		disp += mins + " .";
		if(secs <= 9) {
			disp += "0" + secs;
		} else {
			disp += secs;
		}
		return(disp);
	}

	function redo() {
		secs--;
		if(secs == -1) {
			secs = 59;
			mins--;
		}
		document.cd.disp.value = dis(mins,secs); // setup additional displays here.
		if((mins == 0) && (secs == 0)) {
			window.alert(" Hey! Time is up. Press OK to continue..."); 
			 //submit the exam
			 document.getElementById("examForm").submit();
		} else {
			cd = setTimeout("redo()",1000);
			if( mins < 3 ) alertUser();
		}
	}
	function alertUser(){
			if(document.getElementsByClassName("labe")[0].style.color == "red") return;
			document.getElementsByClassName("labe")[0].style.color = "red";
	}
	function init() {
	  cd();
	}
	window.onload = init;
</script>

	<script src="admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
	<script src="admin/assets/scripts.js"></script>
	<script>
		$(function() {
			// Easy pie charts
			$('.chart').easyPieChart({animate: 1000});
		});
				</script>
	
	<!-- data table -->
	<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/DT_bootstrap.js"></script>		
		<!-- jgrowl -->
	<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
	<script>
		$(function() {
			var time = $(".time");
			var top = time.offset().top;
			
			$(window).scroll(function(e){
				var y = $(this).scrollTop();
				if( y >= top){
					time.addClass("sticky");
				}else{
					time.removeClass("sticky");
				}
			})
			
			$("#examForm").on('submit',function(){
				var done = $("input[type=radio]:checked").length,
				no_q = <?php echo $j ?>;
				no_q = no_q-1;
				if(done < no_q){
					var undone = no_q - done;
					return confirm("You clicked on the submit button but you haven't complete your Exam \nYou answered " + done + " question(s) out of " + no_q + " question(s)\nYou still have " + undone + " question(s) unanswered! \n\nAre you sure you want to proceed and submit??");
				}
			})
		});
	</script>
			
    </body>
</html>
<?php
mysqli_free_result($exam);

mysqli_free_result($question);
?>
