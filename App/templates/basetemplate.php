<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?php echo isset($title) ? $title : ''; ?></title>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/?ctrl=News&action=Index&page=1">Главная</a>
        <?php
        if (!empty($_SESSION['adminname'])) {
            echo 'Привет , ' . $_SESSION['adminname'];
        } else {
            echo 'Привет пользователь ' . $_SESSION['username'];
        }
        ?>
        <form class="form-inline my-2 my-lg-0">
            <a data-toggle="modal"
               data-target="#ModalAutorize" data-whatever="@mdo"
               class="btn btn-warning" role="button">Авторизация</a>&nbsp
            <a class="btn btn-primary" href="/?ctrl=Admin&action=AdmIndex" role="button">Админка</a>&nbsp
            <?php
            if (!empty($_SESSION['adminname'] || $_SESSION['username'])) {
                echo "<a class=\"btn btn-danger\" href=\"/?ctrl=Admin&action=Logout\" role=\"button\">Выход</a>";
            }
            //<a class="btn btn-danger" href="/?ctrl=Admin&action=Logout" role="button">Выход</a>
            ?>


        </form>
    </nav>

    <br>

    <?php

    if (isset($_GET['send']) && $_GET['send'] == 'true') {
        echo "
<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
  <strong>Задача успешно добавлена!</strong>
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";

    }

    ?>


    <div class="modal fade" id="ModalAutorize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body was-validated">

                    <form id="form_question_answer" enctype="multipart/form-data" method="POST"
                          action="/?ctrl=User&action=Authorization">


                        <div class="form-group">
                            <label for="username" class="col-form-label">Введите свое имя:*</label>
                            <input type="text" name="username" class="form-control" id="validationTooltip01"
                                   placeholder="Иван" required>

                            <label for="useremail" class="col-form-label">Ваш е-mail:*</label>
                            <input name="useremail" type="email" class="form-control" id="user-email"
                                   placeholder="yourmail@example.by" required>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button id="upload" type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

    <div class="content">
        <?php if (isset($content)) {
            echo $content;
        } else { ?>
            Default content
        <?php } ?>
    </div>


</div>


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