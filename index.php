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


 class Barn{
     private array $data;
     private array $collection = [
         "milk"=>0,"eggs"=>0
     ];
     public function __construct(array $data)//Объект принимает массив.
     {
        $this->data = $data;//Добаляет животных в хлев.
     }
     private function milkCollect():int
     {
         return rand(8,12);
     }
     private function eggCollect():int
     {
         return rand(0,1);
     }
     public function AllCollect():void//метод собирает продукцию.
     {  
         foreach($this->data as $animal){
             if($animal["animalType"]=="cow"){
                 $this->collection["milk"]=$this->collection["milk"]+$this->milkCollect();
             }elseif($animal["animalType"]=="chicken"){
                $this->collection["eggs"]=$this->collection["eggs"]+$this->eggCollect();
             }
         }
            
     }
     public function getCollection():void//метод выводит результат.
     {  
        echo "Всего:\n".$this->collection["milk"]." л. молока,\n".$this->collection["eggs"]." шт. яиц.";
     }
 }

 $newDay = new Barn($animals);
 $newDay->AllCollect();
 $newDay->getCollection();