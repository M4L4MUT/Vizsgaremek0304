
<div id="szurtautokkartya">
    <?php
    foreach ($db->szures() as $row) {
        $image = null;
        if (file_exists("./autokepek/" . $row['modell'] . "/kep1.jpg")) {
            $image = "./autokepek/" . $row['modell'] . "/kep1.jpg";
        } else {
            $image = "./images/noimage.jpg";
        }
        ?>
        
            <div class="szurt-container">
                <img src="<?= $image ?>" id="szurtautok-kep" alt="...">
                <div id="container-felirat">
                    <h2  class="card-title"><?= $row['marka']?> <?= $row['modell']  ?></h2>
                <p id="dij" class="card-text">Bérletidíj: <?= $row['berletidij'] ?> Ft</p>
                
                <a href="index.php?menu=kivalasztottauto&id=<?php echo $row["id"]; ?>" ><button>
                    <span class="transition"></span>
                        <span class="gradient"></span>
                        <span class="label">Érdekel</span>
                </button></a>
                
                <div class="icon"><i class="fa-solid fa-cart-shopping"></i>
                <p class="card-text"> <?= $row['kaukcio'] ?></p>
                <i class="fa-solid fa-person"></i>
                <p class="card-text"> <?= $row['szszam'] ?></p>
                <i class="fa-solid fa-gas-pump"></i>
                <p class="card-text"> <?= $row['fogyasztas'] ?></p>
                <i class="fa-solid fa-clock"></i>
                <p class="card-text"> <?= $row['km'] ?></p>
                </div>
            </div></div>
        
        <?php
    }
    ?>
</div> 

