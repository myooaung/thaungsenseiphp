<?php 
require_once 'config.php';
if (isset($_GET['id'])){
$conn = $GLOBALS['conn'];
$id = htmlspecialchars($_GET['id']);
$sql= "select * from student where id ='$id'";

$result= mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$name= $row['name'];
$gender=$row['gender'];
$address=$row['address'];


mysqli_free_result($result);
mysqli_close($conn);}

if (isset($_POST['name'])){
  
$conn=$GLOBALS['conn'];
if (isset($_POST['name'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    
    $sql="update student set name='$name', gender='$gender',address='$address' where id='$id'";
    if (mysqli_query($conn,$sql)){
        header("location: example_datatable.php");
        // echo "Success";
    }else{
        echo "Error in update Query";
    }
    mysqli_close($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    form {
        width: 100%;
    }

    input[type='text'] {

        margin: 10px;
        text-align: center;
        width: 400px;
        height: 30px;
    }

    fieldset {
        margin: auto;
        text-align: center;
        margin-top: 40px;
        width: 400px;
    }

    input[type='submit'] {
        width: 80px;
        height: 30px;
        margin: 10px;

    }

    input[type='reset'] {
        width: 80px;
        height: 30px;
        margin: 10px;

    }

    label {
        width: 100px;
        display: block;
    }
    </style>
</head>

<body>

    <form name="editform" action="example_datatable_edit.php" method="post" onsubmit="return validateForm();">

        <fieldset>
            <legend>Edit Student Record</legend>
            <input type="text" name="id" value="<?php echo $id?>" style="display: none;">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name?>"><br>
            <label for="name">Gender</label>
            <input type="text" name="gender" value="<?php echo $gender?>"><br>
            <label for="name">Address</label>
            <input type="text" name="address" value="<?php echo $address?>"><br>
            <input type="submit" value="Update">
            <input type="reset" value="Cancel">
        </fieldset>
    </form>
    <script>
    function validateForm() {
        var name = document.editform.name.value;
        var address = document.editform.address.value;
        var gender = document.editform.gender.value;

        if (name == null || name == "" || name.lenght == 0) {
            alert("Name can't be blank");
            return false;
        } else if (gender == null || gender == "" || gender.lenght == 0) {
            alert("Gender can't be blank");
            return false;
        } else if (address == null || address == "" || address.lenght == 0) {
            alert("Address can't be blank");
            return false;
        } else {
            $b =confirm('Are you Sure?');
            return $b;
        }
    }
    </script>
</body>

</html>

