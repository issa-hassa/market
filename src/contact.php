<?php 
// Inclure l'en-tête (header)
include '../includes/header.php'; 
?>

<main>
    <section class="contact-form">
        <h2>Contactez-nous</h2>
        <p>Nous serions ravis de répondre à vos questions. <br>Remplissez le formulaire ci-dessous pour nous envoyer un message.</p>

        <form action="contact.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email"><br>Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message"><br>Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Envoyer</button>
        </form>

        <?php
        // Traitement du formulaire après soumission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sécurisation des données soumises
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Valider l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class='error'>Adresse email invalide.</p>";
            } else {
                // Afficher un message de confirmation
                echo "<p class='success'>Merci, $name ! Votre message a été envoyé.</p>";
                // Ici, vous pourriez ajouter du code pour envoyer un email ou enregistrer les données dans une base de données.
            }
        }
        ?>
    </section>
</main>

<?php 
// Inclure le pied de page (footer)
include '../includes/footer.php'; 
?>
