<?php 

require_once 'config.php';
$conn = $GLOBALS['conn'];
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Example</title>
    <link rel="stylesheet" href="css/datatables.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <script src="js/fontawesome.js"></script>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/datatables.js"></script>



</head>

<body>
    <table class="display" style="width: 100%;text-align:center;" border="1" id="studenttable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>New</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
$sql="select * from student";
$result=$conn->query($sql);
if (mysqli_num_rows($result)>0){
    while ($row= mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['address']?></td>

                <td style="font-size: 15px;color:blue;">
                    <a href="example_datatable_new.php"><i class="fas fa-folder-plus"></i></a>
                </td>

                <td style="font-size: 15px;">
                    <a href="example_datatable_edit.php?id=<?php echo $row['id'];?>" style="color: black;"><i
                            class="fas fa-edit"></i></a></td>

                <td style="font-size: 15px;">
                    <a href="example_datatable_delete.php?id=<?php echo $row['id'];?>"
                        onclick="return confirm('Are you Sure?');">
                        <i class="fas fa-trash-alt" style="color:red;"></i> </a></td>
            </tr>

            <?php }
    }else {
        echo "0 result";
    }mysqli_free_result($result);
    mysqli_close($conn); 
            ?>


        </tbody>
    </table>
    <script>
    $(document).ready(function() {
        $('#studenttable').DataTable();
    });
    </script>
</body>

</html>