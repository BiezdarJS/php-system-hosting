
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


<?php  require_login(); ?>

<?php
    $mega = $_SERVER['REQUEST_URI'];
    $id = substr($mega, 8); 
    if(!isset($id)) {
    redirect_to(url_for('/'));
    }
?>





<?php $admin = Admin::find_by_id($id); ?>




<?php if (is_post_request()) { 


        $args = [];
        $args['id'] = $id;
        $args['first_name'] = $_POST['first_name'] ? $_POST['first_name'] : '';
        $args['last_name'] = $_POST['last_name'] ? $_POST['last_name'] : '';
        $args['email'] = $_POST['email'] ? $_POST['email'] : '';
        $args['username'] = $_POST['username'] ? $_POST['username'] : '';
        $args['password'] = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 10]) : '';



        $admin->merge_attributes($args);

        $admin->update();


        redirect_to(url_for('/'));

 } else { ?>




<form method="post" action="<?php echo url_for('edytuj/' . h(u($id))); ?>">
    <h2>Edytuj :</h2>
    <dl>
        <dt>Imię:</dt>
        <dd>
            <input id="first_name" type="text" name="first_name" value="<?php echo h($admin->first_name); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Nazwisko:</dt>
        <dd>
            <input id="last_name" type="text" name="last_name" value="<?php echo h($admin->last_name); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Email:</dt>
        <dd>
            <input id="email" type="text" name="email" value="<?php echo $admin->email; ?>">
        </dd>
    </dl> 
    <dl>
        <dt>Username:</dt>
        <dd>
            <input id="username" type="text" name="username" value="<?php echo h($admin->username); ?>">
        </dd>
    </dl>         
    <dl>
        <dt>Password:</dt>
        <dd>
            <input id="password" type="text" name="password" value="">
        </dd>
    </dl>                 
    <input type="submit" value="Edytuj">
</form>




<?php } ?>




<?php include(SHARED_PATH . '/panel-footer.php'); ?>


