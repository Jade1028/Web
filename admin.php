<form action="" method="POST">
    <label for="book_name">Book Name:</label>
    <input type="text" id="book_name" name="book_name" required>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required>

    <label for="book_image">Book Image:</label>
    <input type="file" id="book_image" name="book_image" accept="image/*" required>

    <input type="submit" name="submit" value="Upload Item">
</form>