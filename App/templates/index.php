<?php
session_start();
?>

    <title><?php echo isset($title) ? $title : 'Главная'; ?></title>

<?php if (!isset($content)) {
    ob_start(); ?>

    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal"
            data-target="#exampleModal3" data-whatever="@mdo">
        Опубликовать задачу <i class="far fa-hand-point-up"></i>
    </button>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ваша задача</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body was-validated">

                    <form id="form_question_answer" enctype="multipart/form-data" method="POST"
                          action="?ctrl=Tasks&action=InsertOne">


                        <div class="form-group">
                            <label for="validationTooltip01" class="col-form-label">Введите свое имя:*</label>
                            <input type="text" name="username" class="form-control" id="validationTooltip01"
                                   placeholder="Иван" value="<?php echo $_SESSION['username'] ?>" required>

                            <label for="email" class="col-form-label">Ваш е-mail:*</label>
                            <input name="useremail" type="email" class="form-control" id="user-email"
                                   placeholder="yourmail@example.by" value="<?php echo $_SESSION['useremail'] ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="validationTextarea" class="col-form-label">Текст задачи:*</label>
                            <textarea name="texttask" class="form-control is-invalid" id="validationTextarea"
                                      required></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button id="upload" type="submit" class="btn btn-primary">Опубликовать</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <h5>Все задачи <?php echo ', сортировка по ' . $_SESSION['namesort'] ?></h5>
    <form action="/?ctrl=Tasks&action=Index" method="post">
        <div class="input-group">
            <select name="namesort" class="custom-select" id="inputGroupSelect04"
                    aria-label="Example select with button addon">
                <option disabled selected>Сортировать...</option>
                <option value="name">по имени пользователя</option>
                <option value="email">по email</option>
                <option value="status">по статусу</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Применить</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">имя пользователя</th>
            <th scope="col">еmail</th>
            <th scope="col">текст задачи</th>
            <th scope="col">статус</th>
        </tr>
        </thead>
        <?php foreach ($tasks as $task) : ?>

            <?php if (!empty($task->name)): ?>

                <tbody>
                <tr>
                    <th scope="row"><?php echo $task->name; ?></th>
                    <td><?php echo $task->email; ?></td>
                    <td><?php echo $task->texttask; ?></td>
                    <td><?php echo $task->status; ?><br>
                        <?php echo $task->status2; ?></td>
                </tr>
                </tbody>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <?php

    foreach ($pages[0] as $page) {
        if ($page != null) {
            $count = $page;
        }
    }

    $res = ceil($count / 3);

    while ($res > 0) {
        $array1[] = $res;
        --$res;
    }

    $array1 = array_reverse($array1);
    ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php foreach ($array1 as $arr1): ?>
                <li class="page-item"><a class="page-link"
                                         href="/?ctrl=Tasks&action=Index&page=<?php echo $arr1; ?>"><?php echo $arr1; ?></a>
                </li>
            <?php endforeach; ?>

        </ul>
    </nav>


    <?php $content = ob_get_clean();
} ?>

<?php require 'basetemplate.php'; ?>