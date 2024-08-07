<?php


// Funktion zum Auslösen des Bluescreens
function bluescreen($error_code, $reason, $copyowner, $copyowner_url)
{
    // Pfade zu den Header- und Footer-Dateien
    $header_path = 'engine/error/pages/bluescreen-head.html';
    $footer_path = 'engine/error/pages/bluescreen-bottom.html';

    // Header und Footer aus den Dateien laden
    $header = file_get_contents($header_path);
    $footer = file_get_contents($footer_path);

    // Hier implementierst du den Code für den Bluescreen
    // Zum Beispiel:
    echo $header;
    echo '<span jsselect="heading" jsvalues=".innerHTML:msg" jstcache="14">\'oOPlay\' hat einen Serverfehler verursacht</span>';
    echo '<a id="error-information-button" class="hidden" onclick="toggleErrorInformationPopup();" jstcache="0"></a>';
    echo '</h1>';
    echo '<p jsselect="summary" jsvalues=".innerHTML:msg" jstcache="3"><b><u>SERVER-Exception: ' . htmlspecialchars($reason) . '</u></b><br><br>Erklärung: \'oOPlay\' hat mit der Methode \'required\' auf ein nicht existentes Dokument auf diesem Server verwiesen. Der Server konnte diese Anfrage nicht verarbeiten und hat den Vorgang abgebrochen.<br><br>';
    echo '<br><br>Navigieren Sie zur vorherigen Seite zurück. Wenn das Problem weiterhin besteht, informieren Sie den Serverbetreiber (<a href="' . htmlspecialchars($copyowner_url) . '" target="_blank">' . htmlspecialchars($copyowner) . '</a>). </p>';
    echo $footer;
    exit;
}


// Lade den Inhalt der ver.php-Datei und suche nach Variablenzuweisungen
$ver_content = file_get_contents('engine/ver.php');
$matches = [];

// Suche nach Variablenzuweisungen im Format "$variablename = 'value';"
preg_match_all('/\$(\w+)\s*=\s*[\'"]([^\'"]+)[\'"];/i', $ver_content, $matches);

// Extrahiere die Variablennamen und -werte
$variables = array_combine($matches[1], $matches[2]);

// Prüfe, ob die zugehörigen Dateien existieren
$files = [
    'engine/error/centralerrorlog_c.php',
    'engine/checks/compatcheck.php',
    'engine/checks/subdomaincheck.php',
    'engine/checks/offlinehandler.php',
];

foreach ($files as $file) {
    if (!file_exists($file)) {
        // Wenn eine Datei fehlt, rufe die Bluescreen-Funktion auf und übergebe den Serverbetreiber und die URL
        bluescreen(404, "File not found: $file", $variables['copyowner'], $variables['copyowner_url']);
    }
}

// Überprüfen, ob die URL-Parameter für mindestens eine Wiedergabe-Erweiterung vorhanden sind
$lfmstream = isset($_GET['lfmstream']) ? $_GET['lfmstream'] : '';
$webstream = isset($_GET['webstream']) ? $_GET['webstream'] : '';

// Speichere die Parameter in einem Array
$streams = [$lfmstream, $webstream];

// Überprüfe, ob alle Parameter leer oder nicht vorhanden sind
$allEmpty = true;
foreach ($streams as $stream) {
    if (!empty($stream)) {
        $allEmpty = false;
        break;
    }
}



// Wenn alle Parameter leer sind oder fehlen, wird der Seiteninhalt durch "nomedia.html" ersetzt
if ($allEmpty) {
    include('engine/error/pages/nomedia.html');
    exit;
}

// EXTENSIONS-LOADER
$extensions_credits = "<div><div class='card' >";
require('engine/extensions/ext-loader.php');

// Veraltete Erkennungsmethode
// Setzen des playermode basierend auf den URL-Parametern
//$playermode = '';
//if (!empty($lfmstream)) {
//    $playermode = 'laut';
//} elseif (!empty($webstream)) {
//    $playermode = 'webstream';
//}



///////////////// EXTENSIONS



// START > WEBAPI
if ($playermode === 'web') {
        require('engine/webapi.php');
    }

// ENDE > WEBAPI
?>