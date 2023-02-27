<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
	<label for="email"> Email </label> : <input type="email" name="email" id="email"><br>
	<label for="passW"> Mot de passe </label> : <input type="password" name="passW" id="passW"><br>
	<input type="submit" value = "Envoyer">
	<input type="reset" value="Réinitialiser">

<?php
		$my_email = $_POST['email'];
		$my_passW = $_POST['passW'];
    	$db = new PDO('mysql:host=localhost;dbname=projet_annuel;charset=utf8mb4','root','');
		$success = false;

		$data = $db->query("SELECT * FROM utilisateur")->fetchAll();

		function addUser($email,$password) {
    // se connecter à la base de données
   // $connexion = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_données");
			$connexion = mysqli_connect("localhost", "root", "", "sql");


    // Vérifier la connexion à la base de données
    if (!$connexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête d'insertion
    $sql = "INSERT INTO utilisateur (email,mot_de_passe) VALUES ('$email', '$password' )";

    // Exécuter la requête d'insertion
    if (mysqli_query($connexion, $sql)) {
        echo "Utilisateur ajouté avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
}

function deleteUser($user_id) {
    // se connecter à la base de données
    $connexion = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_données");

    // Vérifier la connexion à la base de données
    if (!$connexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête de suppression
    $sql = "DELETE FROM utilisateur WHERE id = $user_id";

    // Exécuter la requête de suppression
    if (mysqli_query($connexion, $sql)) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
}

function updateUser($user_id, $new_username, $new_password, $new_email) {
    // se connecter à la base de données
    $connexion = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_données");

    // Vérifier la connexion à la base de données
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Préparer la requête de mise à jour
    $sql = "UPDATE utilisateur SET nom_utilisateur = '$new_username', mot_de_passe = '$new_password', email = '$new_email' WHERE id = $user_id";

    // Exécuter la requête de mise à jour
    if (mysqli_query($connexion, $sql)) {
        echo "Utilisateur mis à jour avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($connexion);
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
}

//pour upload un fichier

move_uploaded_file() - Déplace un fichier téléchargé dans le répertoire souhaité sur le serveur.
//is_uploaded_file() - Vérifie si un fichier a été téléchargé via un formulaire HTTP POST.

if(isset($_FILES['fichier'])){
   $file_name = $_FILES['fichier']['name'];
   $file_size =$_FILES['fichier']['size'];
   $file_tmp =$_FILES['fichier']['tmp_name'];
   $file_type=$_FILES['fichier']['type'];   
   move_uploaded_file($file_tmp,"/le/chemin/vers/le/repertoire/destination/".$file_name);
}



?>

</body>
</html>