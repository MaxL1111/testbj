<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?php echo $title; ?></title>

</head>
<body>

<div class="container">

    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Задачи на логику</span>
    </nav>
<br>
    <h5>Все задачи</h5>

    <a href="index.php">fff</a>

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
                <div class="modal-body was-validated" >

                    <form id="form_question_answer" enctype="multipart/form-data" method="POST" action="?ctrl=News&action=InsertOne" >

                        <input name="user_citizen" type="hidden" value="рубрика вопрос-ответ">

                        <div class="form-group">
                            <label for="validationTooltip01" class="col-form-label">Введите свое имя:*</label>
                            <input type="text" name="name" class="form-control" id="validationTooltip01" placeholder="Иван" required>

                            <label for="email" class="col-form-label">Ваш е-mail:*</label>
                            <input name="email" type="email" class="form-control" id="user-email"
                                   placeholder="yourmail@example.by" required>
                        </div>

                        <div class="form-group">
                            <label for="validationTextarea" class="col-form-label">Текст задачи:*</label>
                            <textarea name="texttask" class="form-control is-invalid" id="validationTextarea" required></textarea>
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



<br>



        <table class="table">
            <thead class="thead-dark">
            <tr>

                <th scope="col">имя</th>
                <th scope="col">еmail</th>
                <th scope="col">текст задачи</th>
                <th scope="col">статус</th>
            </tr>
            </thead>
            <?php foreach ($tasks as $task) : ?>

            <?php if (!empty($task->name)):?>

            <tbody>
            <tr>
                <th scope="row"><?php echo $task->name; ?></th>
                <td><?php echo $task->email; ?></td>
                <td><?php echo $task->texttask; ?></td>
                <td><?php echo $task->status; ?></td>
            </tr>
            </tbody>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>



    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>