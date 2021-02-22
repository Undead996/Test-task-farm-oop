<?php
 $animals = [
    ["animalId"=>0,"animalType"=>"cow"],
    ["animalId"=>1,"animalType"=>"cow"],
    ["animalId"=>2,"animalType"=>"cow"],
    ["animalId"=>3,"animalType"=>"cow"],
    ["animalId"=>4,"animalType"=>"cow"],
    ["animalId"=>5,"animalType"=>"cow"],
    ["animalId"=>6,"animalType"=>"cow"],
    ["animalId"=>7,"animalType"=>"cow"],
    ["animalId"=>8,"animalType"=>"cow"],
    ["animalId"=>9,"animalType"=>"cow"],
    ["animalId"=>10,"animalType"=>"chicken"],
    ["animalId"=>11,"animalType"=>"chicken"],
    ["animalId"=>12,"animalType"=>"chicken"],
    ["animalId"=>13,"animalType"=>"chicken"],
    ["animalId"=>14,"animalType"=>"chicken"],
    ["animalId"=>15,"animalType"=>"chicken"],
    ["animalId"=>16,"animalType"=>"chicken"],
    ["animalId"=>17,"animalType"=>"chicken"],
    ["animalId"=>18,"animalType"=>"chicken"],
    ["animalId"=>19,"animalType"=>"chicken"],
    ["animalId"=>20,"animalType"=>"chicken"],
    ["animalId"=>21,"animalType"=>"chicken"],
    ["animalId"=>22,"animalType"=>"chicken"],
    ["animalId"=>23,"animalType"=>"chicken"],
    ["animalId"=>24,"animalType"=>"chicken"],
    ["animalId"=>25,"animalType"=>"chicken"],
    ["animalId"=>26,"animalType"=>"chicken"],
    ["animalId"=>27,"animalType"=>"chicken"],
    ["animalId"=>28,"animalType"=>"chicken"],
    ["animalId"=>29,"animalType"=>"chicken"],
]; //Массив данных - полученный откуда-то.


 abstract class Barn{
     protected array $data;
     protected static array $collection = [];
     public function __construct(array $data)//Объект принимает массив.
     {
        $this->data = $data;//Добаляет животных в хлев.
     }

     abstract protected function getSome():int;
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

class Cow extends Barn{
    protected function getSome():int
    {
        return rand(8,12);
    }
    public function productCollect():void
    {
        $data=parent::getData();
        $collect=parent::getCollection();
        $collect["milk"]=0;
        foreach($data as $d){
            if($d["animalType"]=="cow"){
                $collect["milk"]=$collect["milk"]+$this->getSome();
            }
        }
        $collect["milk"]=(string)$collect["milk"]." л. молока\n";
        parent::setCollection($collect);
    }
}

class Chicken extends Barn{
    protected function getSome():int
    {
        return rand(0,1);
    }
    public function productCollect():void{
        $data=parent::getData();
        $collect=parent::getCollection();
        $collect["chicken"]=0;
        foreach($data as $d){
            if($d["animalType"]=="chicken"){
                $collect["chicken"]=$collect["chicken"]+$this->getSome();
            }
        }
        $collect["chicken"]=(string)$collect["chicken"]." шт. яиц\n";
        parent::setCollection($collect);
    }
}

$cow=new Cow($animals);
$ch=new Chicken($animals);
$cow->productCollect();
$ch->productCollect();
Barn::showResult();

