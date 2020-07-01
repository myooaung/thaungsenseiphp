<?php 
if (isset($_POST['name'])){
    require_once 'config.php';
$conn= $GLOBALS['conn'];

    $name=htmlspecialchars($_POST['name']);
    $gender=htmlspecialchars($_POST['gender']);
    $address=htmlspecialchars($_POST['address']);
    
    $sql= "insert into student (name,gender,address) values ('$name','$gender','$address')";
    if (mysqli_query($conn,$sql)){
        echo 'Record Added successfully';
        header("location: example_datatable.php");
        
        
    }else{
        echo "Error in Adding New Data";
    }
    
    mysqli_close($conn);
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

    <form action="example_datatable_new.php" method="post" name="addform" onsubmit="return validateForm();">

        <fieldset>
            <legend>Add New Student</legend>
            <label for="name">Name</label>
            <input type="text" name="name"><br>
            <label for="gender">Gender</label>
            <input type="text" name="gender"><br>
            <label for="address">Address</label>
            <input type="text" name="address"><br>
            <input type="submit" value="Add">
            <input type="reset" value="Cancel">
        </fieldset>
    </form>


    <script>
    function validateForm() {
        var name = document.addform.name.value;
        var address = document.addform.address.value;
        var gender = document.addform.gender.value;

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