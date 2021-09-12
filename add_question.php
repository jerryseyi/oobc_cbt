<!Doctype html>
<html>
<head>
<meta charset="UTF-8" />
<style>
body{
	padding:0px;
	margin:0px;
	width:70%;
	margin:50px auto;
}
.question-box{
	padding:20px;
	margin:30px auto;
	background:#eee;
	-moz-border-radius:5px;
	border-radius:5px;
}
.question-box input[type=text]{
	width:50%;
	padding:3px;
	color:blue;
	-moz-border-radius:3px;
	border-radius:3px;
	border:1px solid #eee;
}
.sel-course{
	text-align:center;
}
</style>
</head>
<body>
<?php
	if(isset($_POST["save"])){
		var_dump($_POST);
	}

?>
<form method="POST" action="">
	<div class='sel-course'>
		Course <select name="course">
			<option value="1">English</option>
			<option value="2">Maths</option>
			<option value="3">Physics</option>
			<option value="4">Chemistry</option>
		</select>
	</div>
	<section class='question-box'>
		<p><textarea name="ques[]" placeholder="Enter the question here...."></textarea></p>
		<p>A <input type="text" name="ques[opt][]" /> </p>
		<p>B <input type="text" name="ques[opt][]" /></p>
		<p>C <input type="text" name="ques[opt][]" /></p>
		<p>D <input type="text" name="ques[opt][]" /></p>
		<p>Ans <select name="ques[ans][]">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select></p>
	</section>
	
	<section class='question-box'>
		<p><textarea name="ques[]" placeholder="Enter the question here...."></textarea></p>
		<p>A <input type="text" name="ques[][]" /> </p>
		<p>B <input type="text" name="ques[][]" /></p>
		<p>C <input type="text" name="ques[][]" /></p>
		<p>D <input type="text" name="ques[][]" /></p>
		<p>Ans <select name="ques[][]">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select></p>
	</section>
	
	<section class='question-box'>
		<p><textarea name="ques[]" placeholder="Enter the question here...."></textarea></p>
		<p>A <input type="text" name="ques[][]" /> </p>
		<p>B <input type="text" name="ques[][]" /></p>
		<p>C <input type="text" name="ques[][]" /></p>
		<p>D <input type="text" name="ques[][]" /></p>
		<p>Ans <select name="ques[][]">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select></p>
	</section>
	
	<section class='question-box'>
		<p><textarea name="ques[]" placeholder="Enter the question here...."></textarea></p>
		<p>A <input type="text" name="ques[][]" /> </p>
		<p>B <input type="text" name="ques[][]" /></p>
		<p>C <input type="text" name="ques[][]" /></p>
		<p>D <input type="text" name="ques[][]" /></p>
		<p>Ans <select name="ques[][]">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select></p>
	</section>
	
	<p> <input type='submit' name='save' value="Save Question(s)" id='save' /></p>
</form>

<script src="admin/vendors/jquery-1.9.1.min.js"></script>
<script src="admin/vendors/ckeditor/ckeditor.js"></script>
<script src="admin/vendors/tinymce/tinymce/tinymce.min.js"></script>
<script>
(function() {
           
		
	tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
})();
</script>
</body>
</html>