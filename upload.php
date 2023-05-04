<?php
if(isset($_FILES["csvfile"])) {
	$target_dir = "upload/"; // Directory where the file will be saved
	$target_file = $target_dir . basename($_FILES["csvfile"]["name"]);
	$file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($file_type != "csv") {
		echo "<div class='upload-error' style='color: #CC0000; font-weight: bold;'>Error: Only <em style='font-style: italic;'>CSV</em> files are allowed.</div>";
		exit;
	}
	if(move_uploaded_file($_FILES["csvfile"]["tmp_name"], $target_file)) {
		$full_path = realpath($target_file);
		echo "<div class='upload-success' style='color: blue; font-size: 30px;'>
			<p style='font-weight: bold;'><strong>".htmlspecialchars(basename($_FILES["csvfile"]["name"]))."</strong> has been uploaded to:</p>
			<p><em>".$full_path."</em></p>
<p class='success-msg' style='font-style: arial; color: black;'>Success! Your file has been uploaded.</p>

			<p class='view-msg'>You can now view your file at the above destination</p>
		</div>
		<img src='bg1.jpg' style='position: fixed; left: 0; left: 0; width: 20%; height: auto; z-index: -1;'>";
	} else {
		echo "<div class='upload-error' style='color: #CC0000; font-weight: bold;'>Error uploading file.</div>";
	}
}
?>
