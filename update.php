<?php 
  include('includes/autoloader.inc.php');
  $ISBN = $_GET['ISBN'];
  $books = new BooksController();
  $data = $books->readSpecificBookRequest($ISBN);
  unset($books);

  if(isset($_POST['update-book'])) {
    $books = new BooksController();
    $books->updateBookRequest($bookName, $bookAuthor, $datePublished, $ISBN);
    unset($books);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System - Updater Book</title>
</head>
<body>
  <form action="#" method="POST">
    <div>
      <h2>Update Book</h2>
    </div>
    <div>
      <label for="bookName">Book Name:</label>
      <input type="text" name="bookName" id="bookName" value="<?php echo $data[0]['book_name']; ?>">
    </div>
    <div>
      <label for="bookAuthor">Book Author:</label>
      <input type="text" name="bookAuthor" id="bookAuthor" value="<?php echo $data[0]['author']; ?>">
    </div>
    <div>
      <label for="datePublished">Date:</label>
      <input type="date" name="datePublished" id="datePublished" value="<?php echo $data[0]['date_published']; ?>">
    </div>
    <div>
      <label for="ISBN">ISBN:</label>
      <input type="text" name="ISBN" id="ISBN" value="<?php echo $data[0]['ISBN']; ?>">
    </div>
    <input type="submit" value="Update Book" name="update-book">
  </form>
</body>
</html>