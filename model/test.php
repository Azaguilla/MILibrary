<?php
require ('ProcessGoogleBooksAPIMetadata.php');
require ('BookMetadataProcess.php');

$book_metadata_request = new ProcessGoogleBooksAPIMetadata("légende");
$process_book_data = new BookMetadataProcess(9782330024215);
try {
    $books_metadata = $book_metadata_request->get_books_metadata();
    $book_metadata_request->save_books_info_in_db();

    $book_data = $process_book_data->get_book_metadata_from_db();
    var_dump($book_data);

    //$process_book_data->add_book_to_user_objects(1);
    $process_book_data->update_comment_and_rate(1, 5,"J'adore !!");
} catch (Throwable $e) {
    echo $e;
}
//var_dump($book_metadata);
//$data = json_decode($book_metadata, $assoc = true);


