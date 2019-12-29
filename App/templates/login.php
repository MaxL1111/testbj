<?php
session_start();
?>

<title><?php echo isset($title) ? $title : 'Вход в админку'; ?></title>

<?php if (!isset($content)) {
    ob_start(); ?>


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="/?ctrl=Admin&action=LoginIn" class="was-validated">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="validationTooltip01">Имя</label>
                                <input name="adminname" type="text" class="form-control is-invalid"
                                       id="validationTooltip01" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputPassword3">Пароль</label>
                                <input name="adminpass" type="password" class="form-control is-invalid"
                                       id="inputPassword3" required>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                        <div>
                            <br>
                            <?php
                            if (!empty($_SESSION['adminname'])) {
                                echo 'Вы ввошли как , ' . $_SESSION['adminname'];
                            } else {
                                echo $_SESSION['adminerror'];
                            }

                            ?>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


    <?php $content = ob_get_clean();
} ?>

<?php require 'basetemplate.php'; ?>

