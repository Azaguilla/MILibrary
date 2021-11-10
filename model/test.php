<?php
require ('ProcessGoogleBooksAPIMetadata.php');
require ('BookMetadataProcess.php');

$book_metadata_request = new ProcessGoogleBooksAPIMetadata("légende");
$process_book_data = new BookMetadataProcess(9782330024215);
try {
    # Faire la recherche
    $books_metadata = $book_metadata_request->get_books_metadata();
    var_dump($books_metadata);

    # Enregistrer les infos des livres dans la db
    $book_metadata_request->save_books_info_in_db();

    # Afficher les métadonnées du livre sélectionné
    $book_data = $process_book_data->get_book_metadata_from_db();
    var_dump($book_data);

    # Ajouter le livre à la bibliothèque de l'utilisateur
    var_dump($process_book_data->add_book_to_user_objects(1));

    # Afficher les métadonnées du livre lorsqu'il est dans la bibliothèque de l'utilisateur
    var_dump($process_book_data->get_user_book_metadata_from_db(1));

    # Modifier la note et le commentaire et réfficher le livre
    $process_book_data->update_comment_and_rate(1, 5,"J'adore !!");
    var_dump($process_book_data->get_user_book_metadata_from_db(1));

    # Supprimer le livre de la bibliothèque de l'utilisateur
    var_dump($process_book_data->delete_book_from_user_objects(1));

} catch (Throwable $e) {
    echo $e;
}
//var_dump($book_metadata);
//$data = json_decode($book_metadata, $assoc = true);


