<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "root");

// QUERY
$query = $db->query("SELECT * FROM catalogue");
$mattresses = $query->fetchAll();

if (!empty($_POST)) {
    $id = trim(strip_tags($_POST['id']));
    // DELETE
    $query = $db->prepare("DELETE FROM catalogue WHERE id = :id");
    $query->bindParam(':id', $id);
    if($query->execute()) {
        header('Location: http://localhost:8888/literie3000/delete.php');
    }
}

include("template/header.php");
?>

<div class="container">
    <div class="delete-container">
        <?php
        foreach ($mattresses as $mattress) {
        ?>
            <div class="delete-container-col">
                <div class="delete-container-text">
                    <h1><?= $mattress["brand"] ?></h1>
                    <h2><?= $mattress["model"] ?></h2>
                </div>
                <div class="delete-btnDelete">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mattress["id"] ?>">
                        <input class="btn" type="submit" value="Supprimer le matelas">
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include("template/footer.php");
