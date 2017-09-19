<?php
    session_start();
    if ($_SESSION['UTENTE']['isAdmin'] == 0) {
        echo 'Non hai i privilegi per accedere a questa pagina.';
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/ManagerDB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Utente.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Sito.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Sensore.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Tipo.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneCliente.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneSito.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneSensore.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/AmministrazioneTipo.php';

function gestisciClienti() {
    $db = ManagerDB::getInstance();
    $amministrazioneCliente = new AmministrazioneCliente($db);
    $lista_utenti = $amministrazioneCliente->trovaClienti();

    $header_tabella = array('Nominativo', 'Residenza', 'Luogo di nascita', 'Data di nascita', 'Sesso', 'Numero di telefono', 'Codice fiscale', 'Email');

    // Stampa intestazione
    ?><tr><?php
    foreach($header_tabella as $value) {?>
        <td><?=$value?></td>
    <?php }?>
    </tr></thead><tbody>
<?php
    if (!count($lista_utenti) == 0) {
        foreach ($lista_utenti as $utente) { ?>
            <tr><td>
            <a href="index.php?action=pannelloamministratore&section=Siti&azione=mostrasiti&IDCliente=<?= $utente->__get("ID") ?>"  class="btn"> <?= $utente->__get("Nome") ?> <?= $utente->__get("Cognome") ?> </a></td>
            <td> <?= $utente->__get('Residenza') ?></td>
            <td> <?= $utente->__get('LuogoDiNascita') ?></td>
            <td> <?= $utente->__get('DataDiNascita') ?> </td>
            <td> <?= $utente->__get('Sesso') ?></td>
            <td><?= $utente->__get('NumeroDiTelefono') ?></td>
            <td> <?= $utente->__get('CodiceFiscale') ?></td>
            <td> <?= $utente->__get('Email') ?></td>
            </tr>
        <?php
        }

    }?>
    </tbody></table>
<?php
}

function gestisciSiti() {
    $db = ManagerDB::getInstance();
    $amministrazioneSito = new AmministrazioneSito($db);
    $lista_siti = $amministrazioneSito->trovaSito((int)$_GET['IDCliente']);
    $header_tabella = array("Nome", "Grandezza", "Località");
    // Stampa intestazione
    ?><tr><?php
    foreach($header_tabella as $value) {?>
        <td><?=$value?></td>
    <?php }?>
    </tr></thead><tbody>
    <?php
    if (!count($lista_siti) == 0) {
        foreach ($lista_siti as $sito) { ?>
            <tr><td><a class="btn" id="<?=$sito->__get("ID")?>" href='index.php?action=pannelloamministratore&section=Sensori&azione=mostrasensori&IDSito=<?= $sito->__get("ID") ?>'> <?=$sito->__get("Nome")?></a></td>
                <td> <?= $sito->__get('Grandezza') ?></td>
                <td><?=$sito->__get('Localita') ?> </td>
            </tr>
            <?php
        }
    }?>

    </tbody></table>
<?php
}

function gestisciSensori() {
    $db = ManagerDB::getInstance();
    $amministrazioneSensore = new AmministrazioneSensore($db);
    $amministrazioneTipo = new AmministrazioneTipo($db);
    $lista_sensori = $amministrazioneSensore->trovaSensore((int)$_GET['IDSito']);
    $header_tabella = array("ID", "Marca", "Tipo");

    // Stampa intestazione
    ?><tr><?php
    foreach($header_tabella as $value) {?>
        <td><?=$value?></td>
    <?php }?>
    </tr></thead><tbody>
    <?php
    if (!count($lista_sensori) == 0) {
        foreach ($lista_sensori as $sensore) { ?>
            <tr><td><a class="btn" id="<?=$sensore->__get("ID")?>" href=''> <?=$sensore->__get("ID")?></a></td>
                <td> <?= $sensore->__get('Marca') ?></td>
                <td><?=$sensore->__get('Tipo') ?> </td>
            </tr>
            <?php
        }
    }?>

    </tbody></table>
    <?php
    return $amministrazioneTipo->getTipo();
}


function gestisciTipiSensore() {
    $db = ManagerDB::getInstance();
    $amministrazioneTipo = new AmministrazioneTipo($db);
    $lista_tipi = $amministrazioneTipo->getTipo();
    $header_tabella = array("Nome", "Dati Contenuti", "Posizione");

// Stampa intestazione
?><tr><?php
    foreach($header_tabella as $value) {?>
        <td><?=$value?></td>
    <?php }?>
</tr></thead><tbody>

    <?php
    if (!count($lista_tipi) == 0) {
        foreach ($lista_tipi as $tipo) { ?>
            <tr>
                <td> <?= $tipo->__get('Nome')  ?></td>
                <td><?= $tipo->__get('DatiContenuti')  ?></td>
                <td><?=$tipo->__get('Posizione') ?> </td>
            </tr>
            <?php
        }
    }?>

    </tbody></table>
    <?php
}

?>
<div class = "form-group col-md-12" style = "left : 4%;">
    <ul id="profilo" class="list-group">
        <li class="list-group-item">
            <h3 style="color:darkred; margin-top:1%">Pannello d'amministrazione</h3>
            <small>Gestisci i tuoi clienti, i loro siti e i relativi sensori.</small>
            <br>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tab_pannello">
                <li role="presentation" class="active">
                    <a href="" role="tab" data-toggle="tab">
                    <?php
                        if (isset($_GET['section']))
                            echo htmlspecialchars($_GET['section']);
                        else
                            echo 'Clienti';
                    ?>
                    </a>
                </li>
                <li role="presentation" class="active">
                    <button style='margin-top:3px' type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="
                    <?php
                        if (isset($_GET['section']))
                            echo htmlspecialchars(trim('#aggiungi_'.$_GET['section']));
                        else
                            echo htmlspecialchars(trim("#aggiungi_Cliente")) ;
                    ?>
                    "><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Aggiungi</button>
                </li>
            </ul>
        </li>
        <li class="list-group-item col-md-12 col-lg-12" style="border-top:none;">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active">
                    <table class="table table-striped table-condensed table-hover table-responsive" style="background-color:white">
                        <thead>
                        <?php

                        $db = ManagerDB::getInstance();
                        $amministrazioneCliente = new AmministrazioneCliente($db);
                        $amministrazioneSito = new AmministrazioneSito($db);
                        $amministrazioneSensore = new AmministrazioneSensore($db);
                        $amministrazioneTipo = new AmministrazioneTipo($db);
                        $sito = new Sito();
                        $utente = new Utente();
                        $sensore = new Sensore();
                        $tipo = new Tipo();
                        if (isset($_GET['section'])) {
                                switch ($_GET['section']) {
                                    case "Cliente":
                                            switch($_GET['azione']) {
                                                // Gestione degli utenti
                                                case "aggiungicliente":
                                                    foreach ($_POST as $key => $value) {
                                                        $utente->__set($key, $value);
                                                    }
                                                    $result = $amministrazioneCliente->aggiungiCliente($utente);
                                                    if ($result == -1)?>
                                                        <span style='color:red'>Errore nell'inserimento dati.</span>
                        <?php
                                                    gestisciClienti();
                                                    break;
                                                case "modificacliente":
                                                    foreach ($_POST as $key => $value) {
                                                        $utente->__set($key, $value);
                                                    }
                                                    $amministrazioneCliente->aggiungiCliente($utente);
                                                    break;
                                                case "eliminautente":
                                                    $amministrazioneCliente->eliminaCliente($_POST['ID']);
                                                    break;
                                                case "mostraclienti":
                                                default:
                                                    $lista_utenti = $amministrazioneCliente->trovaClienti();
                                                    gestisciClienti();
                                                    break;
                                            }
                                    break;
                                    // Gestione dei siti
                                    case "Siti":
                                            switch($_GET['azione']) {
                                                case "aggiungisito":
                                                    foreach ($_POST as $key => $value) {
                                                        $sito->__set($key, $value);
                                                    }
                                                    $amministrazioneSito->aggiungiSito($sito);
                                                    gestisciSiti();
                                                    break;
                                                case "mostrasiti":
                                                default:
                                                    gestisciSiti();
                                                    break;
                                            }
                                        break;
                                    // Gestione dei sensori
                                    case "Sensori":
                                        switch($_GET['azione']) {
                                            case "aggiungisensore":
                                                foreach ($_POST as $key => $value) {
                                                    $sensore->__set($key, $value);
                                                }
                                                $amministrazioneSensore->aggiungiSensore($sensore);
                                                $_SESSION['tipi'] = gestisciSensori();
                                                break;
                                            case "mostrasensori":
                                            default:
                                                $_SESSION['tipi'] = gestisciSensori();

                                                break;
                                        }
                                        break;
                                    // Gestione dei tipi
                                    case "Tipi":
                                        switch($_GET['azione']) {
                                            case "aggiungitipo":
                                                foreach ($_POST as $key => $value) {
                                                    $tipo->__set($key, $value);
                                                }
                                                $amministrazioneTipo->aggiungiTipo($tipo);
                                                gestisciTipi();
                                                break;
                                            case "mostratipi":
                                            default:
                                                gestisciTipi();
                                                break;
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            } else {
                                $amministrazioneCliente->trovaClienti();
                                gestisciClienti();
                            }
                        ?>
                </div>
        </li>
    </ul>
</div>


<!-- Modal -->
<div class="modal fade" id="aggiungi_Cliente" tabindex="-1" role="dialog" aria-labelledby="aggiungi_Cliente" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aggiungi cliente</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "post" action="index.php?action=pannelloamministratore&section=Cliente&azione=aggiungicliente">
                    <div class="form-group" id="div_nome">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nome" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="div_descrizione">
                        <label for="descrizione" class="col-sm-2 control-label">Cognome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Cognome" placeholder=""></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_luogonascita">
                        <label for="quantita" class="col-sm-2 control-label">Luogo di nascita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="LuogoDiNascita" placeholder="Bari"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_datadinascita">
                        <label for="quantita" class="col-sm-2 control-label">Data di nascita</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="DataDiNascita" placeholder="03/05/1996"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_residenza">
                        <label for="quantita" class="col-sm-2 control-label">Residenza</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Residenza" placeholder="Bari"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_sesso">
                        <label for="data" class="col-sm-2 control-label">Sesso</label>
                        <div class="col-sm-4">
                            <select name="Sesso">
                                <option id="M">M</option>
                                <option id="F">F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="div_numeroditelefono">
                        <label for="quantita" class="col-sm-2 control-label">Numero di telefono</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="NumeroDiTelefono" placeholder="3391358719"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_codicefiscale">
                        <label for="quantita" class="col-sm-2 control-label">Codice fiscale</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="CodiceFiscale" placeholder="PSCGRL39A03A662Q"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_email">
                        <label for="quantita" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="Email" placeholder="admin@info.it"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_password">
                        <label for="quantita" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="Password" placeholder=""></input>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="aggiungi_Siti" tabindex="-1" role="dialog" aria-labelledby="aggiungi_Siti" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aggiungi sito</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "post" action="index.php?action=pannelloamministratore&section=Siti&IDCliente=<?php echo $_GET['IDCliente'] ?>&azione=aggiungisito">
                    <input type="hidden" name="IDCliente" value="<?php echo $_GET['IDCliente'] ?>">
                    <div class="form-group" id="div_nome">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nome" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="div_descrizione">
                        <label for="descrizione" class="col-sm-2 control-label">Grandezza (m*m)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Grandezza" placeholder=""></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_luogonascita">
                        <label for="quantita" class="col-sm-2 control-label">Località</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Localita" placeholder="Bari"></input>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="aggiungi_Sensori" tabindex="-1" role="dialog" aria-labelledby="aggiungi_Sensori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aggiungi sensore</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "post" action="index.php?action=pannelloamministratore&section=Sensori&IDSito=<?php echo $_GET['IDSito'] ?>&azione=aggiungisensore">
                    <input type="hidden" name="IDSito" value="<?php echo $_GET['IDSito'] ?>">
                    <div class="form-group" id="div_descrizione">
                        <label for="descrizione" class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="ID" placeholder=""></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_luogonascita">
                        <label for="quantita" class="col-sm-2 control-label">Marca</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Marca" placeholder="Bari"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_tipo">
                        <label for="quantita" class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="Tipo">
                                <?php
                                    foreach($_SESSION['tipi'] as $tipo) {
                                        ?>
                                        <option value='<?=$tipo->__get("ID")?>'><?=$tipo->__get("Nome")?></option>
                                   <?php }?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="aggiungi_Tipi" tabindex="-1" role="dialog" aria-labelledby="aggiungi_Tipi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aggiungi tipo</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "post" action="index.php?action=pannelloamministratore&section=Tipi&azione=aggiungitipo">
                    <div class="form-group" id="div_nome">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nome" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="div_descrizione">
                        <label for="descrizione" class="col-sm-2 control-label">Dati (formato CSV) (m*m)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Grandezza" placeholder=""></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_luogonascita">
                        <label for="quantita" class="col-sm-2 control-label">Posizione (Dato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Localita" placeholder="Bari"></input>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
            </form>
        </div>
    </div>
</div>