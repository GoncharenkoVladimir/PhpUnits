<?php
require __DIR__ . '/../config/autoload.php';

use Entity\Triangle;
use Layer\Connector\MyConnect;
use Layer\Manager\ManagerTriangle;

$connect1 = new MyConnect();
$con = $connect1->connect($config['host'],$config['db_user'],$config['db_password'],$config['db_name']);

$manTri = new ManagerTriangle($con);
$result = $manTri->list_tables($con);


$tri = new Triangle();
if(isset($_POST['a'])) $tri->setA($_POST['a']); else $tri->setA('');
if(isset($_POST['b'])) $tri->setB($_POST['b']); else $tri->setB('');
if(isset($_POST['c'])) $tri->setC($_POST['c']); else $tri->setC('');
if(isset($_POST['function'])) $function = $_POST['function']; else $function = '';
$tri->calcPerimeterFigure();
$tri->calcSquareFigure();

?>

<div>
    <h3>Triangle</h3>
    <form method="post">
        <label for="a">Side A</label>
        <input type="text" name="a"><br>
        <label for="a">Side B</label>
        <input type="text" name="b"><br>
        <label for="a">Side C</label>
        <input type="text" name="c"><br>
        <select name="function">
            <option name="insert" value="insert">insert</option>
            <option name="remove" value="remove">remove</option>
            <option name="update" value="update">update</option>
            <option name="find" value="find">find</option>
            <option name="findall" value="findall">findall</option>
            <option name="findby" value="findby">findby</option>
        </select><br>
        <button type="submit">LET'S DO IT!!!!</button>
    </form>
</div>

<?php

echo 'Perimeter figure = '.$tri->calcPerimeterFigure()."<br>";
echo 'Square figure = '.$tri->calcSquareFigure()."<br>";

switch ($function){
    case 'insert':
        $manTri->insert($tri);
        break;
    case 'remove':
        $manTri->remove($tri);
        break;
    case 'update':
        $manTri->update($tri);
        break;
    case 'find':
        $resMas = $manTri->find('Triangle', $tri->getA());
        var_dump($resMas);
        break;
    case 'findall':
        $resMas = $manTri->findAll('Triangle', 2);
        var_dump($resMas);
        break;
    case 'findby':
        $resMas = $manTri->findBy('Triangle', ['sideA','sideB']);
        var_dump($resMas);
        break;
}
?>