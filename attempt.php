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

mysqli_select_db($local, $database_local);
//mysql_select_db($database_local, $local);
$query_exam = sprintf("SELECT * FROM exam WHERE exam_id = %s", GetSQLValueString($colname_exam, "int"));
//$exam = mysqli_query($query_exam) or die(mysql_error());
$exam = $local->query($query_exam);
$row_exam = mysqli_fetch_assoc($exam);
$totalRows_exam = mysqli_num_rows($exam);
//var_dump($totalRows_exam);
$colname_question = "-1";
//$num= $row_exam['number_of_question']+1;
$num= $row_exam['number_of_question'];
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

<div class="details">
    <div class="recentOrders" style="display: flex; justify-content: center;">
        <div class="cardHeaderExt">
            <h2 style="font-size: 16px;">Instruction: Please attempt all questions</h2>
        </div>

        <div class="add-form" style="padding-top: 0; margin-top: 15px; max-width: 1200px; width: 100%;">
            <h2 style=""><?php echo $row_exam['exam_name']; ?></h2>
            <h4 style="margin-bottom: 60px; font-weight: lighter"><?php echo $row_exam['exam_desc']; ?></h4>
            <form name="cd">
                <div style="position:absolute; right: 5px; top: 10px;" class="time">
                    <span class="labe">Remaning Time: </span>
                    <input type="text" name="disp" class="clock" id="txt" value="<?php echo $row_exam['time_allowed']; ?>" readonly>
                </div>
            </form>

            <form id="examForm" style="padding-left: 0;" action="result.php?<?php echo $general->hashed('id'); ?>=<?php echo $_GET['exam_id']; ?>" method="post">

                <?php $j=1; $i=0; ?>
                <?php while($row = mysqli_fetch_array($question)):  ?>
                    <?php $que_no[] = $row['que_id']; ?>
                    <div class="apps-list radiogroup" style="justify-content: flex-start; top: 0;
                     max-width: 1200px; padding-left: 25px; height: fit-content; margin-bottom: 10px;">
                        <div class="apps-group">
                            <div class="apps-text">
                                <h3 style="font-style: inherit; font-weight: initial; font-size: 15px;">
                                    <span style="display: flex; align-items: baseline;"><span><?= $j . '.' ?></span><?= $row['question']?></span></h3>

                                <div class="wrapper">
                                    <input class="state" type="radio" name="<?= 'q'. $i ?>" id="<?= 'A'. $i ?>" value="A">
                                    <label class="label" for="<?= 'A'. $i ?>">
                                        <div class="indicator"></div>
                                        <span class="text">a) <?= $row['opt_A']?></span>
                                    </label>
                                </div>
                                <div class="wrapper">
                                    <input class="state" type="radio" name="<?= 'q'. $i ?>" id="<?= 'B'. $i ?>" value="B">
                                    <label class="label" for="<?= 'B'. $i ?>">
                                        <div class="indicator"></div>
                                        <span class="text">b) <?= $row['opt_B']?></span>
                                    </label>
                                </div>
                                <div class="wrapper">
                                    <input class="state" type="radio" name="<?= 'q'. $i ?>" id="<?= 'C'. $i ?>" value="C">
                                    <label class="label" for="<?= 'C'. $i ?>">
                                        <div class="indicator"></div>
                                        <span class="text">c) <?= $row['opt_C']?></span>
                                    </label>
                                </div>
                                <div class="wrapper">
                                    <input class="state" type="radio" name="<?= 'q'. $i ?>" id="<?= 'D'. $i ?>" value="D">
                                    <label class="label" for="<?= 'D'. $i ?>">
                                        <div class="indicator"></div>
                                        <span class="text">d) <?= $row['opt_D']?></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $j= $j+1; $i= $i+1; ?>
                    <?php endwhile; ?>
                    <?php $_SESSION['que_no']= $que_no; ?>

                    <?php
                    for($i=0; $i<$num-1; $i++) {
                        $fetch = $cbt->fetchResult($que_no[$i]);
                        $_SESSION[$i . 'ans'] = $fetch['ans'];
                    }
                    ?>
                <div class="input-group">
                    <input name="cmdSubmit" type="submit" id="cmdSubmit"  class="btn-info" value="Submit"/>
                </div>
            </form>
                </div>
			</div>
		</div>

<script>
    function toggleMenu() {
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        toggle.classList.toggle('active');
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    function toggleDropdown() {
        let dropdown = document.querySelector('.dropdown');
        dropdown.classList.toggle('active');
    }

</script>

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

<script src="node_modules/jquery/dist/jquery.js"></script>
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
