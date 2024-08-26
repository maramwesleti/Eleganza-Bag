
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eleganza Bag Products</title>
    <style>
.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.product-card {
    width: 300px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.product-card img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

.product-card h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.product-card p {
    font-size: 14px;
    color: #666;
}
</style>
</head>
<body>
<?php include 'connexion.php'; ?>
<div class="product-container">
    <?php
        $query = "SELECT * FROM produits";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row['nom'];
            $productDescription =$row['description'];
            $productPrice = $row['prix'];
            $productImage = $row['image'];
    ?>
    <div class="product-card">
        <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
        <h2><?php echo $productName; ?></h2>
        <p><?php echo $productDescription; ?></p>
        <p>Price: <?php echo $productPrice; ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>
