<div id="szuro">
<form id="szuresForm" action="index.php?menu=szurtautok" method="post">



<label for="marka">Márka:</label>
<select name="marka" id="marka" style="padding-right: 0.5vw;">
  <option value="">Mindegy</option>
  <?php foreach ($db->getMarka() as $row) { ?>
    <option value="<?= $row['marka'] ?>"><?= $row['marka'] ?></option>
  <?php } ?>
</select>

<label for="uzemanyag">Üzemanyag típus:</label>
<select name="uzemanyag" id="uzemanyag" style="padding-right: 0.5vw;">
  <option value="">Mindegy</option>
  <?php foreach ($db->getUzemanyag() as $row) { ?>
    <option value="<?= $row['uzemanyag'] ?>"><?= $row['uzemanyag'] ?></option>
  <?php } ?>
</select>

<label for="szszam">Ülések száma:</label>
<select name="szszam" id="szszam" style="padding-right: 0.5vw;">
  <option value="">Mindegy</option>
  <?php foreach ($db->getSzszam() as $row) { ?>
    <option value="<?= $row['szszam'] ?>"><?= $row['szszam'] ?></option>
  <?php } ?>
</select>
<br><br>
        <a href="index.php?menu=szurtautok">
<button type="submit" class="Btn">
  <div class="sign"><svg viewBox="0 0 512 512"><path xmlns="http://www.w3.org/2000/svg" d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796   s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z    M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z"/></svg></div>
  <div class="text">Keresés</div>
</button></a>
</form>
</div>


<script>
  function szures() {
    // Űrlap adatainak gyűjtése
    var formData = new FormData(document.getElementById('szuresForm'));

    // AJAX kérés elküldése
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {

      }
    };
    
    xhr.open('POST', 'Vizsgaremek2/index.php', true);
    xhr.send(formData);
  }
</script>


<div class="fixed-container mt-15 mb-5">
    <div class="row">
        <?php
        foreach ($db->osszesAuto() as $row) {
            $image = null;
            if (file_exists("./autokepek/" . $row['modell'] . "/kep1.jpg")) {
                $image = "./autokepek/" . $row['modell'] . "/kep1.jpg";
            } else {
                $image = "./images/noimage.jpg";
            }
            ?>
        <div class="col-md-3 mb-4">
                    <div class="card"> 
                        <a href="index.php?menu=kivalasztottauto&id=<?php echo $row["id"];?>" ><img src="<?= $image ?>" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['modell'] ?></h5>
                        <p class="card-text">Márka: <?= $row['marka'] ?></p>
                        <p class="card-text">Bérletidíj: <?= $row['berletidij'] ?> Ft</p>
                        <p class="hidden"></p>
                    </div>
                    </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
