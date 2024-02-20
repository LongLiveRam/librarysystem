<?php 


class Books extends Database {
  function createBook($bookName, $bookAuthor, $datePublished, $ISBN) {
    $stmt = $this->connect()->prepare("INSERT INTO books (book_name, author, date_published, ISBN, status) VALUES (?,?,?,?,'listed')");

    if($stmt->execute(array($bookName, $bookAuthor, $datePublished, $ISBN))) {
      return true;
    }else{
      return false;
    }
  }

  function readBook() {
    $stmt = $this->connect()->query("SELECT * FROM books WHERE status = 'listed'");
    $reponse = $stmt->fetchAll();
    return $reponse;
  }

  function readSpecificBook($ISBN) {
    $stmt = $this->connect()->query("SELECT * FROM books WHERE ISBN = $ISBN");
    $response = $stmt->fetchAll();
    return $response;
  }

  function unlistedBooks() {
    $stmt = $this->connect()->query("SELECT * FROM books WHERE status = 'unlisted'");
    $response = $stmt->fetchAll();
    if(!empty($response)) {
      return $response;
    }else{
      return false;
    }
  }
  function unlistBook($ISBN) {
    $stmt = $this->connect()->prepare("UPDATE books SET status = 'unlisted' WHERE ISBN = ?");
    if($stmt->execute(array($ISBN))) {
      return true;
    }else{
      return false;
    }
  }

  function relistBook($ISBN) {
    $stmt = $this->connect()->prepare("UPDATE books SET status = 'listed' WHERE ISBN = ?");
    if($stmt->execute(array($ISBN))) {
      return true;
    }else{
      return false;
    }
  }

  function updateBook($bookName, $bookAuthor, $datePublished, $ISBN, $markerISBN) {
    $stmt = $this->connect()->prepare("UPDATE books SET book_name = ?, author = ?, date_published = ?, ISBN = ? WHERE ISBN = ?");
    if($stmt->execute(array($bookName, $bookAuthor, $datePublished, $ISBN, $markerISBN))) {
      return true;
    }else{
      return false;
    }
  }
}