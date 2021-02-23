<?php
 $animals = [
    ["animalId"=>0,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>1,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>2,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>3,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>4,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>5,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>6,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>7,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>8,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>9,"animalType"=>"cow", "products"=>["milk"]],
    ["animalId"=>10,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>11,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>12,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>13,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>14,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>15,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>16,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>17,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>18,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>19,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>20,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>21,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>22,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>23,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>24,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>25,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>26,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>27,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>28,"animalType"=>"chicken", "products"=>["eggs"]],
    ["animalId"=>29,"animalType"=>"chicken", "products"=>["eggs"]],
]; //Массив данных - полученный откуда-то.


 abstract class Barn{
     protected array $data;
     protected static array $collection = [];
     public function __construct(array $data)//Объект принимает массив.
     {
        $this->data = $data;//Добаляет животных в хлев.
     }

     abstract protected function getSome($product):int;
     abstract protected function productCollect():void;//"Доит коров и т.д."

     protected function getData():array
     {
        return $this->data;
     }
     protected function getCollection():array
     {
        return self::$collection;
     }
     protected function setCollection(array $coll):void
     {
         self::$collection = $coll;
     }
     
     public static function showResult():void//метод выводит результат.
     {  
         echo ("Всего:\n");
         foreach(self::$collection as $coll){
             echo ($coll);
         }
     }
}

class Animal extends Barn{
    protected function getSome($product):int
    {
        if($product==="milk"){
            return rand(8,12);
        }elseif($product==="eggs"){
            return rand(0,1);
        }else{
            echo "Некоректный продукт";
            die;
        }
    }
    public function productCollect():void
    {
        $data=parent::getData();
        $collect=parent::getCollection();
        $collect["milk"]=0;
        $collect["eggs"]=0;
        foreach($data as $d){
            foreach($d["products"] as $prod){//цикл для проверки продуктов(если на 1 животное будет более одного продукта)
                $collect[$prod]=$collect[$prod]+$this->getSome($prod);
            }
        }
        $collect["milk"]=(string)$collect["milk"]." л. молока\n";
        $collect["eggs"]=(string)$collect["eggs"]." шт. яиц\n";
        parent::setCollection($collect);
    }
}

$animal=new Animal($animals);
$animal->productCollect();
Barn::showResult();

