<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<?php
$user = 'root';
$password = 'root';
$db = 'enum';
$host = 'localhost';
$port = 3306;
// Create connection
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, enum, name  FROM test";
$result = $conn->query($sql);
?>

<div class="container">
    <table class="table">
        <thead><tr class="success"> <th>ID</th> <th>enum</th> <th>Name</th> </tr></thead>
        <tr class="active">
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo("<tr><td>" . $row["id"]."</td><td>"); if($row["enum"] == 'N'){echo("<input type='checkbox'>");}else{echo("<input type='checkbox' checked>");} echo("</td><td> " . $row["name"]. "</td></tr>");
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
    </table>


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox").change(function() {
            if($(this).is(":checked")) {
            console.log('this');
                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: { strID:$(this).attr("id"), strState:"1" },
                });
            } else {
                console.log('that');
                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: { strID:$(this).attr("id"), strState:"1" },
                });
            }
        });
    });


</script>



</body>
</html>