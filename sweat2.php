<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Web page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        body {
            background-color: rgba(255, 107, 107, 0.191);
            color: rgb(0, 0, 0);
        }

        #dragee {
            border: 0;
            background-color: transparent;
            width: 150px;
            height: 30px;
            padding: 0.5em;
        }

        #bottom-left {
            position: fixed;
            bottom: 0;
            left: 0;
            padding: 10px;
            background-color: gray;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            var selected = $([]),
                offset = { top: 0, left: 0 };

            $("#selectable1").selectable();

            $("#selectable1 div").draggable({
                containment: [-25, 0, 500, 600],
                start: function (ev, ui) {
                    $(this).is(".ui-selected") || $(".ui-selected").removeClass("ui-selected");

                    selected = $(".ui-selected").each(function () {
                        var el = $(this);
                        el.data("offset", el.offset());
                        $(this).text("Objects \"Selected and dragging\"");
                    });
                    offset = $(this).offset();
                },
                drag: function (ev, ui) {
                    var dt = ui.position.top - offset.top, dl = ui.position.left - offset.left;

                    selected.not(this).each(function () {
                        var el = $(this), off = el.data("offset");
                        el.css({ top: off.top + dt, left: off.left + dl });
                    });
                },
            });
        });

    </script>
</head>

<body>
    <?php
    if (isset($_SESSION["nbtext"])) {
        if (isset($_POST['bouton'])) {
            $nom = array();
            $encre = array();
            $taille = array();
            for ($i = 1; $i <= $_SESSION["nbtext"]; $i++) {
                $nom[] = $_POST['text' . $i];
                $encre[] = $_POST['encre' . $i];
                $taille[] = $_POST['taille' . $i];
            }
        } else {
            echo "erreur bouton";
        }
    } else {
        echo "La variable de session 'nbtext' n'est pas initialisée.";
    }
    if ($_SESSION["couleur"] == "noir") {
        $var = "img/blackhoodie.png";
    } else {
        $var = "img/sweatfront.png";
    }
    ?>
    <TABLE Border="0" Cellspacing="2" Cellpadding="0" Width="100%" Height="100%">
        <TR>
            <TD height="71" ALIGN="CENTER">
                <div style="position:relative;">
                    <div style="position:absolute;z-index:1">
                        <?php echo "<img  class ='fond' style='width:650px;height:650px;' src='$var'/>"; ?>
                    </div>
                    <div
                        style="position:relative;top:150px; left: 20px; width:200px; height:500px; z-index:2;font-size:200%">
                        <center><b>
                                <?php
                                echo "<div id='selectable1'>";
                                for ($i = 0; $i <= $_SESSION["nbtext"]; $i++) {
                                    echo "<div id='dragee' class='ui-widget-content' style='color :$encre[$i];font-size:$taille[$i];'>$nom[$i]</div>";
                                }
                                ?>
                            </b></center>
                    </div>
                </div>
            </TD>

            <TD ALIGN="CENTER" valign="TOP">
                <h1 class="text">Previsualise et déplace ton texte :</h1><br>
                <p> Déplace ton texte sur le tshirt !</p>

                <a id="bottom-left" href="logout.php">Retour</a>
</body>