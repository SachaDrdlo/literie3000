<?php

if (!empty($_POST)) {
    $brand = trim(strip_tags($_POST["brand"]));
    $model = trim(strip_tags($_POST["model"]));
    $dimension = trim(strip_tags($_POST["dimension"]));
    $firstprice = trim(strip_tags($_POST["firstprice"]));
    $image = trim(strip_tags($_POST["image"]));

    $errors = [];

    if (empty($brand)) {
        $errors["brand"] = 'La marque du matelas est obligatoire';
    }

    if (empty($model)) {
        $errors["model"] = 'Le modèle du matelas est obligatoire';
    }

    if (empty($dimension)) {
        $errors["dimension"] = 'Les dimension du matelas sont obligatoires';
    }

    if (empty($firstprice)) {
        $errors["firstprice"] = 'Le prix de vente est obligatoire';
    }

    if (!filter_var($image, FILTER_VALIDATE_URL)) {
        $errors["image"] = "L'url est invalide";
    }

    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "root");

        $query = $db->prepare("INSERT INTO catalogue (brand, model, dimension, firstprice, image) VALUES (:brand, :model, :dimension, :firstprice, :image)");
        $query->bindParam(":brand", $brand);
        $query->bindParam(":model", $model);
        $query->bindParam(":dimension", $dimension);
        $query->bindParam(":firstprice", $firstprice);
        $query->bindParam(":image", $image);

        $query->execute();
    }
}

include('template/header.php');
?>

<div class="container">
    <h1>Ajouter un matelas</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label for="inputBrand">Marque :</label>
            <input type="text" name="brand" id="inputBrand" value="<?= isset($brand) ? $brand : "" ?>">
            <?= isset($errors["brand"]) ? "<span class=\"error\">{$errors["brand"]}</span>" : ""; ?>
        </div>
        <div class="form-group">
            <label for="inputModel">Modèle :</label>
            <input type="text" name="model" id="inputModel" value="<?= isset($model) ? $model : "" ?>">
            <?= isset($errors["model"]) ? "<span class=\"error\">{$errors["model"]}</span>" : ""; ?>
        </div>
        <div class="form-group">
            <label for="inputDimension">Dimension :</label>
            <input type="text" name="dimension" id="inputDimension" value="<?= isset($dimension) ? $dimension : "" ?>">
            <?= isset($errors["dimension"]) ? "<span class=\"error\">{$errors["dimension"]}</span>" : ""; ?>
        </div>

        <div class="form-group">
            <label for="inputFirstprice">Prix de vente :</label>
            <input type="text" name="firstprice" id="inputFirstPrice" value="<?= isset($firstprice) ? $firstprice : "" ?>">
            <?= isset($errors["firstprice"]) ? "<span class=\"error\">{$errors["firstprice"]}</span>" : ""; ?>
        </div>
        <div class="form-group">
            <label for="inputImage">Image :</label>
            <input type="text" name="image" id="inputImage" value="<?= isset($image) ? $image : "" ?>">
            <?= isset($errors["image"]) ? "<span class=\"error\">{$errors["image"]}</span>" : ""; ?>
        </div>
        <input class="btn" type="submit" value="Ajouter le matelas">
    </form>
</div>


</div>