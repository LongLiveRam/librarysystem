<?php 
  include('includes/autoloader.inc.php');

  //register book
  if(isset($_POST['list-book'])){

    $bookName = htmlspecialchars($_POST['bookName']);
    $bookAuthor = htmlspecialchars($_POST['bookAuthor']);
    $datePublished = htmlspecialchars($_POST['datePublished']);
    $ISBN = htmlspecialchars($_POST['ISBN']);

    $datePublished = date("Y-m-d", strtotime($datePublished)); // format date PHP

    $listBook = new BooksController();
    $listBook->listBookRequest($bookName, $bookAuthor, $datePublished, $ISBN);
    unset($listBook);
  }

  $books = new BooksController();
  $data = $books->readBookRequest();
  unset($books);

  if(isset($_POST['unlist'])){
    $ISBN = $_POST['ISBN'];
    $books = new BooksController($ISBN);
    $books->unlistBookRequest($ISBN);
    unset($books);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System - Main</title>
  <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
  <header>
    <nav>
      <div>
        <h1>Library System</h1>
      </div>
      <div class="right">
        <a href="index.php">Logout</a>
        <a href="archived.php">Archived Books</a>
      </div>
    </nav>
  </header>

  <main>
    <div class="list-book">
      <form action="#" method="POST">
        <div>
          <h2>Add Books</h2>
        </div>
        <div>
          <label for="bookName">Book Name:</label>
          <input type="text" name="bookName" id="bookName">
        </div>
        <div>
          <label for="bookAuthor">Book Author:</label>
          <input type="text" name="bookAuthor" id="bookAuthor">
        </div>
        <div>
          <label for="datePublished">Date:</label>
          <input type="date" name="datePublished" id="datePublished">
        </div>
        <div>
          <label for="ISBN">ISBN:</label>
          <input type="text" name="ISBN" id="ISBN">
        </div>
        <input type="submit" value="Add Book" name="list-book">
      </form>
    </div>

    <section class="book-items-container">
      <?php 
        foreach($data as $row) {
          echo 
          '
          <div class="book-item">

            <form action="#" method="POST">

              <label for="bookItemName"><b>Book Name: </b>' .$row['book_name']. '</label><br>

              <label for="bookItemAuthor"><b>Book Author: </b>' .$row['author']. ' </label><br>

              <label for="bookItemPublished"><b>Date Published: </b>' .$row['date_published']. '</label><br>

              <label for="bookItemISBN"><b>ISBN: </b>' .$row['ISBN']. '</label><br>
              <input type="text" name="ISBN" value="'. $row['ISBN'] .'" hidden>
              <input type="submit" value="Purchase Book" name="purchase">
              <input type="number" name="bookQuantity" id="bookQuantity"><br>
              <input type="submit" value="Unlist Book" name="unlist">
              </form>
              <a href="update.php?ISBN='.$row['ISBN'].'" class="btn">Update Book</a>
            </div>
          ';
        }
      ?>
    </section>
  </main>

  <footer>

  </footer>
</body>
</html>