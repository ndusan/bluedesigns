<?php
/**
 * Model
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Model
{
        
    protected $dbh;

    private $tableTranslation = 'translation';
    private $tableLanguage = 'language';
    private $tableLanguageTranslation = 'language_translation';

    private $tableQuotes = 'quotes';
    private $tableQuotesLanguage = 'quotes_language';
    
    private $tableCarousel = 'carousel';
    private $tableCarouselLanguage = 'carousel_language';

    /**
     * Contructor
     * @return boolean
     */
    function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF-8", DB_USER, DB_PASS);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Password generator
     * @param int $len
     * @return string
     */
    function passwordGenerator($len = 6)
    {
            $r = '';
            for($i=0; $i<$len; $i++){
                $r .= chr(rand(0, 25) + ord('a'));
            }

            return $r;
    }


    public function loadDictionary()
    {
        $output = array();

        try{

            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            $response = $stmt->fetchAll();

            if(empty($response)) throw new \Exception('No language specified in DB');

            foreach($response as $r){

                $query = sprintf("SELECT `t`.`name`, `lt`.`text` FROM %s AS `t`
                                    INNER JOIN %s AS `lt` ON `lt`.`translation_id`=`t`.`id`
                                    WHERE `lt`.`language_id`=:languageId", 
                                    $this->tableTranslation, $this->tableLanguageTranslation);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();

                 $tmp = $stmt->fetchAll();

                 foreach($tmp as $t){
                    $output[$r['iso_code']][$t['name']] = $t['text'];
                 }
            }

            return $output;
        }catch(Exception $e){

            return false;
        }
    }



    public function getQuotes($params)
    {

        try{
            $query = sprintf("SELECT `q`.*, `ql`.`text` FROM %s AS `q`
                                INNER JOIN %s AS `ql` ON `ql`.`quotes_id`=`q`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`ql`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `q`.`visible`='1' ORDER BY `q`.`id` DESC", 
                                $this->tableQuotes,
                                $this->tableQuotesLanguage,
                                $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){

            return false;
        }
    }



    public function getCarousel($params)
    {
        try{
            $query = sprintf("SELECT `c`.*, `cl`.`text` FROM %s AS `c` 
                                LEFT JOIN %s AS `cl` ON `cl`.`carousel_id`=`c`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode", $this->tableCarousel, $this->tableCarouselLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){

            return false;
        }
    }
}