<?php
require ('ProcessGoogleBooksAPIMetadata.php');


$book_metadata_request = new ProcessGoogleBooksAPIMetadata("David Gemmell");
try {
    $book_metadata = $book_metadata_request->get_book_metadata();
} catch (Throwable $e) {
    echo $e;
}
echo $book_metadata;
