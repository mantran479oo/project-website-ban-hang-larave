<?php
namespace App\Repositories\Repository\Interfaces;

interface PostRepositoryInterface
{
    public function getModel_product($key,$compare,$value,$limit);
    public function getSearch_product($key);
    public function getSimilar_products($id,$key);
    
}
