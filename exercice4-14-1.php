<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Deliberation de la fin d'annee</h1>
    <form action="" method="post">
        <label for="">Annee de formation</label>
        <select name="annee" id="">
            <option value="1a" name="1a" <?=(isset($_POST["annee"]) and ($_POST["annee"]=="1a"))? "selected":"" ?> >1ere annee</option>
            <option value="2a" name="2a" <?=(isset($_POST["annee"]) and ($_POST["annee"]=="2a"))? "selected":"" ?>  >2eme annee</option>
        </select>
        <br>
        <label for="">Deja redoublant</label>
        <input type="checkbox" name="redoublant" >
        <br>
        <label for="">moyenne generale</label>
        <input type="text" name="moyenne" value="<?php if(isset($_POST["moyenne"])) {echo $_POST["moyenne"];} else {echo"";} ?>"   >
        <br>
        <label for="">nombre total d'absence</label>
        <input type="number" name="absence" value="<?php if(isset($_POST["absence"])) {echo $_POST["absence"];} else {echo"";} ?>" >
        <br>
        <input type="submit" value="OK">
        <br>
    </form>
    <?php
         if ($_SERVER ["REQUEST_METHOD"] == "POST"){
            $decision ="";
            $annee = $_POST["annee"];
            $moyenne = $_POST["moyenne"];
            if(isset($_POST['redoublant'])) $redoublant =$_POST['redoublant'] ;
            $absence = $_POST["absence"];
            if ($moyenne >= 10){
                $decision = "Admis";

            }
            else {
                if($annee == "2a"){
                    if($moyenne >= 9.5 and $moyenne < 10 ) {
                        if($absence < 30){
                            $decision ="Admis avec bonnus";
                        }
                        else{
                            $decision= $redoublant? "Elimine":"Redouble";

                        }
                    }
                    else{
                        $decision= $redoublant? "Elimine":"Redouble";

                    }
                }
                else{
                    if ($moyenne >= 9 and $moyenne < 10 ){
                        if($absence < 30){
                            $decision ="Rachete";
                        }
                        else{
                            $decision= $redoublant? "Elimine":"Redouble";

                        }
                    }
                    else {
                        $decision= $redoublant? "Elimine":"Redouble";
                    }
                }
            }
            echo "---->Decision:  ".$decision;
         }
         ?>
</body>
</html>