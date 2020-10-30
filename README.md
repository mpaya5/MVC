# MVC
## What is MVC?

The **Model-View-Controller** (MVC) is an architectural pattern that separates an application into three main logical components: the model, the view, and the controller. Each of these components are built to handle specific development aspects of an application. MVC is one of the most frequently used industry-standard web development framework to create scalable and extensible projects.

**MVC**
- Model: is the business logic. That is, the classes and methods that communicate directly with the database.
- View: it is in charge of displaying the information to the user, graphically and legibly.
- Controller: the intermediary between the view and the model, is in charge of controlling the user's interactions in the view, requests the data from the model and returns it back to the view so that it shows it to the user. That is, the calls to classes and methods, and the data received from forms.

**The basic operation of the MVC pattern can be summarized as:**
- The user makes a request.
- The controller captures the request.
- Makes the call to the corresponding model.
- The model will be in charge of interacting with the database.
- The controller receives the information and sends it to the view.
- The view shows the information.

## How to implement MVC in PHP?

To implement the MVC it is essential to create a file structure similar to this:

:file_folder: controllers
:file_folder: db
:file_folder: models
:file_folder: views
:page_facing_up: index.php

Let's look at a typical example of using MVC with PHP. To understand it, it would be better for you to know Object Oriented PHP and how the MySQLi extension works:

:page_facing_up: index.php
```
<?php
require_once("db/db.php");
require_once("controllers/cars_controller.php");
?>
```
:page_facing_up: db.php
```
<?php
class Conect{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "mvc");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
```
:file_folder: models/:page_facing_up:car_model.php
```
<?php
class car_model{
    private $db;
    private $cars;
 
    public function __construct(){
        $this->db=Conect::conexion();
        $this->cars=array();
    }
    public function get_cars(){
        $query=$this->db->query("select * from cars;");
        while($rows=$query->fetch_assoc()){
            $this->cars[]=$rows;
        }
        return $this->cars;
    }
}
?>
```
:file_folder:controller/:page_facing_up:cars_controller.php
```
<?php
//Calling to the model
require_once("models/cars_model.php");
$per=new cars_model();
$dates=$per->get_cars();
 
//Calling to the view
require_once("views/cars_view.phtml");
?>
```
The controller must always have this structure called the model and underneath it in view, if there are more models and views, it continues to do so with all of them.

:file_folder:view/:page_facing_up:cars_view.phtml
```
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Cars</title>
    </head>
    <body>
        <?php
            foreach ($cars as $car) {
                echo $car["brand"]."<br/>";
            }
        ?>
    </body>
</html>
```
### Important info

The files of the view according to the **Zend Framework** standard must use .phtml, but it could without any problem use the extension .php
Many say that it is advisable to use [CamelCase](https://en.wikipedia.org/wiki/Camel_case) in the names of files and classes, for practical purposes it does not matter to use it or not, even some frameworks such as Codeigniter suggest that we use names like "wellcome_model" that is why I have not used CamelCase. If you can and want, abuse the CamelCase, because that's what the standards say.
