<?php 
include ('../../back-end/php/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>gestion stock</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <img src="../assets/images/logo-PhotoRoom2.png" alt="">
        <h1>Log in</h1>
        <input name="id" type="text" placeholder="Entrez votre id">
        <input name="pass" type="password" placeholder="Entrez votre password">
        <input type="submit" value="log in" >
    </form>

    <?php
        $login= $connexion->query("SELECT * FROM users");
        $login_true=0;
        if(isset($_POST['id']) && isset($_POST['pass'])){
            while ($rows = $login->fetch_assoc()) {
                if($_POST['id']==$rows["id"] && $_POST['pass']==$rows["password"]){
                    $login_true=1; 
                    header('Location:accueil.php');
                    break;
                }
            }
            if($login_true==0){
                echo "<p>id ou password incorrecte !</p>";
            }
        }else{
            echo "<p>* Remplissez les champs !</p>";
        }
    ?>
</body>
</html>