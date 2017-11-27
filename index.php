<?php
require_once 'init.php';

$task = new Tasks();

if(isset($_POST['submit'])) {
    $task->addTask($_POST['task']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>TODO list</h1>

    <form action="" method="post">
        <input name="task" type="text" >
        <input name="submit" type="submit" >
    </form>


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
                <td>
                    <form method="post" action="">
                        <input type="submit" name="delete" value="Done">
                        <input type="hidden" name="id" value="<?php echo $a[0];?>">
                        <?php

                            if(isset($_POST['delete'])) {
                                $hh = ((int)$_POST['id']);
                                $task->deleteTask($hh);

                                header('Location: index.php');

                            }
                        ?>
                    </form>
                </td>
                <td>
                    <?php echo $a[2]; ?>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
</body>
</html>