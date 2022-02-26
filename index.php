<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        body{
            background-color: #F7ECDE;
            font-family: 'BhuTuka Expanded One', cursive;
        }
        #mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float: right;
            border: 1px solid gray;
            padding: auto;
        }
        input{
            padding: 5px;
            border: 5px solid black;
            text-align: center;
            font-size: 17px;
            font-family:Arial, Helvetica, sans-serif;
        }
        aside{
            text-align: center;
            width: 300px;
            float: left;
            border: 10px solid black;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;

        }
        #tbl{
            width: 1501PX;
            font-size: 20px;
            text-align: center;
        }
        #tbl th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 12px;
            text-align: center;
        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 7px;
            font-size: 17px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<?php
$host='localhost';
$user='root';
$password='';
$db='student';
$conn=mysqli_connect($host,$user,$password,$db);

$id = $_POST["id"] ?? "";
$name = $_POST['name'] ?? "";
$address = $_POST['address'] ?? "";

// echo "<pre>".print_r($_POST)."</pre>";
$sqls='';
if(isset($_POST['send']) && $_POST['send']=="add"){
    $sqls="insert into student value($id,'$name','$address')";
    // echo $sqls;
    mysqli_query($conn,$sqls);
    // header("location:db-connect.php");
}
else if(isset($_POST['send']) && $_POST['send']=="del"){
    $sqls="delete from student where id ='$name'";
    mysqli_query($conn,$sqls);
    // header("location:home.php");
}

$q=mysqli_query($conn,"select * from student");


?>
<body dir='rtl'>
    <div id='mother'>
        <form method="POST" autocomplete="off">
            <aside>
                <div id="div">
                    <img src="https://images.freeimages.com/images/premium/previews/5108/51082762-cartoon-student.jpg" alt="photo" width="200px">
                    <h3>lawhat lmodir</h3>
                    <label>num talib</label><br>
                    <input type="text" name="id" id="id" ><br>
                    <label>ism talib</label><br>
                    <input type="text" name='name' id="name"><br>
                    <label>3onwan talib</label><br>
                    <input type="text" name="address" id="adress"><br><br>
                    <button type="submit" name="send" value="add">add</button>
                    <button type="submit" name="send" value="del">suprimer</button>
                </div>
            </aside>
            <main>
                <table id='tbl'>
                <tr>
                    <th>num </th>
                    <th>nome</th>
                    <th>address</th>
                    <th>Supprimer</th>
                </tr>
                <?php
while($row=mysqli_fetch_array($q)){
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td> <button type="submit" name="send" value="add">X</button></td>';
    echo '</tr>';
}
?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>