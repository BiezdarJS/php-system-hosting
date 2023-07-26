
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


<?php  require_login();  ?>

<?php
    $mega = $_SERVER['REQUEST_URI'];
    $id = substr($mega, 6); 
     if(!isset($id)) {
      redirect_to(url_for('/'));
    }
?>


<?php

    $admin = Admin::find_by_id($id);
?>


<?php if (is_post_request()) {

    $admin->delete();
    redirect_to(url_for('/'));


} else {


?>


    <form method="post" action="<?php echo url_for('usun/' . h(u($id))); ?>">


    <dl>
        <dt>Imię</dt>
        <dd>
            <?php echo $admin->first_name; ?>
        </dd>
    </dl>
    <dl>
        <dt>Nazwisko</dt>
        <dd>
            <?php echo $admin->last_name; ?>
        </dd>
    </dl>
<dl>
    <dt>Username</dt>
    <dd>
        <?php echo $admin->username; ?>
    </dd>
</dl>    



<button type="submit">Usuń</button>


</form>

<?php } ?>

<?php include(SHARED_PATH . '/panel-footer.php'); ?>