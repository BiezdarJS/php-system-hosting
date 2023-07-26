
<?php require __DIR__ . './../private/initialize.php';

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Pole nazwy użytkownika nie może być puste.";
  }
  if(is_blank($password)) {
    $errors[] = "Pole hasła nie może być puste.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Admin::find_by_username($username);
    $login_failure_msg = "Logowanie nie przebiegło pomyślnie - spróbuj ponownie.";
    // test if admin found and password is correct
    if($admin != false && $admin->verify_password($password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to(url_for('./'));
    } else {
      // username not found or password does not match
      $errors[] = $login_failure_msg;
    }

  } else {
    $errors[] = $login_failure_msg;
  }

}

?>


<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/panel-header.php'); ?>




<div class="login-form" id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="<?php echo url_for('/logowanie'); ?>" method="post">
    Nazwa Użytkownika:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br /><br />
    Hasło:<br />
    <input type="password" name="password" value="" /><br /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>
      
</div>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>