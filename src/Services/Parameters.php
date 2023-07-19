<?php


namespace App\Services;


use App\Entity\Setting;
use Doctrine\Persistence\ManagerRegistry;

class Parameters
{
     public function __construct(private ManagerRegistry $mr)
     {

     }

     public function getParam(string $name)
     {
         $value = null;
         /** @var Setting $param */
         $param = $this->mr->getRepository(Setting::class)->findOneBy([
             'param_name' => $name
         ]);
         if($param) {
             $value = $param->getParamValue();
         }
         return $value;
     }
}