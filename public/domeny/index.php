
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php require_login();  ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


    <div class="container">
    
         <a class="new-admin" href="<?php echo url_for('/domeny/dodaj'); ?>">Dodaj domenę</a>
    
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>nazwa domeny</td>
                <td>data wygaśnięcia</td>
                <td>operator domeny</td>
                <td>notatka </td>
                <td>Cena</td>
                <td>Klient</td>
                <td>Edytuj</td>
                <td>Usuń</td>                
            </tr>
        </thead>
        <tbody>


            <?php $domains = Domain::find_all(); ?>

                <?php foreach($domains as $domain) { ?>

                    <tr>
                        <td>
                            <?php echo $domain->id; ?>
                        </td>
                        <td>
                            <?php echo $domain->domain_name; ?>
                        </td>
                        <td>
                            <?php echo $domain->expiry_date; ?>
                        </td>
                        <td>
                            <?php echo $domain->domain_operator; ?>
                        </td>
                        <td>
                            <?php echo $domain->note; ?>
                        </td>
                        <td>
                            <?php echo $domain->price; ?>
                        </td>
                        <td>
                            <?php echo $domain->client_name; ?>
                        </td>                                                
                        <td>
                            <a href="<?php echo url_for('/domeny/edytuj/' . h(u($domain->id))); ?>">Edytuj</a>
                        </td>
                        <td>
                            <a href="<?php echo url_for('/domeny/usun/' . h(u($domain->id))); ?>">Usuń</a>
                        </td>                        
                    </tr>
            <?php } ?>


        </tbody>
    </table>


    </div>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>