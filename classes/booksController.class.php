<?php 

class BooksController extends Books {
  function listBookRequest($bookName, $bookAuthor, $datePublished, $ISBN) {
    $response = $this->createBook($bookName, $bookAuthor, $datePublished, $ISBN);
    if($response == true){
      header('location: homepage.php?bookedlisted=sucess');
    }else{
      header('location: homepage.php?bookedlisted=failed');
    }
  }

  function readBookRequest() {
    $data = $this->readBook();
    return $data;
  }

  function readSpecificBookRequest($ISBN){
    $data = $this->readSpecificBook($ISBN);
    return $data;
  }
  function unlistedBooksRequest() {
    $data = $this->unlistedBooks();
    return $data;
  }

  function unlistBookRequest($ISBN) {
    $response = $this->unlistBook($ISBN);
    if($response == true){
      header('location: homepage.php?bookunlisted=success');
    }else{
      header('location: homepage.php?bookunlisted=failed');
    }
  }

  function updateBookRequest($bookName, $bookAuthor, $datePublished, $ISBN) {
    $response = $this->updateBook($bookName, $bookAuthor, $datePublished, $ISBN);
  }

  function updateStatusRequest($ISBN) {
    $response = $this->unlistBook($ISBN);
    if($response == true){
      header('location: homepage.php?archived=sucess');
    }else{
      header('location: homepage.php?archived=failed');
    }
  }

}