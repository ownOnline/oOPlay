<?php
// init page
 require('engine/init.php');

// setvariab

?>















<!----------------------------------------------- PLAYER-PAGE-BASE ------------------------------------->


<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="rscs/favicons/favicon.png">
    <link rel="apple-touch-icon" href="rscs/favicons/apple-touch-icon.png">
    
<link rel="stylesheet" href="engine/style/styles.css">
<link rel="stylesheet" href="engine/style/conveyor.css">
<link rel="stylesheet" href="engine/style/loader.min.css">

<meta property="og:site_name" content="oOPlay von OwnOnline" />
<meta property="og:image" content="rscs/favicons/apple-touch-icon.png" />



<!----------------------------------------------- UITHEMEHANDLER ------------------------------------->
<?php require('engine/style/uithemehandler.php');?>


<!--- ICONLIBLOADER ------->
<!-- Füge ein unsichtbares iframe-Element hinzu, das die iconlibloader.php-Datei aufruft -->
<link rel="stylesheet" href="engine/style/iconlib.css">








</head>
<body id="oop_body">
<!-- <div class="loader-body" id="loader">
	<div class="loader"></div>
</div> -->

<oop_div id="oop_base-container" class="container-fluid">
    
<?php
    require('engine/extensions/' . $playermode . '/topnavbar.php');
?>
    
  
    
    
 <!---------------------------- PLAYER PLAYER PLAYER MAIN PLAYER -------------------->   

          
 <div id="blurlayer" > 
 </div>   
    <oop_div id="oop_player" class="position-absolute top-50 start-50 translate-middle" style="overflow:hidden; width:90%; padding: 1em;">
          
    
    <?php

    require('engine/extensions/' . $playermode . '/playerui.php');

?>


           
               

         

        <audio id="oop_audio" preload="none" volume="0.3">
            <source src="<?php echo htmlspecialchars($streamUrl); ?>" type="audio/mpeg">
            It seems your browser does not support the audio element. Consider Help on the Web or contact the oOPlay-Developer on <a href="https://github.com/ownOnline/oOPlay/">GitHub</a>.
</audio>
        
 
 
 
 
 
       
        <div id="oop_player-controls text-center" class="btn-group" role="group" aria-label="Basic example" style=" width:90%">
         
         <!-- <button onclick="document.getElementById('oop_audio').pause()">Pause</button> -->
           
           <!-- <button onclick="document.getElementById('oop_audio').volume += 0.1">Vol +</button> 
            <button onclick="document.getElementById('oop_audio').volume -= 0.1">Vol -</button> -->
          
</div>
    </oop_div>
    
    <?php
    require('engine/extensions/' . $playermode . '/playermodals.php');
?>



<!---------------------------- LABOUT OOP MODAL -------------------->


<div class="modal fade" id="about_oop_modal" tabindex="-1" aria-labelledby="about_oop_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
     <!--<div class="modal-header">
         <h5 class="modal-title" sytle="display: inline; " id="exampleModalLabel"> <?php echo $lang['about_modal_title']; ?> </h5>
         <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div> -->
      <div class="modal-body">
     
            <?php require('engine/ver.php');?>
            <br><br>
            <button type="button" class="btn btn-outline-danger bg-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> <?php echo $lang['close']; ?></button>
      </div>
    </div>
  </div>
</div>


<!---------------------------- SETTINGS OOP MODAL -------------------->


<div class="modal fade" id="settings_oop_modal" tabindex="-1" aria-labelledby="settings_oop_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
     <div class="modal-header text-white bg-danger">
         <h5 class="modal-title" sytle="display: inline; " id="exampleModalLabel"> <?php echo $lang['settingspanel_modal_title']; ?></h5>
         <button type="button" class="btn btn-block btn-outline-light" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div> 
      <div class="modal-body">
     
            <?php require('engine/usersettings.php');?>
            </p>
      </div>
    </div>
  </div>
</div>


<nav id="playercontrolbar" class=" fixed-bottom navbar-dark bg-dark">
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-2 col-md" >
            <!-- Hier kommt das erste Element (20%) style="flex: 0 0 10%;" -->
            <button style="font-size: 2em;" class="btn " id="playpausebtn" onclick="playPause()" href="#">⏵</button>
            </div>
        <div class="col col-sm-8 col-md-10" >
            <!-- Hier kommt das zweite Element (60%) style="flex: 0 0 70%;" -->
            
            <label for="volume1" class="form-label"><i class="fas fa-volume-up"></i> </label>
            <input class="btn btn-block form-range " type="range" onchange="setVolume()" style="max-width: 90%;" id='volume1' min=0 max=1 step=0.01 value="0.3"/>
        </div>
        <div class="col-2 col-md" style=" margin-left: auto;">
            <!-- Hier kommt das dritte Element (20%) flex: 0 0 10%; -->
            <a id="cast" class="btn btn-success float-end" href="#" onclick="playPause()"><i class="fab fa-chromecast" style="float: right; color: #ffffff;"></i></a>
        </div>
    </div>
</div>
</nav>

<!----------------------------------------------- ENGINE NET-ERR HANDLER ----------------------------------->
<?php 
$custom_neterr = "engine/extensions/" . $playermode . "/pages/neterr.php";
$default_neterr = "engine/error/neterr.php";

if (file_exists($custom_neterr)) {
    require($custom_neterr);
} else {
    require($default_neterr);
}

?>




<!-- LOADING POST LOADING ENGINE 
<php require('engine/post-init.php');?> -->






    
<!---------------------------- LOAD ALL FPR MAINPACKAGE JS ------------------->
<!---------------------------.... LOAD boostrapbundle js ---------------------->
<script src="rscs/javascript/bootstrapbundel.js" ></script>
<!-----------------------.......-- LOAD CAST JS ---------------------------------->
 <script src="engine/castlibloader.php"></script>

 <!----------------------------------- LOAD MAINPACKAGE JS ------------------->
<script>

//////////////////////  .:.  THIS IS THE JAVASCRIPT-MAIN-PACKAGE FOR oOPlay - Last Updated on 14. Feb. 2024 18:00  by PS(oO)

//////////////////////  .:.  SET VARIABLES evtl. values (var and const)
/////////// For Cast-JS:
const cjs = new Castjs();
/////////// For the PlayerControls:
var mediaClip = document.getElementById("oop_audio").value;

</script>
<script>



//////////////////////  .:.  RUN CODE










/////////// Enable Tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

</script>

<script>
  
/////////// PlayerControls-JS:



    
window.onload = function() {
    var backgroundAudio=document.getElementById("oop_audio");
    backgroundAudio.volume=0.3;
}
    






// Event-Listener für das "error"-Ereignis des Audioelements
oop_audio.addEventListener("error", function() {
    console.log('Fehler: Der Audiostream konnte nicht geladen werden.');
    showModalAndStartInterval();
    handlePlaybackError();
    getCurrentSongInfoFromUI();
});

// Eventlistener für das 'play'-Event hinzufügen
oop_audio.addEventListener('play', function() {
  // Setze die Metadaten für die Media Session, sobald die Wiedergabe beginnt
  getCurrentSongInfoFromUI();
});

// Event-Listener für das "abort"-Ereignis des Audioelements
oop_audio.addEventListener("abort", function() {
    console.log('Audiostream abgebrochen.');
    showModalAndStartInterval();
    getCurrentSongInfoFromUI();
    // Weitere Behandlung hier
});

// Event-Listener für das "stalled"-Ereignis des Audioelements
oop_audio.addEventListener("stalled", function() {
    console.log('Audiostream konnte nicht weitergeladen werden.');
    showModalAndStartInterval();
    getCurrentSongInfoFromUI();
    // Weitere Behandlung hier
});

// Event-Listener für das Schließen des Modals
document.getElementById("neterror-container").addEventListener("hidden.bs.modal", function () {
  closeModalAndStopInterval();
});

function handlePlaybackError() {
    // Hier wird die Wiedergabe des Audiostreams neu gestartet
    oop_audio.load(); // Stoppt die Wiedergabe und lädt den Audiostream neu
    oop_audio.play(); // Startet die Wiedergabe erneut
}

</script>
<script>


    function setVolume() {
   document.getElementById("oop_audio").value = oop_audio;
   oop_audio.volume = document.getElementById("volume1").value;

}


function playPause() {
    if (oop_audio.paused) {
        oop_audio.play();   
    } else {
        oop_audio.pause();
    }
    updatePlayPauseButton();
}

function updatePlayPauseButton() {
    var playpauseb = document.getElementById("playpausebtn");
    var icon = oop_audio.paused ? "play" : "pause";

    // Lösche alle vorhandenen Kinder des Buttons
    playpauseb.innerHTML = '';

    // Erzeuge ein <i> Element für das FontAwesome-Icon
    var iconElement = document.createElement("i");

    // Setze die Klassen für das FontAwesome-Icon entsprechend dem Zustand
    iconElement.classList.add("fa"); // Füge die Klasse "fab" für das Brand-Icon-Set hinzu
    iconElement.classList.add(icon === "play" ? "fa-play" : "fa-pause"); // Wähle das entsprechende Icon

    // Setze die Farbe des Icons auf Weiß
    iconElement.style.color = "#ffffff";

    // Füge das FontAwesome-Icon dem Button hinzu
    playpauseb.appendChild(iconElement);
} 


// Event-Listener für Änderungen des Audio-Status
oop_audio.addEventListener("play", function() {
    updatePlayPauseButton();
    autoplayCheck();
    cjs.play();
});

oop_audio.addEventListener("pause", function() {
    updatePlayPauseButton();
    cjs.pause();
});

// Initialisierung des Play/Pause-Buttons
updatePlayPauseButton();

// Überprüfung des Autoplay-Status nach einer kurzen Verzögerung
setTimeout(autoplayCheck, 1000);

function autoplayCheck() {
    if (oop_audio.autoplay && oop_audio.paused) {
        oop_audio.play()
            .then(() => {
                updatePlayPauseButton();
            })
            .catch(error => {
                if (error.name === 'NotAllowedError') {
                    console.log('Autoplay nicht erlaubt:', error);
                    event.preventDefault(); // Unterdrückt das Standardverhalten des unhandledrejection-Events
                } else {
                    console.log('Fehler beim Abspielen des Audios:', error);
                }
            });
    }
}

// Globaler Handler für nicht abgefangene Promise Rejections
window.addEventListener('unhandledrejection', function(event) {
    console.log('Unhandled Promise Rejection:', event.reason);
    event.preventDefault(); // Unterdrückt das Standardverhalten des unhandledrejection-Events
});

</script>

<script>
<?php
    require('engine/extensions/' . $playermode . '/cast.js');
?>
</script>

     <?php
    require('engine/extensions/' . $playermode . '/script_loader.php');
?>






</body>
<!--<script src="rscs/javascript/loader.js"></script> -->
<!-----------------------.......-- LOAD CONVEYOR JS ---------------------------------->
<script src="rscs/javascript/conveyor.js"></script>
</html>
