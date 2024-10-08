<?php
        // Standardfarben
        $backgroundColor = '#1a1b23';
        $textColor = 'white';
        $baropacity = '59, 59, 59, 0.63';
        $blurfactor = '50px';

        // Überprüfen, ob der "colors"-Parameter vorhanden und nicht leer ist
        if (isset($_GET['theme']) && !empty($_GET['theme'])) {
            $colorsParam = $_GET['theme'];

            // Überprüfen, ob der Parameter "light" ist
            if ($colorsParam == 'light') {
                $backgroundColor = '#fafafc';
                $textColor = 'black';
                $baropacity = '59, 59, 59, 0.63';
                $blurfactor = '50px';
            }
            if ($colorsParam == 'moredark') {
                $backgroundColor = '#000000';
                $textColor = '#ffffff';
                $baropacity = '0, 0, 0, 0';
                $blurfactor = '50px';
            }
            if ($colorsParam == 'win2000') {
                $backgroundColor = '#000000';
                $textColor = '#ffffff';
                $baropacity = '1, 1, 1, 1';
                $blurfactor = '';
                echo "<style>
                .winCl-wrap {
                  border: 1px solid #000 important;
                  display: inline important;
                  margin-right: 10px important;
                  padding-top: 1px important;
                  padding-bottom: 3px important;
                  background: #c6c6c6 important;
                }
                
                .btn {
                  border-left: 1px solid #fff important;
                  border-top: 1px solid #fff important;
                  border-right: 1px solid #848484 important;
                  border-bottom: 1px solid #848484 important;
                  background-color: transparent important;
                  padding: 3px 15px 3px 15px important;
                }
                
                .btn:hover,
                .btn:focus {
                  outline: 0 important;
                }
                
                .btn:active {
                  border-right: 1px solid #fff important;
                  border-bottom: 1px solid #fff important;
                  border-left: 1px solid #848484 important;
                  border-top: 1px solid #848484 important; 
                }
                </style>";
            }
            // Überprüfen, ob der Parameter "custom" ist
            elseif ($colorsParam == 'custom') {
                // Überprüfen, ob die Parameter bcolor und tcolor vorhanden sind und gültige Hexcodes sind
                if (isset($_GET['bcolor']) && preg_match('/^[a-f0-9]{6}$/i', $_GET['bcolor'])) {
                    $backgroundColor = '#' . $_GET['bcolor'];
                }

                if (isset($_GET['tcolor']) && preg_match('/^[a-f0-9]{6}$/i', $_GET['tcolor'])) {
                    $textColor = '#' . $_GET['tcolor'];
                }

                if (isset($_GET['baropacity']) && preg_match('/^[a-f0-9]{6}$/i', $_GET['baropacity'])) {
                    $textColor = '#' . $_GET['baropacity'];
                }
            }
        }


      echo "<style>
        
        body, html,  .btn-close, .accordion, .accordion-item, .accordion-button {
            background-color: $backgroundColor;
            color: $textColor;
            backdrop-filter: blur($blurfactor);
            background-size: cover;
    
        }

        a {
            color: #1ed9b4 !important;
    
        }

        #topnavbar, #playercontrolbar, .modal-content, .modal-footer, .modal-header, #oop_player{
            background-color:rgba($baropacity) !important;
            backdrop-filter: blur(100px);
        }

        #oolfm_currentshow, #oolfm_songcover, #oolfm_current_song { 
            rgb(255 255 255 / 0%)
        }


        #blurlayer {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -100;
            width: 100%;
            height: 100vh;
            backdrop-filter: blur(25px);
        }
    </style>"



        ?>