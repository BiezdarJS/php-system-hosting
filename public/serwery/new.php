
    <?php require __DIR__ . './../../private/initialize.php'; ?>


    <?php  require_login();  ?>

    <?php include(SHARED_PATH . '/panel-header.php'); ?>



     <?php if (is_post_request()) {

        
        $args = $_POST['server'];

        $server = new Server($args);

        $result = $server->save();

        if($result) {
            redirect_to(url_for('/serwery'));
        } else {
            // show errors
        }


    
     } ?>


    
    <form class="form_new" method="post" action="<?php echo url_for('/serwery/dodaj'); ?>">
        <h2>Nowy Serwer :</h2>

        <?php echo display_errors($server->errors); ?>
        <dl>
            <dt>Nazwa serwera:</dt>
            <dd>
                <input id="server_name" type="text" name="server[server_name]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Data Wygaśnięcia:</dt>
            <dd>
                <input id="expiry_date" type="date" name="server[expiry_date]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Operator serwera:</dt>
            <dd>
                <input id="server_operator" type="text" name="server[server_operator]" value="">
            </dd>
        </dl> 
        <dl>
            <dt>Notatka:</dt>
            <dd>
                <input id="note" type="text" name="server[note]" value="">
            </dd>
        </dl>         
        <dl>
            <dt>Cena:</dt>
            <dd>
                <input id="price" type="text" name="server[price]" value="">
            </dd>
        </dl>                 
        <dl>
          <dt>Klient</dt>
          <dd><input type="client_name" name="server[client_name]" value="" /></dd>
        </dl>        
        <input type="submit" value="Dodaj">


    </form>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>