<?php
require ('ProcessGoogleBooksAPIMetadata.php');


$book_metadata_request = new ProcessGoogleBooksAPIMetadata("Alice au pays des merveilles");
try {
    $book_metadata = $book_metadata_request->get_book_metadata();
    $book_metadata_request->save_books_info_in_db();
} catch (Throwable $e) {
    echo $e;
}
//var_dump($book_metadata);
$data = json_decode($book_metadata, $assoc = true);


