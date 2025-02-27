<?php
include "database.php";
include "tables.php";
include "header.php";
$obj=new database();
?>
<form id="add-form">
<label for="subject">Choose subject related to book:</label>
<select  id="subject">
<option value="">Select subject</option>
</select>
<br>
<br>
<label for="author">Select the author of book:</label>
<select  id="author-1">
<option value="">Select author</option>
</select>
<br>
<br>
<label for="publication">Choose the textbook :</label>
<select  id="textbooks-1">
<option value="">Select Textbooks</option>
</select>
<br>
<br>
<label for="Quantity">Enter the Quantity of this book:</label>
<input type="number" id="quantity">
<input type="submit" id="save-books" value="save">
</form>
<div id="success-msg"></div>
<div id="error-msg"></div>
<?php
   include('footer.php');
?>
