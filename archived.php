<?php 
  include('includes/autoloader.inc.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System - Unlisted Books</title>
  <link rel="stylesheet" href="css/archived.css">
</head>
<body>
  <main>
    <section class="archived-books-container">

      <table>
        <thead>
          <tr>
            <th>Book Name</th>
            <th>Book Author</th>
            <th>Book Date Published</th>
            <th>ISBN</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $unlisted = new BooksController();
            $data = $unlisted->unlistedBooks();
            unset($unlisted);
            if(!empty($data)){
              foreach($data as $row){
                echo '
                  <tr>
                    <td>'.$row['book_name'].'</td>
                    <td>'.$row['author'].'</td>
                    <td>'.$row['date_published'].'</td>
                    <td>'.$row['ISBN'].'</td>
                    <td>Action</td>
                  </tr>
                ';
              }
            }else{
              echo '                  
              <tr>
              <td>None</td>
              <td>None</td>
              <td>None</td>
              <td>None</td>
              <td>Action</td>
            </tr>';
            }
          ?>
        </tbody>
      </table>
    </section>
    <a href="homepage.php">Back to Home</a>
  </main>
</body>
</html>