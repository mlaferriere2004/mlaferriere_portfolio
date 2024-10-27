<?php
include "class/gbi_portfolio.class.php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="title" content="Portfolio | Mikaël Laferrière">
    <meta name="description" content="Portfolio de Mikaël Laferrière, un jeune intégrateur web et créateur média en herbe! Diplômé de la technique d'intégration multimédia en 2025.">
    <meta name="keywords" content="Portfolio, Profil, Mikaël, Laferrière, Intégrateur, Web, Créateur, Création, Média, Media, Monteur, Montage, Vidéo, Développeur, Front-end">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="French">
    <meta name="revisit-after" content="90 days">


    <title data-component="ChangeTitle">Mikaël Laferrière</title>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JWPS0XMB1M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JWPS0XMB1M');
</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="icon" type="image/png" href="/assets/favicon/favicon-48x48.png" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/assets/favicon/site.webmanifest" />


    <script src="scripts/main.js" defer></script>
  </head>


  <body data-component="Scrolly">

    <header class="header" data-component="Header">
      <a href="index.html" class="header__brand">
        <svg class="icon icon--xl">
          <use xlink:href="#icon-logo"></use>
        </svg>
      </a>
      <nav class="nav-primary">
        <ul class="nav__menu">
            <li>
                <a href="index.html" class="nav-primary__item js-item">Accueil</a>
            </li>
            <li>
                <a href="index.html#info" class="nav-primary__item js-item">À propos</a>
            </li>
            <li>
              <a href="index.html#projects" class="nav-primary__item js-item">Projets</a>
          </li>
            <li>
                <a href="contact.php" class="nav-primary__item js-item">Contact</a>
            </li>
        </ul>
     </nav>
     <button class="header__toggle js-button">
        <span></span>
        <span></span>
        <span></span>
     </button>
    </header>               

    
<section class="contact">
    <div class="wrapper">

<?php
/*$tim_form_html = '
<div>
    <h1>_GET</h1>' . 
    '<pre>' . var_dump_ret($_GET) . '</pre>' . 
    '<h1>_POST</h1>' . 
    '<pre>' . var_dump_ret($_POST) . '</pre>' . 
'</div>';
echo $tim_form_html;*/


if(isset($_GET["action"]) && (!empty($_GET["action"]))) {
    $action = $_GET["action"];

    if($action === 'send' ){

        // Créer une instance de l'objet tim_form
        $reservation = new tim_form();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Assigner les valeurs du $_POST à l'objet
            $reservation->assignPostVariables();
      
            $to = $reservation->tim_form_courriel;
            $cc = tim_form::COURRIEL_CC;
            $bcc = NULL;

            $subject = "contact -  {$reservation->tim_form_nom} ";

            $reservation->envoyerEmail($to, $cc, $bcc, $subject);
            $tim_form_html = $reservation->afficherHTML();

            echo $tim_form_html;
        } 
    }
}else{

    //$datetime = date('Y-m-d H:i:s');

    //echo "<p>Date: $datetime</p>";


    ?>

<form action="contact.php?action=send" class="form" autocomplete="off" data-component="Form" method="post">
            <h2>Écrivez ici... 🖋️</h2>
            <div class="form__body">
                <fieldset class="grid">
                    <div class="input">
                        <label class="input__label" for="name">Nom complet:</label>
                        <input class="input__element" type="text" name="tim_form_nom" id="name" required />
                        <p class="error__message">Vous êtes qui déja?</p>
                    </div>
                    <div class="input max_width">
                        <label class="input__label" for="email">Courriel:</label>
                        <input class="input__element" type="email" name="tim_form_courriel" id="email" required />
                        <p class="error__message">Courriel non valide :&#40;</p>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="input max_width">
                        <label class="input__label" for="sujet">Sujet:</label>
                        <input class="input__element" type="text" name="tim_form_sujet" id="sujet" required />
                        <p class="error__message">On parle de...?</p>
                    </div>
                    <div class="input textarea max_width">
                        <label class="input__label" for="requete">Message:</label>
                        <textarea class="input__element" name="tim_form_commentaires" id="requete" required></textarea>
                        <p class="error__message">Ben la, soyez pas gêner...</p>
                    </div>
                </fieldset>

                <div class="form__footer">
                    <button class="button">Envoyer</button>
                </div>
            </div>
            <div class="form__confirmation">
                <h2>Merci!</h2>
                <h4>votre message a bien été envoyé!</h4>
            </div>
        </form>
        



    <?php

}
?>
</div>
    <img src="/assets/images/photoPro.png" alt="" data-scrolly="fromRight" />
</section>

<footer>
    <div class="wrapper">

        <div class="informations" id="contact">
            <div class="coordinates">
                <h4>Envie de me contacter après tout ça?</h4>
                <h2>Écrivez-moi ici!</h2>
                <h4><span>Télephone:</span> <a href="tel:+1 438-825-0050">438-825-0050</a></h4>
                <a href="" class="download_resume">Télécharger mon CV</a>
            </div>
            <div class="button_and_arrows">
                <img src="../assets/images/arrows.gif" alt="" id="arrows">
                <div class="button_contact">
                    <a href="contact.php" class="social_link">
                        <svg class="icon icon--xxl">
                            <use xlink:href="#icon-email-quick"></use>
                        </svg>
                    </a>
                </div>
            </div>
             
        </div>

        <div class="copyright_and_socials">
            <p class="copyright">Tous droits réservés © 2024 Mikaël Laferrière</p>

            <nav class="socials">
                <ul>

                    <li class="social">
                        <a href="https://github.com/mlaferriere2004" class="social_link" target=”_blank”>
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-github"></use>
                            </svg>
                        </a>
                    </li>

                    <li class="social">
                        <a href="https://www.linkedin.com/in/mika%C3%ABl-laferri%C3%A8re-746a7b32a/" class="social_link" target=”_blank”>
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-linkedin"></use>
                            </svg>
                        </a>
                    </li>

                    <li class="social">
                        <a href="https://www.youtube.com/@Mika%C3%ABlLaferri%C3%A8rePro/videos" class="social_link" target=”_blank”>
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-youtube"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <img src="/assets/images/blob_footer.png" alt="blob_footer" class="blob_footer">
</footer>
    
    </body>
</html>




