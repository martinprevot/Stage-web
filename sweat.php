<!DOCTYPE html>
<html>
  <head>
    <title>Web page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <style>
    body{
    background-color: rgba(255, 107, 107, 0.191);
    color: rgb(0, 0, 0);
  }
  #draggable {  border : 0;background-color: transparent;width: 150px; height: 30px; padding: 0.5em; }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable({
      containment:"window",
    });
  } );
  </script>
</head>
<body>
<?php
if ( isset( $_POST['bouton'] ) ) {
    $nom = $_POST['text'];
    $couleur =$_POST['couleur'];
    $encre= $_POST['encre'];
    $taille= $_POST['taille'];

    
    //Pour change couleur tshirt
    if ($couleur =="noir"){
        $var="img/blackhoodie.png";
    }
    else{
        $var="img/sweatfront.png";
    }
}
else{
  $var="img/sweatfront.png";
  $couleur ="white";
  $encre="white";

}
    ?><br><br><br><br>
<TABLE Border="0" Cellspacing="2" Cellpadding="0" Width="100%" Height="100%">
  <TR>
  <TD height="71" ALIGN="CENTER"><div style="position:relative;">
   <div style="position:absolute;z-index:1">
   <?php echo" <img  class ='fond' style='width:450px;height:450px;' src='$var'/>"; ?>
   </div>
   <div style="position:relative;top:150px; left: 20px; width:200px; height:500px; z-index:2;font-size:200%">
      <center><b>
        <?php
        echo "<div id='draggable' class='ui-widget-content' style='color :$encre;font-size:$taille;'>$nom</div>"; 
        ?>
      </b>
    </div> 
</div>
 <div class="container">
      <div class="text3">
        <h1></h1>
      </div>
    </div>
    <p> Texte déplacable !</p>
  </TD>
  <TD ALIGN="CENTER" valign ="TOP"><h1 class ="text"> Choisis ton texte et ta couleur :</h1><br>
    <form action="sweat.php" method="post"><br>
     <p class ="text2">Entre ton texte : <input type="text" name="text" /></p><br>
     <label class = "text2" for="color-select">Choisis une couleur de Sweat :</label>
     <select class ="text2"name="couleur" id="color-select">
        <option value="blanc">blanc</option>
        <option value="noir">noir</option>
    </select>
    <br><br>
    <label class = "text2" for="color-select">Choisis une couleur d'encre :</label>
    <select class ="text2" name="encre" id="color-select">
        <option value="white">blanc</option>
        <option value="black">noir</option>
        <option value="red">rouge</option>
        <option value="green">vert</option>
    </select><br><br>
    <label class = "text2" for="color-select">Taille du texte :</label>
    <select class ="text2" name="taille" id="color-select">
        <option value="large">small</option>
        <option value="x-large">medium</option>
        <option value="xx-large">Large</option>
        <option value="xxx-large">Extra-Large</option>
    </select>
     <p class ="text2"><input name ="bouton"type="submit" value="Previsualier"  style="height:200; width:200px"></p>
     </form>   
    </TD>
  </TR>
  </TABLE>
  <br><br>
  <a href="index.php">Retour</a>

</body>
</html>

