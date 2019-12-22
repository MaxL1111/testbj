<?php
session_start();
if (empty($_SESSION['adminname'])) {
    header('Location:/?ctrl=Admin&action=Login');
    die;
};


?><title><?php echo isset($title) ? $title : 'Админка'; ?></title>

<?php if (!isset($content)) {
    ob_start(); ?>

    <h3>Админка</h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">имя пользователя</th>
            <th scope="col">еmail</th>
            <th scope="col">текст задачи</th>
            <th scope="col">статус</th>
            <th scope="col">действия</th>
        </tr>
        </thead>


        <?php

        foreach ($tasks as $task) : ?>

            <?php if (!empty($task->name)): ?>

                <tbody>
                <tr>
                    <th scope="row"><?php echo $task->name; ?></th>
                    <td><?php echo $task->email; ?></td>
                    <td><?php echo $task->texttask; ?></td>
                    <td><?php echo $task->status; ?><br>
                        <?php echo $task->status2; ?>
                    </td>
                    <td>
                        <p>

                        <form action="/?ctrl=Admin&action=Editor" enctype="multipart/form-data" method="POST">

                            <input type="hidden" name="id_editor" value="<?php echo $task->id; ?>">
                            <button id="upload" type="submit" class="btn btn-success">Редактировать</button>
                        </form>



                        </p>


                        <p>
                        <form action="/?ctrl=Admin&action=Delete" enctype="multipart/form-data" method="post">

                            <input type="hidden" name="id_delete" value="<?php echo $task->id; ?>">
                            <button id="upload" type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        </p>


                    </td>
                </tr>
                </tbody>



            <?php endif; ?>
        <?php endforeach; ?>
    </table>



    <?php $content = ob_get_clean();
} ?>

<?php require 'basetemplate.php'; ?>
