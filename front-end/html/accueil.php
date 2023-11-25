<?php
include ('../../back-end/php/connexion.php');
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}
$categories = $connexion->query("SELECT DISTINCT categorie FROM products")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/accueil.css">
    <title>Accueil</title>
</head>
<body>
    <?php 
        include ('header.html');
    ?>
    <section>
        <div class="categorie">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- Selection par stock -->
                <select name="selectedStock">
                    <option value="all">All</option>
                    <option value="rupture" <?php echo (isset($_POST['selectedStock']) && $_POST['selectedStock'] === 'rupture') ? 'selected' : ''; ?>>En rupture</option>
                </select>
                <!-- Selection par categorie -->
                <select name="selectedCategory">
                    <option value="*" <?php echo (!isset($_POST['selectedCategory']) || $_POST['selectedCategory'] === '*') ? 'selected' : ''; ?>>All</option>
                    <?php
                        if ($categories->num_rows > 0) {
                            mysqli_data_seek($categories, 0);
                            while ($rows = $categories->fetch_assoc()) {
                                $categorie = $rows["categorie"];
                                ?>
                                <option value="<?php echo $categorie; ?>" <?php echo (isset($_POST['selectedCategory']) && $_POST['selectedCategory'] === $categorie) ? 'selected' : ''; ?>><?php echo $categorie; ?></option>
                                <?php
                            }
                        } else {
                    ?>
                    <option value="">No categories found</option>
                        <?php
                            }
                        ?>
                </select>
                <input type="submit" value="Filter">
            </form>
        </div>
        <div class="all-products">
            <?php
                $filterCondition = "";
// no filter stick variable
                // Check if stock is set to rupture
                if (isset($_POST["selectedStock"]) && $_POST['selectedStock'] === 'rupture') {
                    $filterCondition .= " AND quantité_min > quantité_stock";
                }
                // Check if category is set
                if (isset($_POST['selectedCategory']) && $_POST['selectedCategory'] !== '*') {
                    $selectedCategory = $connexion->real_escape_string($_POST['selectedCategory']);
                    $filterCondition .= " AND categorie = '$selectedCategory'";
                }
    
                $contenu = $connexion->query("SELECT * FROM products WHERE 1 $filterCondition");
                while ($row = $contenu->fetch_assoc()) {
            ?>
            <div class="products">
                <div class="card">
                    <div class="product-img">
                        <img src="../assets/<?php echo $row["image"]; ?>">
                    </div>
                    <p>Description of product here.........................</p>
                    <p class="price"><?php echo $row["prix_unitaire"]," dh"; ?></p>
                    <p class="categ">Quantité en stock : <?php echo $row["quantité_stock"]; ?></p>
                </div>
            </div>
            <?php
                }
            ?>  
        </div>
    </section>

    <div class="rights">
        <p> &copy; 2023 ELECTRO NACER All Rights Reserved</p>
    </div>
</body>
</html>



