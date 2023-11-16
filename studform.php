<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <style>
        fieldset {
            background: #c8c8c8;
            border: 2px solid #333;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        legend {
            font-weight: bold;
            font-style: italic;
            color: #000000;
            padding: 5px 10px;
            border-radius: 5px;
        }
        
        .err {
            color: red;
            font-style: italic;
        }
        .btn {
        background-color: #054bb4; 
        color: #fff;
        border: 0;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; 
    }

    .btn:hover {
        background-color: #658cc2; 
    }
     .search{
        background-color: #054bb4; 
        color: #fff;
        border: 0;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; 
    }
     .search:hover {
        background-color: #658cc2; 
    }





    </style>
</head>
<body>
    <?php
    include 'db/opendb.php';

    if(isset($_GET['edit'])){
        $all = mysqli_query($conn, "SELECT * from student where s_id='".$_GET['edit']."'");
        $row = mysqli_fetch_object($all);
    }

    if(isset($_POST['btnsearch'])) {
        $search_query = $_POST['txtsearch'];
        $select = mysqli_query($conn, "SELECT * from student WHERE s_id LIKE '%$search_query%' OR fname LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR age LIKE '%$search_query%'");
    } else {
        $select = mysqli_query($conn, "SELECT * from student");
    }
    ?>

    <form method="POST" action="db/insert.php">
        <FIELDSET>
        <legend>STUDENT FORM</legend>
        <span class="err">* required</span><br>
       <label for="sno">Student ID:
            <input type="text" name="sno" id="sno" value="<?php if(isset($_GET['edit'])){
                echo $row->s_id;} ?>" > </label>
            <span class="err"></span><br>
            First Name:<input type="text" name="fname" value="<?php if(isset($_GET['edit'])){ 
                echo $row->fname;} ?>"> </td>
            <span class="err"></span>
            Last Name:<input type="text" name="lname" value="<?php if(isset($_GET['edit'])){
                echo $row->lname;} ?>">
            <span class="err"></span>
            Age:<input type="number" name="age" value="<?php if(isset($_GET['edit'])){
                echo $row->age;} ?>">


         <span class="err"></span>
        <input type="submit" name="<?php if(isset($_GET['edit'])){ echo 'Update';} else { echo 'submit';}?>" value="<?php if(isset($_GET['edit'])){ echo 'Update' ;} else{ echo 'Register'; } ?>" class="btn">

        </FIELDSET>
    </form>

    <form method="POST">
        <input type="text" name="txtsearch">
        <input type="submit" name="btnsearch" value="Search" class="search">
        <table width="100%" border="1" style="border-collapse: collapse; ">
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_object($select)) {
            ?>
                <tr>
                    <td><?php echo $result->s_id ?></td>
                    <td><?php echo $result->fname ?></td>
                    <td><?php echo $result->lname ?></td>
                    <td><?php echo $result->age ?></td>
                    <td>
                        <a href="studform.php?edit=<?= $result->s_id ?>">Edit</a> |
                        <a href="db/delete.php?delete=<?= $result->s_id ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>
