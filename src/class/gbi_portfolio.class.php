<?php

date_default_timezone_set('America/Toronto');
/* ******************************************************* */

function var_dump_ret($mixed = null) {
    ob_start();
    var_dump($mixed);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

/* ================================================================================================== */
/* La classe  tim_form */

	class tim_form{

        const COURRIEL_CC = 'contact@mlaferriere.ca';
        const COURRIEL_FROM = 'Portfolio en ligne - Mikaël Laferrière <no-reply-contact@mlaferriere.ca>' ;


        public $tim_form_nom = '';		
        public $tim_form_courriel = '';
        public $tim_form_sujet = '';				
        public $tim_form_commentaires = '';


        // Méthode pour assigner les valeurs POST aux attributs de l'objet
        public function assignPostVariables() {
            foreach ($_POST as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
 
    /* ================================================= */
    
    public function afficherHTML($msg = '') {

        // Date et heure actuelles
        $datetime = date('Y-m-d H:i:s');

        $html = "
        $msg
        
        <h2>Merci, {$this->tim_form_nom}!</h2>
        <h4>votre message a bien été reçu!</h4>";

        return '<div class="tim_form">'. $html . '</div>';
    }

    /* ================================================= */
    
    public function afficherHTMLCourriel() {

        // Date et heure actuelles
        $datetime = date('Y-m-d H:i:s');


        $html = "
        
        <html>
        <head>
        <title>Email en format HTML</title>
       
        <style>
            
            .tim_form span {
                display: inline-block;                
                font-size: 16px;
                margin-bottom: 8px;
                padding: 0;
            }
            .tim_form span.descriptions {
                width: 20%;
                max: width 200px;
            }
            .tim_form span.informations {
                display: inline-block;
                font-weight: 700;
            }

        </style>
         </head>
        <body>
            <div class='tim_form'>

                <strong> Voici les détails du message.</strong></p>";

        $html .= "<h3>Identification de l'usager</h3>";

        $html .= "<span class=\"descriptions\" >Nom:</span> <span class=\"informations\">{$this->tim_form_nom}</span><br>";

        $html .= "<span class=\"descriptions\" >Courriel:</span> <span class=\"informations\">{$this->tim_form_courriel}</span></p>";
        
        $html .= "<h3>Message:</h3>";
        $html .= "<p><span class=\"descriptions\" >Message:</span> <span class=\"informations\">{$this->tim_form_commentaires}</span><br>";

        $html .= "<p>Date et heure de la demande:</p>";
        $html .= "<p><span class=\"informations\">{$datetime}</span></p>";
        
        $html .= "</div>";


        $html .= " </body>
        </html>";

        return  $html ;
    }

    /* ================================================= */
    // Méthode pour envoyer un courriel avec les données en utilisant la fonction php mail
    public function envoyerEmail($to, $cc = null, $bcc = null, $subject = null) {
    
        // Contenu de l'email
        $message = $this->afficherHTMLCourriel();

        // Définir les en-têtes (headers) pour indiquer que le message est en HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // En-tête supplémentaire (expéditeur)
        $headers .= 'From: ' . self::COURRIEL_FROM . "\r\n";
        $headers .= 'Reply-To: ' . $this->tim_form_courriel . "\r\n";


        // Ajouter les adresses en CC et BCC
       if ($cc) {
            $headers .= 'Cc: ' . $cc . "\r\n";     // Adresse en CC
        }
        if ($bcc) {
            $headers .= 'Bcc: ' . $bcc . "\r\n";   // Adresse en BCC
        }


        // Envoi du courriel
        if ( mail($to, $subject, $message, $headers)) {
            return true; // 'Le message a été envoyé avec succès.';
        } else {
            return false; // "Le message n'a pas pu être envoyé.";
        }


    }


    }
    /* ------------------------------------------------------------------ */






