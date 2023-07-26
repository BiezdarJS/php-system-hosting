
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





<?php $domain = Domain::find_by_id($id); ?>




<?php if (is_post_request()) { 


        $args = [];
        $args['id'] = $id;
        $args['domain_name'] = $_POST['domain_name'] ? $_POST['domain_name'] : '';
        $args['expiry_date'] = $_POST['expiry_date'] ? $_POST['expiry_date'] : '';
        $args['domain_operator'] = $_POST['domain_operator'] ? $_POST['domain_operator'] : '';
        $args['note'] = $_POST['note'] ? $_POST['note'] : '';
        $args['price'] = $_POST['price'] ? $_POST['price'] : '';
        $args['client_name'] = $_POST['client_name'] ? $_POST['client_name'] : '';        



        $domain->merge_attributes($args);

        $domain->save();


        redirect_to(url_for('/domeny'));

 } else { ?>




<form method="post" action="<?php echo url_for('/domeny/edytuj/' . h(u($id))); ?>">
    <h2>Edytuj :</h2>
    <dl>
        <dt>Nazwa Domeny:</dt>
        <dd>
            <input id="domain_name" type="text" name="domain_name" value="<?php echo h($domain->domain_name); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Data wygaśnięcia:</dt>
        <dd>
            <input id="expiry_date" type="text" name="expiry_date" value="<?php echo h($domain->expiry_date); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Operator Doemny:</dt>
        <dd>
            <input id="domain_operator" type="text" name="domain_operator" value="<?php echo $domain->domain_operator; ?>">
        </dd>
    </dl> 
    <dl>
        <dt>Notatka:</dt>
        <dd>
            <input id="note" type="text" name="note" value="<?php echo h($domain->note); ?>">
        </dd>
    </dl>         
    <dl>
        <dt>Cena:</dt>
        <dd>
            <input id="price" type="text" name="price" value="<?php echo h($domain->price); ?>">
        </dd>
    </dl>         
    <dl>
        <dt>Klient:</dt>
        <dd>
            <input id="client_name" type="text" name="client_name" value="<?php echo h($domain->client_name); ?>">
        </dd>
    </dl>             
    <input type="submit" value="Edytuj">
</form>




<?php } ?>




<?php include(SHARED_PATH . '/panel-footer.php'); ?>


