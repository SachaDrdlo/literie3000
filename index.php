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
        <?php
        foreach ($mattresses as $matteress) {
        ?>
            <div class="mattress-container-col">
                <div class="mattress-container-img">
                    <img src="<?= $matteress["image"] ?> " alt="">
                </div>
                <div class="mattress-container-content">
                    <h1><?= $matteress["brand"] ?></h1>
                    <h2><?= $matteress["model"] ?></h2>
                    <span><?= $matteress["dimension"] ?></span>

                    <h3 class="mattress-firtprice"><?= $matteress["firstprice"] ?></h3>
                    <h3 class="mattress-promotionprice"><?= $matteress["promotionprice"] ?></h3>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include("template/footer.php");
