<?php

require_once ("DataBase.php");

/**
 * Class BookMetadataProcess
 *
 * Cette classe permet de faire différente action concernant un livre donné. Notamment son affichage, sa suppression de la
 * liste des favoris, l'ajout de note et de commentaires etc.
 *
 * PHP version 7.4
 *
 * @author Célia Martin <celia.ma@free.fr>
 */
class BookMetadataProcess
{
    private $isbn;
    private $book_id;

    public function __construct($isbn){
        $this->isbn = $isbn;
    }

    /**
     * Fonction get_book_metadata_from_db
     *
     * Fonction à utiliser lorsque l'utilistauer clique sur UN livre, on souhaite donc en afficher les données
     * depuis la base de données. On utilise l'ISBN qui est un code unique existant pour chaque livre.
     *
     * @throws Exception
     */
    public function get_book_metadata_from_db(): array
    {
        $db = new DataBase();
        $book_metadata = $db->getData("SELECT * FROM `object` WHERE `field1` = ".$this->isbn, "milibrary", "root", "");
        $this->book_id = $book_metadata[0]["id"];
        return $book_metadata;
    }

    /**
     * Fonction add_book_to_user_objects
     *
     * Cette fonction permet d'enregistrer dans les objects de l'utilisateur le livre qu'il aura sélectionné.
     *
     * @param $id_user_owner int Identifiant de l'utilisateur qui enregistre le livre
     * @param $rate int Note donnée par l'utilisateur s'il a lu le livre
     * @param $comment String Commentaire à propos du livre
     * @throws Exception
     */
    public function add_book_to_user_objects($id_user_owner, $rate = 0 , $comment = ""){
        $db = new DataBase();
        $request = 'INSERT INTO `user_object` (`id_user_owner`, `id_object`, `rate`, `comment`) VALUES ('.$id_user_owner.', '.$this->book_id.', '.$rate.', "'.$comment.'")';
        $db->addOrDelData($request, "milibrary", "root", "");
    }

    /**
     * Fonction update_comment
     *
     * Cette fonction permet de mettre à jour le commentaire disponible pour le livre sélectionné.
     *
     * @param $id_user_owner int Identifiant de l'utilisteur qui possède le livre
     * @param $new_comment String Commentaire à propos du livre
     * @throws Exception
     */
    public function update_comment_and_rate($id_user_owner, $new_rate = 0, $new_comment = ""){
        $db = new DataBase();
        $request = 'UPDATE `user_object` SET `comment` = "'.$new_comment.'", `rate` = '.$new_rate.' WHERE `id_user_owner` = '.$id_user_owner.' AND `id_object` = '.$this->book_id;
        $db->addOrDelData($request, "milibrary", "root", "");
    }
}