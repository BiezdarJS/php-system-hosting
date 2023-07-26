
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


<?php  require_login();  ?>

<?php
  $string = explode("/",($_SERVER["REQUEST_URI"])); 
    $id = $string[3];
     if(!isset($id)) {
      redirect_to(url_for('/serwery'));
    }
?>


<?php

    $server = Server::find_by_id($id);
?>


<?php if (is_post_request()) {

    $server->delete();
    redirect_to(url_for('/serwery'));


} else {


?>


    <form method="post" action="<?php echo url_for('/serwery/usun/' . h(u($id))); ?>">


    <dl>
        <dt>Nazwa serwera</dt>
        <dd>
            <?php echo $server->server_name; ?>
        </dd>
    </dl>
    <dl>
        <dt>Data Wygaśnięcia: </dt>
        <dd>
            <?php echo $server->expiry_date; ?>
        </dd>
    </dl>
<dl>
    <dt>Operator serwera</dt>
    <dd>
        <?php echo $server->server_operator; ?>
    </dd>
</dl>    
<dl>
    <dt>Notatka</dt>
    <dd>
        <?php echo $server->note; ?>
    </dd>
</dl>    
<dl>
    <dt>Cena</dt>
    <dd>
        <?php echo $server->price; ?>
    </dd>
</dl>    
<dl>
    <dt>Klient</dt>
    <dd>
        <?php echo $server->client_name; ?>
    </dd>
</dl>    



<button type="submit">Usuń</button>


</form>

<?php } ?>

<?php include(SHARED_PATH . '/panel-footer.php'); ?>