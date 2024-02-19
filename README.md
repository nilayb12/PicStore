# PicStore
An Image Hosting Solution
## How to Deploy:
1. Install XAMPP.
2. Create a DB & Table with your choice of names.
   1. You can also create a User specifically for this Application.
   2. Make sure to give Proper Permissions and Level of Access to this Account.
3. Make 2 Columns in your Table with `FileName` as the Second Column, and both type TEXT/VARCHAR.
4. Clone the Project in `C:\xampp\htdocs`.
5. Create your own `db.Config.php` as follows (Remove the existing one):
```php
<?php
$db = mysqli_connect('localhost', 'YOUR_ACCOUNT_USERNAME', 'YOUR_ACCOUNT_PASSWORD', 'DB_NAME');
?>
```
6. Create a folder `images` in `C:\xampp\htdocs\PicStore`.
7. Run the Project as usual now.