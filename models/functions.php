<?php
function returnAll($tableName)
{

    global $conn;
    $q = "SELECT * FROM $tableName";
    $data = $conn->query($q)->fetchAll();
    return $data;
}

function userEntry($firstName, $lastName, $username, $email, $encryptedPass, $userImage, $typeOfUser, $phone)
{
    global $conn;
    $q = "INSERT INTO users(User_FirstName, User_LastName, User_Username, User_Email, User_Phone, User_Password, User_Image, Type_ID) VALUES (:fname, :lname, :username, :email, :phone ,:pass, :uimage, :typeuser)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':fname', $firstName);
    $prepare->bindParam(':lname', $lastName);
    $prepare->bindParam(':username', $username);
    $prepare->bindParam(':pass', $encryptedPass);
    $prepare->bindParam(':uimage', $userImage);
    $prepare->bindParam(':email', $email);
    $prepare->bindParam(':phone', $phone);
    $prepare->bindParam(':typeuser', $typeOfUser);

    $result = $prepare->execute();
    return $result;
}

function returnUser($username)
{
    global $conn;
    $q = "SELECT * FROM users u JOIN types_of_users t ON u.Type_ID = t.Type_ID WHERE User_Username = :username";
    $prepare = $conn->prepare($q);
    $prepare->bindParam(':username', $username);
    $prepare->execute();

    $data = $prepare->fetch();
    return $data;
}

function returnUserId($id)
{
    global $conn;
    $q = "SELECT * FROM users u JOIN addresses a ON u.User_ID  = a.User_ID  WHERE u.User_ID = :id";
    $prepare = $conn->prepare($q);
    $prepare->bindParam(':id', $id);
    $prepare->execute();

    $data = $prepare->fetch();
    return $data;
}

function addressEntry($city, $zipCode, $streetName, $streetNumber, $country, $idUser)
{
    global $conn;
    $q = "INSERT INTO addresses(Address_City, Address_Street, Address_Number, Zip_Code, User_ID, Country_ID) VALUES (:city, :streetName, :streetNumber, :zipCode, :idUser, :country)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':city', $city);
    $prepare->bindParam(':streetName', $streetName);
    $prepare->bindParam(':streetNumber', $streetNumber);
    $prepare->bindParam(':zipCode', $zipCode);
    $prepare->bindParam(':idUser', $idUser);
    $prepare->bindParam(':country', $country);


    $result = $prepare->execute();
    return $result;
}

function returnAddress($idUser)
{
    global $conn;
    $q = "SELECT * FROM addresses WHERE User_ID = $idUser";
    $data = $conn->query($q)->fetch();
    return $data;
}

function returnCountry($idCountry)
{
    global $conn;
    $q = "SELECT * FROM countries WHERE Country_ID = $idCountry";
    $data = $conn->query($q)->fetch();
    return $data;
}

function retunrBlockedUser($username)
{
    global $conn;
    $q = "SELECT * FROM blocked_users WHERE User_Username = :username";
    $prepare = $conn->prepare($q);
    $prepare->bindParam(':username', $username);
    $prepare->execute();

    $data = $prepare->fetch();
    return $data;
}

function returnUserMessage($idUser)
{
    global $conn;
    $q = "SELECT * FROM messages WHERE User_ID = $idUser";
    $data = $conn->query($q)->fetch();
    return $data;
}

function insertMessage($idUser, $message)
{
    global $conn;
    $q = "INSERT INTO messages(Message_Text, User_ID) VALUES (:bmessage, :idUser)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':idUser', $idUser);
    $prepare->bindParam(':bmessage', $message);


    $result = $prepare->execute();
    return $result;
}

function returnUserIdNoAdd($idUser)
{
    global $conn;
    $q = "SELECT * FROM users WHERE User_ID = $idUser";
    $data = $conn->query($q)->fetch();
    return $data;
}

function editAddres($city, $zipCode, $streetName, $streetNumber, $country, $userId)
{
    global $conn;
    $q = "UPDATE addresses SET Address_City = :city, Address_Street = :streetName, Address_Number = :streetNumber, Zip_Code = :zipCode, Country_ID = :country WHERE User_ID = :userId";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':city', $city);
    $prepare->bindParam(':streetName', $streetName);
    $prepare->bindParam(':streetNumber', $streetNumber);
    $prepare->bindParam(':zipCode', $zipCode);
    $prepare->bindParam(':country', $country);
    $prepare->bindParam(':userId', $userId);

    $data = $prepare->execute();

    return $data;
}

function editUser($userId, $firstName, $lastName, $phone, $encryptedNewPass)
{
    global $conn;

    $q = "UPDATE users SET User_FirstName = :firstName , User_LastName = :lastName, User_Phone = :phone, User_Password = :encryptedNewPass  WHERE User_ID = $userId";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':firstName', $firstName);
    $prepare->bindParam(':lastName', $lastName);
    $prepare->bindParam(':phone', $phone);
    $prepare->bindParam(':encryptedNewPass', $encryptedNewPass);

    $data = $prepare->execute();
    return $data;
}

function dellete($table, $col, $userId)
{
    global $conn;

    $q = "DELETE FROM $table WHERE $col = $userId";

    $prepare = $conn->prepare($q);
    $rezultat = $prepare->execute();
    return $rezultat;
}

function changeImg($newName, $userID)
{
    global $conn;

    $q = "UPDATE users SET User_Image = :userImage  WHERE User_ID = $userID";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':userImage', $newName);

    $data = $prepare->execute();
    return $data;
}

function returnProducts()
{
    global $conn;
    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID = c.Category_ID JOIN brands b ON p.Brand_ID = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID";
    $data = $conn->query($q)->fetchAll();
    return $data;
}

function returnBlockID()
{
    global $conn;
    
    $q = "SELECT * FROM blocked_users b JOIN messages m ON b.User_ID  = m.User_ID";
    $data = $conn->query($q)->fetchAll();
    return $data;
}

function blockUser($userId, $username, $reason)
{
    global $conn;
    $q = "INSERT INTO blocked_users(User_ID, User_Username, Block_Reason) VALUES (:userid, :username, :reason)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':userid', $userId);
    $prepare->bindParam(':username', $username);
    $prepare->bindParam(':reason', $reason);


    $result = $prepare->execute();
    return $result;
}

function categoryEntry($catName)
{
    global $conn;
    $q = "INSERT INTO categories (Category_Name) VALUES (:catName)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':catName', $catName);



    $result = $prepare->execute();
    return $result;
}

function  BrandEntry($BrandName)
{
    global $conn;
    $q = "INSERT INTO brands (Brand_Name) VALUES (:BrandName)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':BrandName', $BrandName);



    $result = $prepare->execute();
    return $result;
}

function productsEntry($tbProductName, $tbUnitPrice, $taDescription, $tbUnits, $rbactivity, $ddlCat, $ddlBrand)
{
    global $conn;
    $q = "INSERT INTO products(Product_Name, Product_UnitPrice, Product_Desription, Product_UnitsInStock, Product_Activity, Category_ID , Brand_ID ) VALUES (:tbProductName, :tbUnitPrice, :taDescription, :tbUnits, :rbactivity ,:ddlCat, :ddlBrand)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':tbProductName', $tbProductName);
    $prepare->bindParam(':tbUnitPrice', $tbUnitPrice);
    $prepare->bindParam(':taDescription', $taDescription);
    $prepare->bindParam(':tbUnits', $tbUnits);
    $prepare->bindParam(':rbactivity', $rbactivity);
    $prepare->bindParam(':ddlCat', $ddlCat);
    $prepare->bindParam(':ddlBrand', $ddlBrand);

    $result = $prepare->execute();
    return $result;
}

define("PROD_OFFSET", 16);

function retunrNumOfProd()
{
    global $conn;
    $q = "SELECT COUNT(*) AS num FROM products";
    $data = $conn->query($q)->fetch();

    return $data;
}

function returnPages()
{
    $numProd = retunrNumOfProd();
    $numPages = ceil($numProd->num / PROD_OFFSET);

    return $numPages;
}


function returnProductsPag($limit = 0)
{
    global $conn;

    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID  = c.Category_ID  JOIN brands b ON p.Brand_ID  = b.Brand_ID  LIMIT :limit, :offset";
    $prepare = $conn->prepare($q);

    $limit = ((int) $limit) * PROD_OFFSET;
    $prepare->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = PROD_OFFSET;
    $prepare->bindParam(":offset", $offset, PDO::PARAM_INT);

    $prepare->execute();

    $data = $prepare->fetchAll();

    return $data;
}

function retunrNumOfProdCB($idCat, $idBrand)
{
    global $conn;
    $q = "SELECT COUNT(*) AS num FROM products WHERE Category_ID = $idCat AND Brand_ID =  $idBrand";
    $data = $conn->query($q)->fetch();

    return $data;
}

function returnPagesCB($numProd)
{

    $numPages = ceil($numProd / PROD_OFFSET);

    return $numPages;
}

function returnProductsPagShopCB($idCat, $idBrand, $limit = 0)
{
    global $conn;

    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID  = c.Category_ID  JOIN brands b ON p.Brand_ID  = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID WHERE p.Category_ID = $idCat AND p.Brand_ID =  $idBrand  LIMIT :limit, :offset";
    $prepare = $conn->prepare($q);

    $limit = ((int) $limit) * PROD_OFFSET;
    $prepare->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = PROD_OFFSET;
    $prepare->bindParam(":offset", $offset, PDO::PARAM_INT);

    $prepare->execute();

    $data = $prepare->fetchAll();

    return $data;
}


function retunrNumOfProdB($idBrand)
{
    global $conn;
    $q = "SELECT COUNT(*) AS num FROM products WHERE Brand_ID =  $idBrand";
    $data = $conn->query($q)->fetch();

    return $data;
}

function returnPagesB($numProd)
{

    $numPages = ceil($numProd / PROD_OFFSET);

    return $numPages;
}

function returnProductsPagShopB($idBrand, $limit = 0)
{
    global $conn;

    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID  = c.Category_ID  JOIN brands b ON p.Brand_ID  = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID WHERE p.Brand_ID =  $idBrand  LIMIT :limit, :offset";
    $prepare = $conn->prepare($q);

    $limit = ((int) $limit) * PROD_OFFSET;
    $prepare->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = PROD_OFFSET;
    $prepare->bindParam(":offset", $offset, PDO::PARAM_INT);

    $prepare->execute();

    $data = $prepare->fetchAll();

    return $data;
}


function retunrNumOfProdC($idCat)
{
    global $conn;
    $q = "SELECT COUNT(*) AS num FROM products WHERE Category_ID = $idCat";
    $data = $conn->query($q)->fetch();

    return $data;
}

function returnPagesC($numProd)
{

    $numPages = ceil($numProd / PROD_OFFSET);

    return $numPages;
}

function returnProductsPagShopC($idCat, $limit = 0)
{
    global $conn;

    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID  = c.Category_ID  JOIN brands b ON p.Brand_ID  = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID WHERE p.Category_ID = $idCat  LIMIT :limit, :offset";
    $prepare = $conn->prepare($q);

    $limit = ((int) $limit) * PROD_OFFSET;
    $prepare->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = PROD_OFFSET;
    $prepare->bindParam(":offset", $offset, PDO::PARAM_INT);

    $prepare->execute();

    $data = $prepare->fetchAll();

    return $data;
}

function returnProductsPagShop($limit = 0)
{
    global $conn;

    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID  = c.Category_ID  JOIN brands b ON p.Brand_ID  = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID  LIMIT :limit, :offset";
    $prepare = $conn->prepare($q);

    $limit = ((int) $limit) * PROD_OFFSET;
    $prepare->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = PROD_OFFSET;
    $prepare->bindParam(":offset", $offset, PDO::PARAM_INT);

    $prepare->execute();

    $data = $prepare->fetchAll();

    return $data;
}

function updateQuantity($id, $quantity)
{
    global $conn;

    $q = "UPDATE products SET Product_UnitsInStock = :quantity WHERE Product_ID = :id";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':quantity', $quantity);
    $prepare->bindParam(':id', $id);


    $data = $prepare->execute();
    return $data;
}

function returnProduct($id)
{
    global $conn;
    $q = "SELECT * FROM products p JOIN images i ON p.Product_ID = i.Product_ID JOIN categories c ON p.Category_ID = c.Category_ID WHERE p.Product_ID = :id ";
    $prepare = $conn->prepare($q);
    $prepare->bindParam(':id', $id);
    $prepare->execute();

    $data = $prepare->fetch();
    return $data;
}

function activity($id, $activ)
{
    global $conn;

    $q = "UPDATE products SET Product_Activity = :activ WHERE Product_ID = :id";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':activ', $activ);
    $prepare->bindParam(':id', $id);


    $data = $prepare->execute();
    return $data;
}

function returnProductsName($pname)
{
    global $conn;
    $q = "SELECT * FROM products WHERE Product_Name = :pname";
    $prepare = $conn->prepare($q);
    $prepare->bindParam(':pname', $pname);
    $prepare->execute();

    $data = $prepare->fetch();
    return $data;
}

function enterImg($url, $productID)
{
    global $conn;
    $q = "INSERT INTO images(Image_Url, Product_ID) VALUES (:url, :productID)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':url', $url);
    $prepare->bindParam(':productID', $productID);


    $result = $prepare->execute();
    return $result;
}

function ordersEntry($addressID , $userID){
    global $conn;
    $q = "INSERT INTO orders(Address_ID, User_ID) VALUES (:addressID, $userID)";

    $prepare = $conn->prepare($q);
    $prepare->bindParam(':addressID', $addressID);


    $result = $prepare->execute();
    return $result;
}

function returnOrderID($userID){
    global $conn;

    $q = "SELECT LAST_INSERT_ID() as ID FROM orders WHERE User_ID =$userID";
    $data = $conn->query($q)->fetch();
    return $data;
}

function oredrDetailsEnter($orderID, $productID, $productUnitePrice, $Quantity){
    global $conn;
    $q = "INSERT INTO order_details(Order_ID, Product_ID, Current_UnitPrice, Quantity) VALUES ($orderID, $productID, $productUnitePrice, $Quantity)";

    $prepare = $conn->prepare($q);

    $result = $prepare->execute();
    return $result;
}

function purchasedProducts($userID){
    global $conn;
    $q = "SELECT * FROM products p JOIN order_details od ON p.Product_ID = od.Product_ID JOIN images i ON p.Product_ID = i.Product_ID JOIN categories c ON p.Category_ID = c.Category_ID JOIN orders o ON od.Order_ID = o.Order_ID JOIN users u ON o.User_ID = u.User_ID WHERE u.User_ID = $userID";
    $data = $conn->query($q)->fetchAll();

    return $data;
}

function updateQuantityBuy($productID, $Quantity){
    global $conn;

    $q = "UPDATE products SET Product_UnitsInStock = Product_UnitsInStock-$Quantity  WHERE Product_ID = $productID";

    $prepare = $conn->prepare($q);
   

    $data = $prepare->execute();
    return $data;
}

function returnCategoriesProducts(){
    global $conn;
    $q = "SELECT * FROM categories c JOIN products p ON c.Category_ID = p.Category_ID";
    $data = $conn->query($q)->fetchAll();
    return $data;
}

function returnProductsCat($category){
    global $conn;
    $q = "SELECT * FROM products p JOIN categories c ON p.Category_ID = c.Category_ID JOIN brands b ON p.Brand_ID = b.Brand_ID JOIN images i ON p.Product_ID = i.Product_ID WHERE p.Category_ID = $category";
    $data = $conn->query($q)->fetchAll();
    return $data;
}