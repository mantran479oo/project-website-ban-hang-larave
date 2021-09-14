<?php
namespace App\Repositories\Repository;

use App\Repositories\Repository\Interfaces\PostRepositoryInterface;
use App\Repositories\Frames\EloquentRepository;
use App\Models\Model_product;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Model_product::class;
    }

    public function getModel_product($key,$compare,$value,$limit)
    {
        return $this->_model::where($key,$compare,$value)->paginate($limit);
    }
    public function getSearch_product($key){
        return $this->_model::where('name','like','%'.$key.'%')
             ->orWhere('unit_price',$key)->paginate(12);
    }
    public function getSimilar_products($id,$key){
        return $this->_model::where('id_type',$key)
        ->where('id','<>',$id)
        ->paginate(3);
    }

}
