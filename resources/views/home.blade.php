<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Todo List</title>
</head>

<body>
    <div class="container">
        <h1 class="title">Todo List</h1>
        <div class="ListedTasks">
            <input type="text" name="addingTask" placeholder="add something you need to do~~">
            <button class="btn-add">add</button>
        </div>
        <div class="ListedTasks">
        <!-- date -->
            <table>
                <tr>
                <th></th>
                <th>created date</th>
                <th>task</th>
                <th>update</th>
                <th>delete</th>
                </tr>
                <tr>
                <td><img src="/img/favicons.png" alt=""></td>
                <td>date</td>
                <!-- <td>{{ ->date }}</td> -->
                <td><input type="text" name="addedTask" value="addedTask"></td>
                <td><button class="btn-update">update</button></td>
                <td><button class="btn-delete">delete</button></td>
                <td><input class="delete" type="hidden" name="addedTask" value="addedTask"></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
