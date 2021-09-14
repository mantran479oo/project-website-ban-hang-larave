<?php
namespace App\Repositories\Repository;
use App\Repositories\Repository\Interfaces\OrderRepositoryInterface;
use App\Model\Model_bills;
use App\Repositories\Frames\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Model_bills::class;
    }
    public function set_Order(){
        $cart = session()->get('cart');
        if(isset($cart)){
            foreach($cart as $key => $value){
                $result = [
                    'id_products'=> $value['id'],
                    'quantity' => $value['quantity'],
                    'status' => 0,
                    'price' => $value['prices'],
                    'totals' => ($value['prices']*$value['quantity']),
                    'id_users' => Auth::user()->id
                ];
                $this->create($result);
            }
        }
    }
}
