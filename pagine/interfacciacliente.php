<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/ManagerDB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Utente.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Sito.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Sensore.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Rilevazione.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Tipo.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/ManagerRilevazioni.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneCliente.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneSito.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneSensore.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneTipo.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/ManagerRilevazioni.php';

function mostraRilevazioni()
{
    $db = ManagerDB::getInstance();
    $utente = new Utente();
    $sensore = new Sensore();
    $tipo = new Tipo();
    $amministrazioneSito = new AmministrazioneSito($db);
    $amministratoreSensore = new AmministrazioneSensore($db);
    $managerRilevazioni = new ManagerRilevazioni($db);
    $amministrazioneTipo = new AmministrazioneTipo($db);
    $lista_siti = $amministrazioneSito->trovaSito((int)$_SESSION['UTENTE']["ID"]);
    if (!isset($_GET['azione']) || $_GET['azione'] == 'mostrasiti') {
        ?>

        <center><h1>Siti</h1></center>
        <hr>
        <table class="table table-striped table-condensed table-hover table-responsive" style="background-color:white">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Grandezza</th>
                <th>Località</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (!count($lista_siti) == 0) {
                foreach ($lista_siti as $sito) { ?>
                    <tr>
                        <td><a class="btn" id="<?= $sito->__get("ID") ?>"
                               href='index.php?action=areaclienti&azione=mostrasensori&IDSito=<?= $sito->__get("ID") ?>'> <?= $sito->__get("Nome") ?></a>
                        </td>
                        <td> <?= $sito->__get('Grandezza') ?></td>
                        <td><?= $sito->__get('Localita') ?> </td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    <?php } else {
        if ($_GET['azione'] == 'mostrasensori') {
            $sensori = $amministratoreSensore->trovaSensore($_GET['IDSito']);
            ?>
            <center><h1>Sensori</h1></center>
            <hr>
            <table class="table table-striped table-condensed table-hover table-responsive" style="background-color:white">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (!count($sensori) == 0) {
                    foreach ($sensori as $sensore) { ?>
                        <tr>
                            <td><a class="btn" id="<?= $sensore->__get("ID") ?>"
                                   href='index.php?action=areaclienti&azione=mostrarilevazioni&IDSensore=<?= $sensore->__get("ID") ?>'> <?= $sensore->__get("ID") ?></a>
                            </td>
                            <td><?= $sensore->__get('Marca') ?></td>
                            <td><?= $sensore->__get('Tipo') ?></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>

            <?php
        }

        if ($_GET['azione'] == 'mostrarilevazioni') {
            $rilevazioni = $managerRilevazioni->getRilevazioni($_GET['IDSensore']);
            $tipo = $amministrazioneTipo->getTipo($_GET['IDSensore']);
            $dati_contenuti = $tipo[0]->__get("DatiContenuti");
            $header = str_getcsv($dati_contenuti, ";");
            ?>
            <center><h1>Rilevazioni del sensore <?= htmlspecialchars($_GET['IDSensore']) ?></h1></center>
            <hr>
            <table class="table table-striped table-condensed table-hover table-responsive" style="background-color:white">
                <thead>
                <tr>
                    <th>Descrizione Messaggio</th>
                    <?php
                    foreach ($header as $elemento) { ?>
                        <th>
                            <?= $elemento ?>
                        </th>
                    <?php } ?>

                </tr>
                </thead>
                <tbody>

                <?php
                if (!count($rilevazioni) == 0) {
                    foreach ($rilevazioni as $rilevazione) {
                        ?>
                        <tr>
                            <td><?= $rilevazione->__get("DescrizioneRilevazione"); ?></td>
                            <?php
                            $messaggio_scomposto = $managerRilevazioni->scomponiRilevazione($rilevazione->__get("Messaggio"));
                            foreach ($messaggio_scomposto as $cella) {
                                ?>
                                <td><?= $cella ?></td>
                            <?php }
                            ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
            <?php
        }
    }

}
mostraRilevazioni();
?>
