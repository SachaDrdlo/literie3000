<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "root");

// QUERY
$query = $db->query("SELECT * FROM catalogue");
$mattresses = $query->fetchAll();

include("template/header.php");
?>

<div class="container">
    <div class="mattress-container">
        <h1>Notre catalogue</h1>
        <?php
        foreach ($mattresses as $mattress) {
        ?>
            <div class="mattress-container-col">
                <div class="mattress-container-col-img">
                    <img src="<?= $mattress["image"] ?> " alt="">
                </div>
                <div class="mattress-container-col-content">
                    <h1><?= $mattress["brand"] ?></h1>
                    <h2><?= $mattress["model"] ?></h2>
                    <span><?= $mattress["dimension"] ?></span>
                    <?php
                    if ($mattress["promotionprice"] === NULL) {
                    ?>
                        <h3 class="mattress-firstprice"><?= $mattress["firstprice"] ?></h3>
                    <?php
                    } else {
                    ?>
                        <h3 class="mattress-container-col-content-firstpriceCrossed"><?= $mattress["firstprice"] ?>€</h3>
                        <h3 class="mattress-promotionprice"><?= $mattress["promotionprice"] ?>€</h3>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include("template/footer.php");
