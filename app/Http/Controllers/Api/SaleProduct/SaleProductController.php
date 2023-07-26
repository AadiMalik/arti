<?php

namespace App\Http\Controllers\Api\SaleProduct;

use App\Http\Controllers\Controller;
use App\OtherProduct;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    use ResponseAPI;
    public function sale_product_detail($id){
        $sale_product_detail = OtherProduct::with(['district_name','tehsil_name','user_name'])->find($id);
        if(isset($sale_product_detail)){
            $sale_product_detail->hits = $sale_product_detail->hits + 1;
            $sale_product_detail->update();
            return $this->success(
                "Success!",
                $sale_product_detail
            );
        }else{
            return $this->error(
                "Sale Product Not Found!"
            );
        }
        
    }
}
