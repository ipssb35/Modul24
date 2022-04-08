
<?php
/*Практическое задание.
Предположим, у нас есть игра в автотематике. 
У нас есть машины, танки, спецтехника, которые имеют свой набор характеристик, умеют ехать вперед и назад, а некоторые могут даже размахивать ковшом. 
На основе этой информации постройте классы с использованием абстрактного класса и интерфейса. 
Напишите принимающую объект машины функцию, которая бы заставляла ее ехать и вызвала одну из способностей машины.
Пусть, если это легковое авто, будет закись азота, если это бульдозер, — управление ковшом.
Принимающая функция должна быть полиморфной. Необходимо реализовать только структуру.
*/
interface AutoInterface
{
    public function goAhead(); // движение вперед
    public function goBack(); // движение назад
}

abstract class Car implements AutoInterface
{
    public function goAhead() {}
    public function goBack() {}
    abstract public function superAbility(); // супер способность
    
    public function bigGun() {} // большая пушка
    public function signal() {} // сигнал
    public function wipers() {} // дворники
    public function leatherInterior() {} // кожаный салон
}

class Tank extends Car
{
    public function superAbility() {} // выстрел с пушки
}

class Auto extends Car
{
    public function superAbility() {} // закись азота
}

class Buldozer extends Car
{
    public function superAbility() {} // управление ковшом
}

/* ################################ */

function carFunc($class)
{
    echo $class->goAhead();
    echo $class->goBack();
    echo $class->superAbility();

    if (get_class($class) === 'Tank') echo $class->bigGun();

    if (get_class($class) === 'Auto')
    {
        echo $class->signal();
        echo $class->wipers();
    }
    
    if (get_class($class) === 'Buldozer') echo $class->leatherInterior();
}

$tank = new Tank();
$auto = new Auto();
$buldozer = new Buldozer();

carFunc($tank);
carFunc($auto);
carFunc($buldozer);