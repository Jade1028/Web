<div class="slider">
    <div class ="list">
        <div class ="item">
            <img src="images/img1.png" alt="image" title="New book arrival">
        </div>
        <div class ="item">
            <img src="images/img2.png" alt="image" title="Discount">
        </div>
        <div class ="item">
            <img src="images/img3.png" alt="image" title="Back to school">
        </div>
   </div>


<!-- button for prev and next -->
    <div class="buttons">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>

<!-- dots -->
    <ul class="dots">
        <li class="active"></li>
        <li></li>
        <li></li>
    </ul>
</div>

<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
$servername = "localhost";
$username = "root";
$DBpassword = "";

$conn = new mysqli($servername, $username, $DBpassword);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
        
// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS GoBookDB";
if ($conn->query($sql) === FALSE) 
{
    echo "Error creating database: " . $conn->error;
}
        
// Select the database
$conn->select_db("GoBookDB");

   // Database connection
   $conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');

   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

   $sql = "CREATE TABLE IF NOT EXISTS Product (
      id INT AUTO_INCREMENT PRIMARY KEY,
      book_image VARCHAR(255) NOT NULL,
      book_name VARCHAR(255) NOT NULL,
      author VARCHAR(255) NOT NULL,
      price DECIMAL(10,2) NOT NULL,
      description TEXT NOT NULL,
      category VARCHAR(255) NOT NULL
  )";

  if ($conn->query($sql) === FALSE) 
  {
      echo "Error creating table: " . $conn->error;
  }

   $sql = "CREATE TABLE IF NOT EXISTS cart (
      id INT AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(255) NOT NULL,
      book_image VARCHAR(255) NOT NULL,
      book_name VARCHAR(255) NOT NULL,
      price DECIMAL(10,2) NOT NULL,
      quantity INT NOT NULL
   )"; 

   if ($conn->query($sql) === FALSE) 
   {
      echo "Error creating table: " . $conn->error;
   } 

   function getFileContents($filePath) {
      if (file_exists($filePath)) {
          return file_get_contents($filePath);
      } else {
          return '';
      }
  }
  
  $products = [
      [
          'image' => 'images/hf_1.png',
          'name' => 'The Bright Sword',
          'author' => 'Lev Grossman',
          'price' => 65,
          'description_file' => 'description/hf_1.txt',
          'category' => 'Historical Fiction'
      ],

      [
         'image' => 'images/hf_2.png',
         'name' => 'The Lion Women of Tehran',
         'author' => 'Marjan Kamali',
         'price' => 70,
         'description_file' => 'description/hf_2.txt',
         'category' => 'Historical Fiction'
     ],
     [
         'image' => 'images/hf_3.png',
         'name' => 'The Briar Club',
         'author' => 'Kate Quinn',
         'price' => 50,
         'description_file' => 'description/hf_3.txt',
         'category' => 'Historical Fiction'
      ],
      [
         'image' => 'images/hf_4.png',
         'name' => 'Ne\'er Duke Well',
         'author' => 'Alexandra Vasti',
         'price' => 55,
         'description_file' => 'description/hf_4.txt',
         'category' => 'Historical Fiction'
      ],
      [
         'image' => 'images/hf_5.png',
         'name' => 'The Women',
         'author' => 'Kristin Hannah',
         'price' => 99,
         'description_file' => 'description/hf_5.txt',
         'category' => 'Historical Fiction'
      ],
      [
         'image' => 'images/hf_6.png',
         'name' => 'The King\'s Witches',
         'author' => 'Kristin Hannah',
         'price' => 79,
         'description_file' => 'description/hf_6.txt',
         'category' => 'Historical Fiction'
      ],
      [
         'image' => 'images/k_1.png',
         'name' => 'Harry Potter and the Philosopher\'s Stone',
         'author' => 'Rowling, J. K.',
         'price' => 45,
         'description_file' => 'description/k_1.txt',
         'category' => 'Kids'
      ],
      [
        'image' => 'images/k_2.png',
        'name' => 'Diary of a Wimpy Kid#1',
        'author' => 'Jeff Kinney',
        'price' => 40,
        'description_file' => 'description/k_2.txt',
        'category' => 'Kids'
     ],
     [
        'image' => 'images/k_3.png',
        'name' => 'The Swifts: A Dictionary of Scoundrels',
        'author' => 'Beth Lincoln, Claire Powell',
        'price' => 50,
        'description_file' => 'description/k_3.txt',
        'category' => 'Kids'
     ],
     [
        'image' => 'images/k_4.png',
        'name' => 'When I Feel Red',
        'author' => 'Lily Bailey',
        'price' => 60,
        'description_file' => 'description/k_4.txt',
        'category' => 'Kids'
     ],
     [
        'image' => 'images/k_5.png',
        'name' => 'The Christmas Pig',
        'author' => 'J. K. Rowling',
        'price' => 45,
        'description_file' => 'description/k_5.txt',
        'category' => 'Kids'
     ],
     [
        'image' => 'images/k_6.png',
        'name' => 'Dog Man 6: Brawl Of The Wild',
        'author' => 'Dav Pilkey',
        'price' => 35,
        'description_file' => 'description/k_6.txt',
        'category' => 'Kids'
     ],
     [
        'image' => 'images/m_1.png',
        'name' => 'SPY×FAMILY 3',
        'author' => 'Tatsuya Endo',
        'price' => 45,
        'description_file' => 'description/m_1.txt',
        'category' => 'Manga'
     ],
     [
        'image' => 'images/m_2.png',
        'name' => 'Jujutsu Kaisen 22',
        'author' => 'Gege Akutami',
        'price' => 45,
        'description_file' => 'description/m_2.txt',
        'category' => 'Manga'
     ],
     [
        'image' => 'images/m_3.png',
        'name' => 'Jujutsu Kaisen 28',
        'author' => 'Gege Akutami',
        'price' => 50,
        'description_file' => 'description/m_3.txt',
        'category' => 'Manga'
     ],
     [
        'image' => 'images/m_4.png',
        'name' => 'ONE PIECE, Vol.109',
        'author' => 'Eiichiro Oda',
        'price' => 59.99,
        'description_file' => 'description/m_4.txt',
        'category' => 'Manga'
     ],
     [
        'image' => 'images/m_5.png',
        'name' => 'Alya Sometimes Hides Her Feelings in Russian, Vol. 5',
        'author' => 'SunSunSun',
        'price' => 79.99,
        'description_file' => 'description/m_5.txt',
        'category' => 'Manga'
     ],
     [
        'image' => 'images/m_6.png',
        'name' => 'Attack on Titan, Vol. 16',
        'author' => 'Hajime Isayama',
        'price' => 59.99,
        'description_file' => 'description/m_6.txt',
        'category' => 'Manga'
     ]
      // Products
  ];
  
  foreach ($products as $product) {
      $imagePath = $product['image'];
      $bookName = $product['name'];
      $author = $product['author'];
      $price = $product['price'];
      $description = getFileContents($product['description_file']);
      $category = $product['category'];

      // Check if the product already exists
      $checkStmt = $conn->prepare("SELECT id FROM Product WHERE book_name = ? AND author = ?");
      $checkStmt->bind_param('ss', $bookName, $author);
      $checkStmt->execute();
      $checkStmt->store_result();
      
      if ($checkStmt->num_rows === 0) {
         // Prepare SQL statement for inserting new product
         $stmt = $conn->prepare("INSERT INTO Product (book_image, book_name, author, price, description, category) VALUES (?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('sssdss', $imagePath, $bookName, $author, $price, $description, $category);
         
         // Execute SQL statement
         if (!($stmt->execute())) {  
             echo "Error: " . $stmt->error . "<br>";
         }
          
          $stmt->close();
      }
      
      $checkStmt->close();
  }
  
// Query to retrieve all products
$sql = "SELECT * FROM Product ORDER BY category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   $currentCategory = "";
?> 
   <div class="container">
    <h1 class="title">OUR PRODUCTS</h1>
    <select id="category" onchange="categoryNavigation()">
    <option disabled selected value>--Select a category--</option>
    <option value="#historical-fiction">Historical Fiction</option>
    <option value="#kids">Kids</option>
    <option value="#manga">Manga</option>
    </select>

    <?php
    // Loop through each product and display it
        while ($row = $result->fetch_assoc()) {
        $category = htmlspecialchars($row['category']);

        // Check if the category has changed
        if ($category != $currentCategory) {
            // Close the previous category's container, if it's not the first one
            if ($currentCategory != "") {
                echo '</div>'; // Close products-container
                echo '</div>'; // Close same-types
            }

            // Update current category
            $currentCategory = $category;

            // Start a new category section
            echo '<div class="same-types" id="' . strtolower(str_replace(' ', '-', $currentCategory)) . '">';
            echo '<h5>' . $currentCategory . '</h5>';
            echo '<div class="products-container">';
        }
        ?>
            <div class="product" data-name="product-<?php echo htmlspecialchars($row['id']); ?>" book-name="<?php echo htmlspecialchars($row['book_name']); ?>">
            <img src="<?php echo htmlspecialchars($row['book_image']); ?>" alt="Product Image">
            <h3><?php echo htmlspecialchars($row['book_name']); ?></h3>
            <div class="price"><?php echo 'RM'. htmlspecialchars($row['price']); ?></div>
            </div>
            <?php
            }
            ?>
        </div> <!-- Close products-container -->
      </div> <!-- Close same-types -->
    </div> <!-- Close container -->

      <div class="products-preview">
      <?php
      $result->data_seek(0); // Reset the result pointer to the beginning
      while ($row = $result->fetch_assoc()) {
      ?>
         <form method="post" action="">
         <div class="preview" data-target="product-<?php echo htmlspecialchars($row['id']); ?>">
            <img src="<?php echo htmlspecialchars($row['book_image']); ?>" alt="Product Image">
            <div class="close">X</div>
            <h3><?php echo htmlspecialchars($row['book_name']); ?></h3>
            <h6>By <?php echo htmlspecialchars($row['author']); ?></h6>
            <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
            <div class="price"><?php echo 'RM'. htmlspecialchars($row['price']); ?></div>
            <input type="number" min="1" value="1" name="quantity">

            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <input type="hidden" name="book_name" value="<?php echo htmlspecialchars($row['book_name']); ?>">
            <input type="hidden" name="book_image" value="<?php echo htmlspecialchars($row['book_image']); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($row['price']); ?>">
                     
            <div class="cartButton">
               <input type="submit" value="Add to cart" name="cart" class="cart">
            </div>
         </form>
         </div>';
      <?php   
      }
      ?>
      
      </div><!-- Close products-preview-->
      </div><!-- Close same-types-->
   <?php
   } else {
      echo "No products found.";
   }

   echo'</div>'; //Close container

   if (isset($_POST['cart'])) 
   {
    $email = $_SESSION['email'];
    $cartBookName = $_POST['book_name'];
    $cartBookImage = $_POST['book_image'];
    $cartBookPrice = $_POST['price'];
    $cartQuantity = $_POST['quantity'];

    $checkStmt = $conn->prepare("SELECT quantity FROM Cart WHERE email = ? AND book_name = ?");
    $checkStmt->bind_param('ss', $email, $cartBookName);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) 
    {
        // If the product exists, update the quantity
        $row = $result->fetch_assoc();
        $newQuantity = $row['quantity'] + $cartQuantity;

        $updateStmt = $conn->prepare("UPDATE Cart SET quantity = ? WHERE email = ? AND book_name = ?");
        $updateStmt->bind_param('iss', $newQuantity, $email, $cartBookName);

        if ($updateStmt->execute()) 
        {
            echo "<script>alert('Product added to cart');</script>";
        } 
        else 
        {
            echo "Error: " . $updateStmt->error;
        }

    $updateStmt->close();
    } 
    else 
    {
        // If the product does not exist, insert a new row
        $cartStmt = $conn->prepare("INSERT INTO Cart (email, book_image, book_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
        $cartStmt->bind_param('sssdi', $email, $cartBookImage, $cartBookName, $cartBookPrice, $cartQuantity);

        if ($cartStmt->execute()) 
        {
            echo "<script>alert('Product added to cart');</script>";
        } 
        else 
        {
            echo "Error: " . $cartStmt->error;
        }

        $cartStmt->close();
    }
    $checkStmt->close();
    $conn->close();
      
   }
?>