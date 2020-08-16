<?php

    /**
     * The G-TEAM External_Search class.
     *
     * @package   phpMyFAQ
     * @author    Brondon Nono <brondonnono3@gmail.com>
     * @copyright 2020 G-TEAM
     * @since     2020-08-14
     */

    //table des articles temporaires "faqdata_temp"

    namespace phpMyFAQ;

    /**
     * Class External_Search
     *
     * @package phpMyFAQ
     */
    class External_Search
    {
        /**
         * @var Configuration
         */
        private $config;


        /**
         * Entity object.
         *
         * @var string
         */
        private $category = null;

        /**
         * Result table.
         *
         * @var string
         */
        private $table = null;

        /**
         * Term of the research.
         *
         * @var string
         */
        private $searchTerm = null;


        /**
         * Setter for searchTerm.
         *
         * @param string $searchTerm
         */
        public function setSearchTerm($searchTerm)
        {
            $this->searchTerm = $searchTerm;
        }

        /**
         * Getter for searchTerm.
         *
         * @return string
         */
        public function getSearchTerm()
        {
            return $this->searchTerm;
        } 


        // @param Configuration $config Configuration $config

        /**
         * Constructor.
         *
         *@param string 
        */
        public function __construct($data,$config)
        {
            $this->config = $config;
            $this->table = $data;
        }

        /**
         * Setter for result table.
         *
         * @param string $table Table where the search result should be inserted
         *
         */

        public function setTable($table)
        {
            $this->table = $table;

            return $this;
        }

        /**
         * Get searchTerm and format it.
         *
         * @param string
         * 
         * @return string
         */

        function formatSearchTerm(string $searchTerm)
        {
            $this->setSearchTerm($searchTerm);
            $formatedTerm = strtolower($searchTerm);
            $formatedTerm = preg_replace("/[^a-z0-9_'\s-]/", "", $formatedTerm);
            $formatedTerm = preg_replace("/[\s-]+/", " ", $formatedTerm);
            $formatedTerm = preg_replace("/[\s_]/", " ", $formatedTerm);
            $formatedTerm = urlencode($formatedTerm);
            return $formatedTerm;
        }

        function initExternalSearch(string $formatedTerm)
        {
        
            //url de la recherche en ligne
        // $api_url ='https://api.goog.io/v1/search/q='.$formatedTerm; 
            $api_url = 'C:\xampp\htdocs\FAQ-COVID\api_test\data.json';
            //recuperation du resultat de la recherche
            $api_content = file_get_contents($api_url);
            
            //convertion du resultat en objet
            $obj = json_decode($api_content);
            
            return $obj;
        }

        /**
         * Save result research.
         *
         * @param object
         * @throws \Exception
         */
        public function saveResult($obj)
        {
            $result = $obj->{'results'};
            // print_r($result[0]); 
            print_r($result);
            // Connexion à la base de données
            $connect = pg_connect("host=localhost port=5432 dbname=FAQCOVID19 user=postgres password=projetfaqin3");

            if (pg_connection_status($connect) === PGSQL_CONNECTION_OK) echo 'Connexion ok <br>';
            else  echo 'Connexion erronée <br>';
            

        /*    foreach ($don as $key => $value) {
                
            }
*/

        }
    }
//coder la page d'affichage des resultats de la recherche aux differents specialistes.
//ecrire un script pour afficher les donnees sur la page des administrateurs.
//ecrire le script de validation (avec recuperation de la categorie et envoi dans la table definitive) des resultats de recherche ou de rejet(avec supression de la table temporaire).
//ecrire le script d'envoi des alerts (users et specialistes[email avec lien vers la page de validation apres s'etre authentifié]).

?>
