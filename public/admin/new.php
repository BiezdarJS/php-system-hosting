
    <?php require __DIR__ . './../../private/initialize.php'; ?>


    <?php  require_login();  ?>

    <?php include(SHARED_PATH . '/panel-header.php'); ?>


     <?php if (is_post_request()) {

        
        $args = $_POST['admin'];

        $admin = new Admin($args);

        $result = $admin->save();

        if($result) {
            redirect_to(url_for('./'));
        } else {
            // show errors
            
        }


    
     } ?>


    
    <form method="post" action="<?php echo url_for('/nowy'); ?>">
        <h2>Nowy Użytkownik :</h2>
        <div class="password">
            <p>Hasła powinny:</p>
            <ul>
                <li>zawierać co najmniej 12 znaków</li>
                <li>zawierać co najmniej 1 wielką literę</li>
                <li>zawierać co najmniej 1 małą literę</li>
                <li>zawierać cyfrę</li>
                <li>zawierać symbol</li>
            </ul>
        </div>
        <?php echo display_errors($admin->errors); ?>
        <dl>
            <dt>Imię:</dt>
            <dd>
                <input id="first_name" type="text" name="admin[first_name]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Nazwisko:</dt>
            <dd>
                <input id="last_name" type="text" name="admin[last_name]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Email:</dt>
            <dd>
                <input id="email" type="text" name="admin[email]" value="">
            </dd>
        </dl> 
        <dl>
            <dt>Username:</dt>
            <dd>
                <input id="username" type="text" name="admin[username]" value="">
            </dd>
        </dl>         
        <dl>
            <dt>Password:</dt>
            <dd>
                <input id="password" type="text" name="admin[password]" value="">
            </dd>
        </dl>                 
        <dl>
          <dt>Confirm Password</dt>
          <dd><input type="password" name="admin[confirm_password]" value="" /></dd>
        </dl>        
        <input type="submit" value="Dodaj">


    </form>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>