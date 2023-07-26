
    <?php require __DIR__ . './../../private/initialize.php'; ?>


    <?php  require_login();  ?>

    <?php include(SHARED_PATH . '/panel-header.php'); ?>



     <?php if (is_post_request()) {

        
        $args = $_POST['domain'];

        $domain = new Domain($args);

        $result = $domain->save();

        if($result) {
            redirect_to(url_for('/domeny'));
        } else {
            // show errors
        }


    
     } ?>


    
    <form class="form_new" method="post" action="<?php echo url_for('/domeny/dodaj'); ?>">
        <h2>Nowa Domena :</h2>

        <?php echo display_errors($domain->errors); ?>
        <dl>
            <dt>Nazwa Domeny:</dt>
            <dd>
                <input id="domain_name" type="text" name="domain[domain_name]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Data Wygaśnięcia:</dt>
            <dd>
                <input id="expiry_date" type="date" name="domain[expiry_date]" value="">
            </dd>
        </dl>
        <dl>
            <dt>Operator Domeny:</dt>
            <dd>
                <input id="domain_operator" type="text" name="domain[domain_operator]" value="">
            </dd>
        </dl> 
        <dl>
            <dt>Notatka:</dt>
            <dd>
                <input id="note" type="text" name="domain[note]" value="">
            </dd>
        </dl>         
        <dl>
            <dt>Cena:</dt>
            <dd>
                <input id="price" type="text" name="domain[price]" value="">
            </dd>
        </dl>                 
        <dl>
          <dt>Klient</dt>
          <dd><input type="client_name" name="domain[client_name]" value="" /></dd>
        </dl>        
        <input type="submit" value="Dodaj">


    </form>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>