<?php
    include "conn.php";

?>

<style>
    #divheader{
        margin: auto;
        width: 500px;
        border-radius: 3px;
        padding: 10px;
    }
    input[type="text"]{
        width: 100%;
    }
</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD operation</title>
    </head>
    <body>
        <div id="divheader">
            <form action="insert.php" method="post">
                <table width="100%">
                    <tr>
                        <td>FIRST NAME</td>
                        <td><input type="text" name="FNAME" required></td>
                    </tr>
                    <tr>
                        <td>MIDDLE NAME</td>
                        <td><input type="text" name="MI" required></td>
                    </tr>
                    <tr>
                        <td>LAST NAME</td>
                        <td><input type="text" name="LNAME" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit">REGISTER</button></td>
                    </tr>
                </table>
            </form>
            <?php
                if (isset($_SESSION['success'])) {
                    echo "<div style='background:green;color:#fff;padding:3px;border-radius:3px'>".$_SESSION['success']."</div>";
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo "<div style='background:red;color:#fff;padding:3px;border-radius:3px'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
            ?>


            <table border="1" width="100%">
                <tr>
                    <th alignt="left">FIRST NAME</th>
                    <th alignt="left">MIDDLE NAME</th>
                    <th alignt="left">LAST NAME</th>
                    <th alignt="right">ACTIONS</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM client ORDER BY LNAME ASC";
                    $query = $conn->query($sql);
                    while($row=$query->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$row['FNAME'];?></td>
                    <td><?=$row['MI'];?></td>
                    <td><?=$row['LNAME'];?></td>
                    <td align="right">
                        <a href="edit.php?edit=<?=$row['ID']?>">EDIT</a>
                        <a href="delete.php?delete=<?=$row['ID']?>">DELETE</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>