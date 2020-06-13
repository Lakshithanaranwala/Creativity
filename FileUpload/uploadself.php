<!DOCTYPE html>
<html>
<body>

<?php
include 'dbConfig.php';
if(!empty($_FILES['fileToUpload'])){
	
	$target_dir = "file/";
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	$filename=basename($_FILES["fileToUpload"]["name"]);
	$discription=$_POST["discription"];


	//get the file type
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	//rename file before save
	$newname=$target_dir ."supun".date("y-m-d").".".$imageFileType ;

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$msg= "Sorry, your file is too large.<br>";
	}
	else{
		if($_FILES["fileToUpload"]["size"]==0){
			$msg="there problem.<br>";
		}
		else{
			$save=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$msg= "File uploaded.<br>";
			
			
		}	
	}
}
else{
	$msg= "";
}
/*insert into DB*/
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="files";


			//connect
			$conn=new mysqli($servername,$username,$password,$dbname);

			if($conn->connect_error){
				echo "error- ".$conn->connect_error;
			}
			else{
				echo "connected";
			}
			echo "<br>";

			//enter multiple data
			$sql="insert into uploads values('$filename','$discription');";


			$insert=$conn->query($sql);

			if($insert===true){
				echo "data enterd";
			}
			else {
				echo "error " .$sql ."<br>".$conn->error; 
			}
/*insert into DB*/


?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	<span style="color:red"> <?php echo $msg; ?> </span>
    Select image to upload:
    <input type="file" name="fileToUpload" ><br>
	<input type="text" name="discription" ><br>
	
    <input type="submit" value="Upload Image" name="submit">
</form>




</body>
</html>