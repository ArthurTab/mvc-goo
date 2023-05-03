<?php
class autoloader{

    public static function chargerClasses(){

        spl_autoload_register([__CLASS__, 'autoload']); //Pour chaque classe, à chaque fois qu'on va créer n'importe quel objet ca va appeler la fonction "autoload"

    }

    public static function autoload($maClasse){
        //Je passe le nom de ma classe avec une minuscule en guise de première lettre Accueil -> accueil
        $maClasse = lcfirst($maClasse);

        $repertoires = [
          'mod_accueil/',
          'mod_accueil/controleur/',
          'mod_accueil/modele/',
          'mod_accueil/vue/',
        ];

        foreach ($repertoires as $repertoire) {

            //Vérifier si un script.php existe dans le répertoire
            if (file_exists($repertoire.$maClasse.'.php')){
                require_once $repertoire.$maClasse.'.php';
                return;
            }
            
        }
        
    }
}