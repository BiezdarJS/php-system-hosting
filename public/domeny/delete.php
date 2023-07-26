
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


<?php  require_login();  ?>

<?php
  $string = explode("/",($_SERVER["REQUEST_URI"])); 
    $id = $string[3];
     if(!isset($id)) {
      redirect_to(url_for('/domeny'));
    }
?>


<?php

    $domain = Domain::find_by_id($id);
?>


<?php if (is_post_request()) {

    $domain->delete();
    redirect_to(url_for('/domeny'));


} else {


?>


    <form method="post" action="<?php echo url_for('/domeny/usun/' . h(u($id))); ?>">


    <dl>
        <dt>Nazwa domeny</dt>
        <dd>
            <?php echo $domain->domain_name; ?>
        </dd>
    </dl>
    <dl>
        <dt>Data Wygaśnięcia: </dt>
        <dd>
            <?php echo $domain->expiry_date; ?>
        </dd>
    </dl>
<dl>
    <dt>Operator Domeny</dt>
    <dd>
        <?php echo $domain->domain_operator; ?>
    </dd>
</dl>    
<dl>
    <dt>Notatka</dt>
    <dd>
        <?php echo $domain->note; ?>
    </dd>
</dl>    
<dl>
    <dt>Cena</dt>
    <dd>
        <?php echo $domain->price; ?>
    </dd>
</dl>    
<dl>
    <dt>Klient</dt>
    <dd>
        <?php echo $domain->client_name; ?>
    </dd>
</dl>    



<button type="submit">Usuń</button>


</form>

<?php } ?>

<?php include(SHARED_PATH . '/panel-footer.php'); ?>