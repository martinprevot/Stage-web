<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Web page</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <style>
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
  </style>
</head>

<body>
  <?php
  session_start();
  if (isset($_POST['submittext'])) {
    $_SESSION["nbtext"] = $_POST['nbtext'];
    $_SESSION["couleur"] = $_POST['couleur'];
  }
  if ($_SESSION["couleur"] == "noir") {
    $var = "img/tshirtnoir.png";
  } else {
    $var = "img/tshirtblanc.png";
  }
  ?>
  <TABLE Border="0" Cellspacing="2" Cellpadding="0" Width="100%" Height="100%">
    <TR>
      <TD height="71" ALIGN="CENTER">
        <div style="position:relative;">
          <div style="position:absolute;z-index:1">
            <?php echo "<img  class ='fond' style='width:500px;height:400px;' src='$var'/>"; ?>
          </div>
          <div style="position:relative;top:150px; left: 20px; width:200px; height:500px; z-index:2;font-size:200%">
          </div>
        </div>
      </TD>
      <?php
      ?><br><br>
      <TD ALIGN="CENTER" valign="TOP">
        <h1 class="text"> Choisis ton texte et ta couleur :</h1><br>
        <?php
        if (!isset($_SESSION['nbtext'])) {
          ?>
          <form action="tshirt.php" method="post"><br>
            <label class="text2" for="color-select">Choisis le nombre de texte :</label>
            <select class="text2" name="nbtext" id="color-select">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
            <br>
            <label class="text2" for="color-select">Choisis une couleur de T-Shirt :</label>
            <select class="text2" name="couleur" id="color-select">
              <option value="blanc">blanc</option>
              <option value="noir">noir</option>
            </select>
            <p class="text2"><input name="submittext" type="submit" value="Valider" style="height:200; width:200px"></p>
          </form>
          <?php
        } else {
          $_SESSION["nbtext"] = $_POST['nbtext'];
          ?>
          <form action="tshirt2.php" method="post">
            <?php
            for ($i = 1; $i <= $_SESSION["nbtext"]; $i++) {
              ?>
              <table border="1">
                <thead>
                  <tr>
                    <th colspan="2">Texte
                      <?php echo $i; ?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p class="text2">Entre ton texte : <input type="text" name="<?php echo "text" . $i ?>" /></p>
                    </td>
                  </tr>
                  <tr>
                    <td><label class="text2" for="color-select">Choisis une couleur d'encre :</label>
                      <select class="text2" name="<?php echo "encre" . $i ?>" id="color-select">
                        <option value="white">Blanc</option>
                        <option value="black">Noir</option>
                        <option value="red">Rouge</option>
                        <option value="green">Vert</option>
                        <option value="silver">Argent</option>
                        <option value="gold">Or</option>
                        <option value="blue">Bleu</option>
                        <option value="purple">Violet</option>
                        <option value="pink">Rose</option>
                        <option value="brown">Marron</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="text2" for="color-select">Taille du texte :</label>
                      <select class="text2" name="<?php echo "taille" . $i ?>" id="color-select">
                        <option value="large">small</option>
                        <option value="x-large">medium</option>
                        <option value="xx-large">Large</option>
                        <option value="xxx-large">Extra-Large</option>
                      </select>
                    </td>
                  </tr><br>
                </tbody>
              </table>
              <?php
            }
            ?>
            <p class="text2"><input name="bouton" type="submit" value="Previsualise et déplace le texte"></p>
          </form>
        </TD>
      </TR>
    </TABLE>
    <?php
        }
        ?>
  <a id="bottom-left" href="logout.php">Retour</a>
</body>

</html>