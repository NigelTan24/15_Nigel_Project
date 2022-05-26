<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Police Emergency Service System</title>
</head>

<body>
 
<script>
function anymeaningfulname()
	{
		var x=document.forms["frmLogCall"]
		["CallerName"].value;
		if (x==null || x=="")
	{
		alert("Caller Name is required.");
		return false;
	}
	}
	</script>
	<?php require_once 'nav.php';
	?>
	<?php require_once 'db.php';
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	if($conn->connect_error){
		die("Connection failed: " . $conn_>connect_error);
	}
	$sql = "SELECT * FROM incidenttype";
	$result = $conn-> query($sql);
	if ($result->num_rows > 0){
		while ($row = $result-> fetch_assoc()){
			$incidentType[$row['incidentTypeId']] =
			$row['incidentTypeDesc'];
		}
	}
	$conn->close();
	?>
	<fieldset>
	<legend>Log Call</legend>
	<form name="frmLogCall" method="post" action="dispatch.php" onSubmit="return anymeaningfulname();">
	<table width="45%" border="2" align="center"
	cellpadding="5" cellspacing="5">
	<tr>
	<td width="20%" align="center">Name of Caller:</td>
	<td width="50%"><input type="text" pattern="[a-zA-z][a-zA-Z\s]*" name="callerName" id="callerName" required></td>
	</tr>
	<tr>
	<td width="20%" align="center">Contact Number:</td>
	<td width="50%"><input type="text" pattern="[6,8,9]{1}[0-9]{7}" placeholder="onlynumbers" maxlength="8" name="contactNo" id="contactNo" title="Phone number must be in 8 digits" required></td>
	</tr>
	<tr>
	<td width="50%" align="center">Location:</td>
	<td width="50%"><input type="text" name="location" id="location" required></td>
	</tr>
	<tr>
	<td width="50%" align="center">Incident Type:</td>
	
	<td width="50%"><select name="incidentType" id="incidentType">
	
	<?php foreach($incidentType as $key=> $value) {?><option value="<?php echo $key ?>">
		<?php echo $value ?> </option>
		<?php } ?>
		</select>
		</td>
	</tr>
		<tr>
		<td width="50%"
		align="center">Description:</td>
		<td width="50%"><textarea name="incidentDesc" id="incidentDesc" cols="45" rows="5" required></textarea></td>
		</tr>
		<tr>
		<table width="40%" border="0" align="center" cellpadding="5" cellspacing="5">
		<td align="center"><input type="reset" name="cancelProcess" id="cancelProcess" value="Reset"</td>
		<td align="center"><input type='submit' name="btnProcessCall" id="btnProcessCall" value="Process Call"</td>
		</tr>
			</table>
		</table>
		</form>
	</fieldset>
</body>
</html>