<?php

require_once "DataBase.php";

/**
 * Class User
 *
 * Cette classe contient toutes les fonctions relatives à l'utilisateur.
 *
 * PHP version 7.4
 *
 * @author Célia Martin <celia.ma@free.fr>
 */
class User
{
    private $email;
    private $psw;

    /**
     * Constructeur de User.
     *
     * @param string $email Identifiant de l'utilisateur
     * @param string $psw Mot de passe de l'utilisateur
     */
    public function __construct(string $email, string $psw){
        $this->email = $email;
        $this->psw = $psw;
    }

    /**
     * Fonction verifyUser()
     *
     * Cette fonction vérifie que le login entré par l'utilisateur est présent dans la base.
     * S'il est présent elle vérifie le mot de passe.
     * Elle retourne true si la personne est effectivement présente dans la base de données,
     * elle envoie un message d'erreur si ce n'est pas le cas.
     *
     * @return boolean
     * @throws Exception
     */
    public function verify_user(){
        $request ="SELECT `password` FROM `user` WHERE `email`= '".$this->email."'";
        $database = new DataBase();
        $tabpsw= $database->getData($request, "milibrary", "root", "");
        if ($tabpsw==false) {
            return "Email incorrect.";
        } else {
            if ($tabpsw[0]['password'] == $this->psw) {
                $_SESSION['email'] = $this->email;
                return true;
            } else {
                return "Mot de passe incorrect.";
            }
        }
    }

    /**
     * Fonction destroySession()
     *
     * Cette fonction détruit la session en cours pour permettre la déconnexion de l'utilisateur.
     *
     * @return void
     */
    public function destroy_session(){
        session_destroy();
    }

    /**
     * Fonction get_users_infos.
     *
     * Retourne la liste des utilisateurs (sans leur mot de passe).
     *
     * @return array
     * @throws Exception
     */
    public function get_users_infos(): array
    {
        $db = new DataBase();
        $request = 'SELECT `id`, `username`, `firstname`, `lastname`, `email`, `avatar`, `description` FROM `user` WHERE `email` NOT IN (SELECT `email` FROM `user` WHERE `email` = "'. $this->email.'")';
        return $db->getData($request, "milibrary", "root", "");
    }

    /**
     * Fonction get_friends_infos.
     *
     * Retourne la liste des amis de l'utilisateurs (sans leur mot de passe).
     *
     * @return array
     * @throws Exception
     */
    public function get_friends_infos(): array
    {
        $db = new DataBase();
        $request = 'SELECT `id`, `username`, `firstname`, `lastname`, `email`, `avatar`, `description` FROM `friend` JOIN `user` ON friend.id_user2 = user.id WHERE `id_user1` = (SELECT `id` FROM `user` WHERE `email` = "'. $this->email.'")';
        return $db->getData($request, "milibrary", "root", "");
    }

    /**
     * Fonction add_friend.
     *
     * Cette fonction permet d'ajouter un utilisateur parmi ses amis.
     *
     * @param $friend_id int Identifiant de l'utilisateur à ajouter.
     * @return false|int
     * @throws Exception
     */
    public function add_friend(int $friend_id){
        $db = new DataBase();
        $request = 'INSERT INTO `friend` (`id_user1`, `id_user2`) VALUES ((SELECT `id` FROM `user` WHERE `email` = "'.$this->email.'"), '.$friend_id.'), ('.$friend_id.', (SELECT `id` FROM `user` WHERE `email` = "'.$this->email.'"))';

        var_dump($request);
        return $db->addOrDelData($request, "milibrary", "root", "");
    }

    /**
     * Fonction del_friend.
     *
     * Cette fonction permet de supprimer un utilisateur de ses amis.
     *
     * @param $friend_id int Identifiant de l'utilisateur à supprimer.
     * @return false|int
     * @throws Exception
     */
    public function del_friend(int $friend_id){
        $db = new DataBase();
        $request = 'DELETE FROM `friend` WHERE `id_user1` = (SELECT `id` FROM `user` WHERE `email` = "'.$this->email.'") AND `id_user2` = '.$friend_id.';DELETE FROM `friend` WHERE `id_user2` = (SELECT `id` FROM `user` WHERE `email` = "'.$this->email.'") AND `id_user1` = '.$friend_id.';';
        return $db->addOrDelData($request, "milibrary", "root", "");
    }
}