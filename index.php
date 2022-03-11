<?php
include('connexion.php');

echo '<pre>';
var_dump($_SERVER['HTTP_REFERER']);
echo '</pre>';
$texte = 'Ecriture dans un fichier2'.PHP_EOL;
$texte .= ''.PHP_EOL;
$texte .= 'Ecriture dans un fichier2'.PHP_EOL;


file_put_contents('test.txt', $texte);

?>



<form action="#" method="get">
<label>Département</label>
<select name="departement" id="departement" onchange="ajaxVilles()">
  <option value="">-- Choisissez un département --</option>

    <?php
   
        $requete = $pdo->query('SELECT * FROM departements order by code asc ');
        $dep = $requete->fetchAll();
        foreach($dep as $res)
        {
        ?>
        <option value="<?=$res['id']?>" 
          <?php if($_GET['departement'] == $res['id']){?>selected<?php } ?>><?=$res['libelle']?></option>
        <?php 
        } 
       ?>
</select>

<br><br>
<label>Ville</label>
<select name="ville" id="ville">
  <option value="">-- Choisissez un département avant la ville --</option>
</select>

<input type="submit">
      </form>

      <h1 id="titre1"></h1>
      <h2 id="titre2"></h2>
      <h3 id="titre3"></h3>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  function ajaxVilles()
  {
    
    var departement = $('#departement').val();
  
    $.ajax({
      url : 'requete.php',
      type : 'post',
      data : {'departement':departement},

      success:function(retourRes)
      {
        $('#ville').html(retourRes);
        ajaxPays();
      }

    })
   


  }


  function ajaxPays()
  {
    
    var departement = $('#departement').val();
  
    $.ajax({
      url : 'requete.php',
      type : 'post',
      data : {'departement':departement},

      success:function(retourRes)
      {
        $('#ville').html(retourRes)
        var obj = JSON.parse(retourRes);

        $('#titre1').html(obj['historiques'][0][1])
      
        
       
      }

    })
   


  }
</script>


