<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    Edit Employee
    <form action="" method="GET">
        Enter first name <input type="text" name="firstName" required><br>
        Enter last name<input type="text" name="lastName" required><br>
        Enter date of birth<input type="date" name="dob" required><br>
        Enter salary<input type="text" name="salary" required><br>
        <button name="id" value="<?=$id;?>">Submit</button>

    </form>
</body>
</html>