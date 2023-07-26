
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





<?php $server = Server::find_by_id($id); ?>




<?php if (is_post_request()) { 


        $args = [];
        $args['id'] = $id;
        $args['server_name'] = $_POST['server_name'] ? $_POST['server_name'] : '';
        $args['expiry_date'] = $_POST['expiry_date'] ? $_POST['expiry_date'] : '';
        $args['server_operator'] = $_POST['server_operator'] ? $_POST['server_operator'] : '';
        $args['note'] = $_POST['note'] ? $_POST['note'] : '';
        $args['price'] = $_POST['price'] ? $_POST['price'] : '';
        $args['client_name'] = $_POST['client_name'] ? $_POST['client_name'] : '';        



        $server->merge_attributes($args);

        $server->save();


        redirect_to(url_for('/serwery'));

 } else { ?>




<form method="post" action="<?php echo url_for('/serwery/edytuj/' . h(u($id))); ?>">
    <h2>Edytuj :</h2>
    <dl>
        <dt>Nazwa serwery:</dt>
        <dd>
            <input id="server_name" type="text" name="server_name" value="<?php echo h($server->server_name); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Data wygaśnięcia:</dt>
        <dd>
            <input id="expiry_date" type="text" name="expiry_date" value="<?php echo h($server->expiry_date); ?>">
        </dd>
    </dl>
    <dl>
        <dt>Operator Doemny:</dt>
        <dd>
            <input id="server_operator" type="text" name="server_operator" value="<?php echo $server->server_operator; ?>">
        </dd>
    </dl> 
    <dl>
        <dt>Notatka:</dt>
        <dd>
            <input id="note" type="text" name="note" value="<?php echo h($server->note); ?>">
        </dd>
    </dl>         
    <dl>
        <dt>Cena:</dt>
        <dd>
            <input id="price" type="text" name="price" value="<?php echo h($server->price); ?>">
        </dd>
    </dl>         
    <dl>
        <dt>Klient:</dt>
        <dd>
            <input id="client_name" type="text" name="client_name" value="<?php echo h($server->client_name); ?>">
        </dd>
    </dl>             
    <input type="submit" value="Edytuj">
</form>




<?php } ?>




<?php include(SHARED_PATH . '/panel-footer.php'); ?>


