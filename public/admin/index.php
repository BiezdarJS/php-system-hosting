
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php require_login();  ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


    <div class="container">
    
         <a class="new-admin" href="<?php echo url_for('/nowy'); ?>">Dodaj admina</a>
    
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Imię</td>
                <td>Nazwisko</td>
                <td>Email</td>
                <td>Username</td>
                <td>Edycja</td>
                <td>Usuń</td>
            </tr>
        </thead>
        <tbody>


            <?php $admins = Admin::find_all(); ?>

                <?php foreach($admins as $admin) { ?>

                    <tr>
                        <td>
                            <?php echo $admin->id; ?>
                        </td>
                        <td>
                            <?php echo $admin->first_name; ?>
                        </td>
                        <td>
                            <?php echo $admin->last_name; ?>
                        </td>
                        <td>
                            <?php echo $admin->email; ?>
                        </td>
                        <td>
                            <?php echo $admin->username; ?>
                        </td>
                        <td>
                            <a href="<?php echo url_for('edytuj/' . h(u($admin->id))); ?>">Edytuj</a>
                        </td>
                        <td>
                            <a href="<?php echo url_for('usun/' . h(u($admin->id))); ?>">Usuń</a>
                        </td>                        
                    </tr>
            <?php } ?>


        </tbody>
    </table>


    </div>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>