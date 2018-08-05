<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';
    protected  $fillable = ['order_id','product_id', 'qty'];
    public  $timestamps = true;

    public function permission_role(){
        
    }
    
    public function permissions()
    {
        
    }
}
