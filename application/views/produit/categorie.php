<div class="row" id="corps">
  <div class="col-sm-6 col-lg-8" id="tableau">
    <p>
      <h2>Liste des maquettes de vaisseaux </h2>
    </p>
  </div>
</div><br />

<div class="col-sm-12">

</div>
  <table border='5' bgcolor='#d0ff00' text-align='center'>
    <TR border='10' bgcolor='#a4c2f4' width='1500'>
      <TH width="100">code du produit</TH>
      <TH width="200">Nom du produit</TH>
      <TH width="1000">Description du produit</TH>
      <TH width="100">Produit encore en stock</TH>
      <TH width="100">Prix du produit</TH>
    </TR>
    <br />
    <?php
    foreach ($categorie as $row)
    {
      echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>\n";
      echo "<TD width='100' text-align='center'>".$row->id_produit."</TD>\n";
      echo "<TD width='200' text-align='center'>".$row->nom_produit."</TD>\n";
      echo "<TD width='1000' text-align='center' id='texte' classe='texte'>".$row->Description."</TD>\n";
      echo "<TD width='100' text-align='center'>".$row->stock_produit."</TD>\n";
      echo "<TD width='100' text-align='center'>".$row->prix_produit."</TD>\n";
      echo "</TR>";
    } ?>
  </table>
</div>
