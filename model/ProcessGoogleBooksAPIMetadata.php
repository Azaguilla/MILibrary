<?php

require ("DataBase.php");

/**
 * Classe ProcessGoogleBooksAPIMetadata
 *
 * Cette classe réunit les fonctions permettant la connexion à l'API GoogleBooks, la récupération des métadonnées sur un livre
 * et l'enregistrement des informations du livre dans la base de données.
 *
 * PHP version 7.4
 *
 * @author Célia Martin <celia.ma@free.fr>
 */
class ProcessGoogleBooksAPIMetadata
{
    protected $book_metadata_requested;
    protected $api_key = 'AIzaSyAUc2AIbUgEn4dzSMVVY6xR2bcRrVnz0Qc';
    protected $retrieved_book_metadata;

    public function __construct($book_info_requested){
        $this->book_metadata_requested = $book_info_requested;
    }

    public function get_book_metadata()
    {
        $q = urlencode($this->book_metadata_requested);
        $endpoint = 'https://www.googleapis.com/books/v1/volumes?q=' . $q . '&key=' . $this->api_key;
        $ch = curl_init($endpoint);
        try {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                return curl_error($ch);
            }
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_code == intval(200)) {
                $this->retrieved_book_metadata = json_encode($response);
                return $this->retrieved_book_metadata;
            } else {
                return "Ressource introuvable : " . $http_code;
            }
        } catch
        (\Throwable $th) {
            throw $th;
        } finally {
            curl_close($ch);
        }
    }

    public function save_book_info_in_db()
    {
        $book_metadata = json_decode($this->retrieved_book_metadata);
        $db = new DataBase();
        $request= "";
    }
}