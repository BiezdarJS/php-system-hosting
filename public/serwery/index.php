
<?php require __DIR__ . './../../private/initialize.php'; ?>


<?php require_login();  ?>


<?php include(SHARED_PATH . '/panel-header.php'); ?>


    <div class="container">
    
         <a class="new-admin" href="<?php echo url_for('/serwery/dodaj'); ?>">Dodaj serwer</a>
    
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>nazwa serwera</td>
                <td>data wygaśnięcia</td>
                <td>operator serwera</td>
                <td>notatka </td>
                <td>Cena</td>
                <td>Klient</td>
                <td>Edytuj</td>
                <td>Usuń</td>                
            </tr>
        </thead>
        <tbody>


            <?php $servers = Server::find_all(); ?>

                <?php foreach($servers as $server) { ?>

                    <tr>
                        <td>
                            <?php echo $server->id; ?>
                        </td>
                        <td>
                            <?php echo $server->server_name; ?>
                        </td>
                        <td>
                            <?php echo $server->expiry_date; ?>
                        </td>
                        <td>
                            <?php echo $server->server_operator; ?>
                        </td>
                        <td>
                            <?php echo $server->note; ?>
                        </td>
                        <td>
                            <?php echo $server->price; ?>
                        </td>
                        <td>
                            <?php echo $server->client_name; ?>
                        </td>                                                
                        <td>
                            <a href="<?php echo url_for('/serwery/edytuj/' . h(u($server->id))); ?>">Edytuj</a>
                        </td>
                        <td>
                            <a href="<?php echo url_for('/serwery/usun/' . h(u($server->id))); ?>">Usuń</a>
                        </td>                        
                    </tr>
            <?php } ?>


        </tbody>
    </table>


    </div>


<?php include(SHARED_PATH . '/panel-footer.php'); ?>