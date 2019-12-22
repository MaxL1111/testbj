<?php
session_start();
if (empty($_SESSION['adminname'])) {
    header('Location:/?ctrl=Admin&action=Login');
    die;
};
?>
<title><?php echo isset($title) ? $title : 'Редактор задач'; ?></title>

<?php if (!isset($content)) {
    ob_start(); ?>


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="/?ctrl=Admin&action=EditOne" class="was-validated">



                        <div class="form-group">

                            <p>Имя пользователя: <?php echo $task->name; ?> </p>
                            <input type="hidden" name="id" value="<?php echo $task->id; ?>">
                            <input type="hidden" name="status2" value="<?php echo $task->status2; ?>">
                            <input type="hidden" name="texttask1" value="<?php echo $task->texttask; ?>">
                            <label for="validationTextarea" class="col-form-label">Текст задачи:*</label>
                            <textarea name="texttask" rows="8" class="form-control is-invalid" id="validationTextarea" required><?php echo $task->texttask; ?></textarea>
                        </div>
                        <input type="hidden" name="status1" value="<?php echo $task->status; ?>">
                        <div class="form-group">

                        <p><input type="checkbox" name="status" value="выполнено,"> выполнено</p>
                        </div>


                        <button type="submit" class="btn btn-primary">Отправить</button>

                    </form>


                </div>
            </div>
        </div>
    </div>




    <?php $content = ob_get_clean();
} ?>

<?php require 'basetemplate.php'; ?>
