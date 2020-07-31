<?php require_once("dbConnection.php")?>
<?php
    function getAllBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getJSBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='js_book'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getCSSBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='css_book'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getPHPBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='php_book'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getMySQLBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='mysql_book'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getHTMLBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='html_book'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getAllInOneBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='all_in_one'";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    // for front page display
    function getLimitedBooks(){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='js_book' OR category='php_book' LIMIT 8";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getRelatedBooks($category){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE category='$category' LIMIT 4";
        //execute query
        $result = mysqli_query($conn, $query);
        //fetch all the data from the table
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free the result variable
        mysqli_free_result($result);
        return $books;
    }

    function getBookDetails($book_id){
        global $conn;
        //Create query
        $query = "SELECT * FROM web_prog_books WHERE book_id='$book_id'";
       
         //execute query
        $result = mysqli_query($conn, $query);
    
        //fetch the particular record from the table
        $book = mysqli_fetch_assoc($result);

        // //free the result variable
        mysqli_free_result($result);
        return $book;
    }

    // get user by email
    function getUser($email) {
        global $conn;
        $query = "SELECT * FROM users WHERE email = '$email' ";
        //execute query
        $result = mysqli_query($conn, $query);
         //fetch the user from the table
         $user = mysqli_fetch_assoc($result);
 
         // //free the result variable
         mysqli_free_result($result);
         return $user;
    }
    
    // get user by userId
    function getUserById($userId){
        global $conn;
        $query = "SELECT * FROM users WHERE user_id='$userId'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $user;
    }

    function getCartItemsByUserId($userId){
        global $conn;
        $query = "SELECT * FROM cart WHERE user_id = '$userId'";
        $result = mysqli_query($conn, $query);
        $cart_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
     return $cart_items;
    }



    function getAllMatchingResults($searchStr){
        global $conn;
        $query = "SELECT * FROM web_prog_books WHERE book_name LIKE '%$searchStr%' OR book_author LIKE '%$searchStr%' OR price LIKE '%$searchStr%' OR book_description LIKE '%$searchStr%'";
        $result = mysqli_query($conn, $query);
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
     return $searchResults;
    }

?>


