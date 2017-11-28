<?php
require_once 'init.php';

$task = new Tasks();

if(isset($_POST['submit'])) {
    $task->addTask($_POST['task']);
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>To do list</h1>

    <hr>

    <div class="input-group">
        <form action="" method="post">
            <p class="title"> Add new task: </p>
            <input name="task" type="text" >
            <input name="submit" type="submit">
        </form>
    </div>

    <hr>

    <table>

        <tr>
            <th>Task</th>
        </tr>

        <?php

        $as = $task->displayTask();
        foreach($as as $a):
        ?>

        <tr>
            <th class="">
                <?php echo $a[1]; ?>
            </th>
            <td class="done-btn">
                <form method="post" action="">
                    <input type="submit" name="delete" value="Done">
                    <input type="hidden" name="id" value="<?php echo $a[0];?>">
                    <?php

                        if(isset($_POST['delete'])) {
                            $id = ((int)$_POST['id']);
                            $task->deleteTask($id);

                            header('Location: index.php');

                        }
                    ?>
                </form>
            </td>
            <td class="t-stamp">
                <?php echo $a[2]; ?>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>
</body>
</html>