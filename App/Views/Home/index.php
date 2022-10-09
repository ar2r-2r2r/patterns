<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>
            <a href="/php-mvc/public/index.php?sortAscByFN">Ʌ</a>
            <a href="/php-mvc/public/index.php?sortDescByFN">V</a>
            first name
        </th>
        <th>
            <a href="/php-mvc/public/index.php?sortAscByLN">Ʌ</a>
            <a href="/php-mvc/public/index.php?sortDescByLN">V</a>
            last name
        </th>
        <th>
            <a href="/php-mvc/public/index.php?sortAscByDOB">Ʌ</a>
            <a href="/php-mvc/public/index.php?sortDescByDOB">V</a>
            date of birth
        </th>
        <th>
            <a href="/php-mvc/public/index.php?sortAscByS">Ʌ</a>
            <a href="/php-mvc/public/index.php?sortDescByS">V</a>
            salary
        </th>
    </tr>

<?php
foreach ($result as $row => $value) {
    ?><tr>
        <td><?=$value['firstName']?></td>
        <td><?=$value['lastName']?> </td>
        <td><?=$value['dob']?></td>
        <td><?=$value['salary']?></td>
        <td id="clean"><form action="edit.php" method="GET" id="tablebtn">
            <button name="id" value="<?=$value['id'];?>">Edit</button></form></td>
        <td id="clean"><form action="delete.php" method="GET" id="tablebtn">
            <button name="id" value="<?=$value['id'];?>">Delete</button></form></td>
    </tr>
    <?php
}
?>
</table>

<form action="add.php">
    <div class="btn"><button>Add</button>
</form></div>
</body>
</html>




