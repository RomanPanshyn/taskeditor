<?php
	$currenttask = 0;
	if (!empty($_POST['page1']))
		$currenttask = 0;
	if (!empty($_POST['page2']) && ($taskscount>3))
		$currenttask = 3;
	if (!empty($_POST['page3']) && ($taskscount>6))
		$currenttask = 6;
	if (!empty($_POST['page4']) && ($taskscount>9))
		$currenttask = 9;
	
	foreach ($data as $alltasks)
	 foreach ($alltasks as $key=>$row)
	 {
	   $taskname[$key] = $row['name'];
	   $taskemail[$key] = $row['email'];
	   $taskstatus[$key] = $row['status'];	
	 }
	 
	 array_multisort($taskname, SORT_ASC, $alltasks);
	 
	 if ((!empty($_POST['sort'])) && ($_POST['sort'] == 'name'))
		array_multisort($taskname, SORT_ASC, $alltasks);
	 if ((!empty($_POST['sort'])) && ($_POST['sort'] == 'email'))
		array_multisort($taskemail, SORT_ASC, $alltasks);
	 if ((!empty($_POST['sort'])) && ($_POST['sort'] == 'status'))
		array_multisort($taskstatus, SORT_ASC, $alltasks);
	
	if($currenttask<$taskscount)
	{
		$tasknumber = $currenttask + 1;			
		echo '<div class="col-sm-4">';
		echo '<h3>Task Number: '. $tasknumber . ' of '. $taskscount . '</h3>';
		echo '<p>Name: <span id="lefttaskname">' . $alltasks[$currenttask]['name'] . '</span></p>';
		if ($alltasks[$currenttask]['status'] == "0")
		  echo '<p>Status: <span id="lefttaskstatus">Open</span></p>';
	    if ($alltasks[$currenttask]['status'] == "1")
		  echo '<p>Status: <span id="lefttaskstatus">Closed</span></p>';
		echo '<p>Email: <span id="lefttaskemail">' . $alltasks[$currenttask]['email'] . '</span></p>';
		echo '<p>Text: <span id="lefttasktext">' . $alltasks[$currenttask]['text'] . '</span></p>';
		echo '<p>Image: <span id="lefttaskimage">' . $alltasks[$currenttask]['image'] . '</span></p>';
		echo '<p><img src="../public/img/' . $alltasks[$currenttask]['image'] . '" alt="Task image" height="240" width="320"></p>';
		echo '</div>';
		$currenttask++;
	}
	if($currenttask<$taskscount)
	{			
		$tasknumber = $currenttask + 1;			
		echo '<div class="col-sm-4">';
		echo '<h3>Task Number: '. $tasknumber . ' of '. $taskscount . '</h3>';
		echo '<p>Name: <span id="centertaskname">' . $alltasks[$currenttask]['name'] . '</span></p>';
		if ($alltasks[$currenttask]['status'] == "0")
			echo '<p>Status: <span id="centertaskstatus">Open</span></p>';
		if ($alltasks[$currenttask]['status'] == "1")
			echo '<p>Status: <span id="centertaskstatus">Closed</span></p>';		
		echo '<p>Email: <span id="centertaskemail">' . $alltasks[$currenttask]['email'] . '</span></p>';
		echo '<p>Text: <span id="centertasktext">' . $alltasks[$currenttask]['text'] . '</span></p>';
		echo '<p>Image: <span id="centertaskimage">' . $alltasks[$currenttask]['image'] . '</span></p>';
		echo '<p><img src="../public/img/' . $alltasks[$currenttask]['image'] . '" alt="Task image" height="240" width="320"></p>';
		echo '</div>';
		$currenttask++;
	}
	if($currenttask<$taskscount)
	{
		$tasknumber = $currenttask + 1;
		echo '<div class="col-sm-4">';
		echo '<h3>Task Number: '. $tasknumber . ' of '. $taskscount . '</h3>';
		echo '<p>Name: <span id="righttaskname">' . $alltasks[$currenttask]['name'] . '</span></p>';
		if ($alltasks[$currenttask]['status'] == "0")
			echo '<p>Status: <span id="righttaskstatus">Open</span></p>';
		if ($alltasks[$currenttask]['status'] == "1")
			echo '<p>Status: <span id="righttaskstatus">Closed</span></p>';
		echo '<p>Email: <span id="righttaskemail">' . $alltasks[$currenttask]['email'] . '</span></p>';
		echo '<p>Text: <span id="righttasktext">' . $alltasks[$currenttask]['text'] . '</span></p>';
		echo '<p>Image: <span id="righttaskimage">' . $alltasks[$currenttask]['image'] . '</span></p>';
		echo '<p><img src="../public/img/' . $alltasks[$currenttask]['image'] . '" alt="Task image" height="240" width="320"></p>';
		echo '</div>';
		$currenttask++;
	}
	?>
	</div>
	</div>
	<div class="container">
		<form action="index.php" method="post">
			<div class="pager">
			<label for="sortoption">Sort by: </label>&nbsp;&nbsp;
			<select name="sort" id="sortoption">
<?php
	if (empty($_POST['sort']))
	{
		echo '<option value="name" selected>name</option>';
		echo '<option value="email">email</option>';
		echo '<option value="status">status</option>';
	}
	if (!empty($_POST['sort']) && ($_POST['sort'] == 'name'))
	{
		echo '<option value="name" selected>name</option>';
		echo '<option value="email">email</option>';
		echo '<option value="status">status</option>';
	}
	if (!empty($_POST['sort']) && ($_POST['sort'] == 'email'))
	{
		echo '<option value="name">name</option>';
		echo '<option value="email" selected>email</option>';
		echo '<option value="status">status</option>';
	}
	if (!empty($_POST['sort']) && ($_POST['sort'] == 'status'))
	{
		echo '<option value="name">name</option>';
		echo '<option value="email">email</option>';
		echo '<option value="status" selected>status</option>';
	}  
?>	
	</select>
	<ul class="pager">
		<li><input type="submit" class="btn btn-info" name="page1" value="1"></li>&nbsp;
		<li><input type="submit" class="btn btn-info" name="page2" value="2"></li>&nbsp;
		<li><input type="submit" class="btn btn-info" name="page3" value="3"></li>&nbsp;
		<li><input type="submit" class="btn btn-info" name="page4" value="4"></li>&nbsp;
	</ul>
    </div>
	</form>
	<div class="container">
		<div class="row">
			<div class="span12">				
				<div class="control-group">
					<label class="control-label" for="username">Username</label>							
					<input type="text" id="username" name="username" placeholder="" class="input-xlarge">
					<label class="control-label" for="password">Password</label>							
					<input type="password" id="password" name="password" placeholder="" class="input-xlarge">												
					<label class="control-label" for="edit">Edit task</label>	
					<select id="edit" name="edit">
						<option value="left" selected>left</option>
						<option value="center">center</option>
						<option value="right">right</option>
					</select>								
					<button class="btn btn-success" id="adminlogin">Admin Login</button>
				</div>					
			</div>
		</div>
	</div>
	<form action="index.php" method="post" id="createform" enctype="multipart/form-data">
    <div class="pager">
	<div class="row">
	<h3>Create / Edit task</h3>
	<div class="col-sm-2">
		<label for="name">Name: </label>
		<input type="text" id="name" name="name" placeholder="Andrew Fineberg">
	</div>
	<div class="col-sm-1">
		<label for="status">Status: </label>	
		<input type="checkbox" id="status" name="status" value="0" disabled>
	</div>	
	<div class="col-sm-3">	
		<label for="email">Email: </label>	
		<input type="email" id="email" name="email" size="30" placeholder="andrewfineberg@gmail.com">
	</div>	
	<div class="col-sm-2">
		<label for="text">Text: </label>
		<textarea id="text" name="text" placeholder="This is a basic programming task."></textarea>
	</div>				
	<div class="col-sm-3">
		<label for="image">Image 320x240 ../public/img/*(jpg,gif,png) </label>
		<input type="file" name="imageToUpload" id="imageToUpload">			
	</div>
	<div class="col-sm-1">			
		<input type="submit" class="btn btn-info" name="createedittask" id="editbtn" value="Save">
	</div>
	</div>
   </div>
  </form>  
   <button id="previewtask">Scroll down for a Preview</button> 
	<p id="previewname"></p>
	<p id="previewemail"></p>
	<p id="previewtext"></p>
	<p id="previewimage"></p>
  
 <script>
   $(document).ready(function(){	
	$("#adminlogin").click(function(){
	  if ($("#username").val() == "admin" && $("#password").val() == "123"){
	    $("#adminlogin").text("Edit");
		if ($("#edit option:selected").text() == "left")
		{
			$("#name").val($("#lefttaskname").text());
			$("#name").prop("readonly", true);
			$("#status").prop("disabled", false);			
			$("#email").val($("#lefttaskemail").text());
			$("#email").prop("readonly", true);
			$("#text").val($("#lefttasktext").text());
			$("#imageToUpload").prop("disabled", true);						
			$("#previewtask").prop("disabled", true);
			if ($("#lefttaskstatus").text() == "Closed")
			{			
			  $("#status").prop("checked", true);
			  $("#status").val('1');
			}
		    if ($("#lefttaskstatus").text() == "Open")
			{				
			  $("#status").prop("checked", false);
			  $("#status").val('0');
			}

		}
		if ($("#edit option:selected").text() == "center")
		{
			$("#name").val($("#centertaskname").text());
			$("#name").prop("readonly", true);
			$("#status").prop("disabled", false);
			$("#email").val($("#centertaskemail").text());
			$("#email").prop("readonly", true);
			$("#text").val($("#centertasktext").text());
			$("#imageToUpload").prop("disabled", true);			
			$("#previewtask").prop("disabled", true);
			if ($("#centertaskstatus").text() == "Closed")
			{
			  $("#status").prop("checked", true);
			  $("#status").val('1');
			}
		    if ($("#centertaskstatus").text() == "Open")
			{ 
				$("#status").prop("checked", false);
				$("#status").val('0');
			}
		}
		if ($("#edit option:selected").text() == "right")
		{
			$("#name").val($("#righttaskname").text());
			$("#name").prop("readonly", true);
			$("#status").prop("disabled", false);
			$("#email").val($("#righttaskemail").text());
			$("#email").prop("readonly", true);
			$("#text").val($("#righttasktext").text());
			$("#imageToUpload").prop("disabled", true);			
			$("#previewtask").prop("disabled", true);
			if ($("#righttaskstatus").text() == "Closed")
			{
			  $("#status").prop("checked", true);
			  $("#status").val('1');
			}
		    if ($("#righttaskstatus").text() == "Open")
			{
				$("#status").prop("checked", false);
				$("#status").val('0');
			}
		}	    
	  }
   });	
   
   $("#status").change(function(){
     if ($("#status").is(':checked'))
         $("#status").val('1');
     else
         $("#status").val('0');
});

 $("#createform").submit(function(){
  if ($("#imageToUpload").is(':disabled'))
  {
    if ($("#status").is(':checked'))
        $("#status").val('1');
    else
        $("#status").val('0');   	
  }
  if ($("#imageToUpload").is(':enabled'))
  {		
	var fileUpload = $ ("#imageToUpload")[0];
	 var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.gif|.png)$");
     if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof (fileUpload.files) != "undefined") {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;
                image.onload = function () {					
					return true;
				};
			}
		} else {
                alert("This browser does not support HTML5.");
                return false;
			}
	} else {
            alert("Please select a valid Image file 320x240 ../public/img/*(jpg,gif,png)");
            return false;
	 }
 }
 });
  
	$("#previewtask").click(function(){
     var fileUpload = $ ("#imageToUpload")[0];
	 var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.gif|.png)$");
     if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof (fileUpload.files) != "undefined") {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;
                image.onload = function () {										    		
					$("#previewname").text("Name: " + $("#name").val());
					$("#previewemail").text("Email: " + $("#email").val());
					$("#previewtext").text("Text: " + $("#text").val());
					var imagePreview = $("#imageToUpload")[0].files[0]['name'];
					$("#previewimage").html("Image: " + imagePreview + "<p><img src='" + image.src + "' alt='Task image' height='240' width='320'></p>");
                    return true;
				};
			}
		} else {
                alert("This browser does not support HTML5.");
                return false;
			}
	} else {
            alert("Please select a valid Image file 320x240 ../public/img/*(jpg,gif,png)");
            return false;
	 }	 
  });		
 });	
 </script>
</div>