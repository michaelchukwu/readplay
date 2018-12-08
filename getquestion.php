
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','1234','readplay');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"readplay");
$sql="SELECT * FROM questions WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['question'];
    echo '<input type="hidden" id="id" value="'.$row['id'].'">';
}
mysqli_close($con);
?>