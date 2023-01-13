<?php  session_start();

    require_once 'bd.php';
    //$name = $_POST['name'];
    if(isset($_POST['+']) & isset($_POST['id'])){
        $id = $_POST['id'];
        $like = $_POST['+'] + 1;
        $sql= "UPDATE `list` SET `+`=$like WHERE id=$id";
        mysqli_query($connect,$sql);
                      
        //$sql= "DELETE FROM `ochered` WHERE `id` = $id";
        //mysqli_query($connect,$sql);       
    }

    if(isset($_POST['com'])){
        $com=$_POST['com'];
        $sql= "INSERT INTO `List` (`comments`) VALUES ('$com')";
        mysqli_query($connect,$sql);
    }

    $ochered = mysqli_query($connect,"SELECT * FROM `List` ORDER BY id");
    $ochered = mysqli_fetch_all($ochered);
        
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>каналы</title>
        <!-- Только CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <font size="5" color="black" face="Comic Sans MS">
    <h1 align="center" >Лента заметок</h1>
    <table align="center">
    <?php
    foreach($ochered as $item) {                        
        ?>        
            <form align="center" action="index.php" method="post">
                <tr>
                    <td><?= $item[1] ?></td>
                    <input type = "text" name = "id" value = "<?=$item[0]?>" hidden />
                    <input type = "text" name = "+" value = "<?=$item[2]?>" hidden />
                    <td><?= $item[2] ?></td>
                    <td><button type="submit" onclick=header("Location: index.php")>like</button></td>
                </tr>
            </form>        
        <?php
    }
    ?>
    </table>

    <form align="center" action="index.php" method="post">        
        <input type="text" name="com">
        <button type="submit" >Написать</button>
    </form>
    </font>
</html>