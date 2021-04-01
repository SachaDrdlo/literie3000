<?php

if (!empty($_POST)) {
    $id = trim(strip_tags($_POST['id']));
    $promotionPrice = trim(strip_tags($_POST["promotionprice"]));

    $errors = [];

    if (empty($id)) {
        $errors['id'] = 'Le numéro du matelas doit être renseigné';
    }

    if (empty($promotionPrice)) {
        $errors['promotionprice'] = 'Le prix doit être renseigné';
    }

    if (empty($errors)) {
        $dsn = "mysql:host=localhost:8889;dbname=literie3000";
        $db = new PDO($dsn, "root", "root", array(PDO::MYSQL_ATTR_FOUND_ROWS => true));

        $query = $db->prepare("UPDATE catalogue SET promotionprice = :promotionprice WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':promotionprice', $promotionPrice);
        $query->execute();

        $count = $query->rowCount();
        echo("update $count");
    }
}

include("template/header.php");
?>

<div class="container">
    <h1>Ajouter un prix en promotion</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label for="inputId">Numéro du matelas: </label>
            <input type="text" name="id" id="inputId" value="<?= isset($id) ? $id : "" ?>">
            <?= isset($errors["id"]) ? "<span class=\"error\">{$errors["id"]}</span>" : ""; ?>
        </div>
        <div class="form-group">
            <label for="inputPromotionPrice">Prix en promotion:</label>
            <input type="text" name="promotionprice" id="inputPromotionPrice" value="<?= isset($promotionPrice) ? $promotionPrice : "" ?>">
            <?= isset($errors["promotionprice"]) ? "<span class=\"error\">{$errors["promotionprice"]}</span>" : ""; ?>
        </div>
        <input class="btn" type="submit" value="Ajouter le prix en promotion">
    </form>
</div>