<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(Request $request){
        $sort=$request->sort;
        $grid=$request->grid;
        $list_product=Product::where('status','=',1);  
        if($sort == 'sale'){
            $list_product->where('pricesale','>',0);
        }
        if($sort == 'newest'){
            $list_product->orderBy('created_at','desc');
        }
        if($sort == 'asc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END ASC');
        }
        if($sort == 'desc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END DESC');
        }
        $list_product=$list_product->paginate(12)->withQueryString();
        return view('frontend.product',compact('list_product','sort','grid'));
    }

    public function getlistcategoryid($rowid){
        $listcatid=[];
        array_push($listcatid,$rowid);
        $list = Category::where([['parent_id','=',$rowid],['status','=',1]])->select('id')->get();
        if(count($list)>0){
            foreach($list as $row){
                $lists=$this->getlistcategoryid($row->id);
                $listcatid  = array_merge($listcatid,$lists);
            }
        }
        return $listcatid;
    }

    public function category($slug,Request $request){
        $sort=$request->sort;
        $grid=$request->grid;
        $row = Category::where([['slug','=',$slug],['status','=',1]])->select('id','name','slug','image')->first();
        $listcatid=[];
        if($row != null){
            $listcatid = $this->getlistcategoryid($row->id);
        }
        $list_product=Product::where('status','=',1)
        ->whereIn('category_id',$listcatid);
        if($sort == 'sale'){
            $list_product->where('pricesale','>',0);
        }
        if($sort == 'newest'){
            $list_product->orderBy('created_at','desc');
        }
        if($sort == 'asc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END ASC');
        }
        if($sort == 'desc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END DESC');
        }

        $list_product = $list_product->paginate(12)->withQueryString();
        return view('frontend.product_category',compact('list_product','row','sort','grid'));
    }
    public function brand($slug,Request $request){
        $sort=$request->sort;
        $grid=$request->grid;
        $row = Brand::where([['slug','=',$slug],['status','=',1]])->select('id','name','slug','image')->first();
        $list_product=Product::where([['brand_id','=',$row->id],['status','=',1]]);
        if($sort == 'sale'){
            $list_product->where('pricesale','>',0);
        }
        if($sort == 'newest'){
            $list_product->orderBy('created_at','desc');
        }
        if($sort == 'asc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END ASC');
        }
        if($sort == 'desc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END DESC');
        }

        $list_product = $list_product->paginate(12)->withQueryString();

        return view('frontend.product_brand',compact('list_product','row','sort','grid'));
    }
    public function search(Request $request){
        $sort=$request->sort;
        $grid=$request->grid;

        $row = $request->search;
        $search = explode(' ',$row);
        $list_product = Product::where('status','=', 1);
        if($sort == 'sale'){
            $list_product->where('pricesale','>',0);
        }
        $list_product->where(function ($product) use ($search) {
            $countItem = count($search);
            if($countItem>1){
                for ($i = 0; $i < $countItem; $i++) {
                    for ($j = $i + 1; $j < $countItem; $j++) {
                        $product->orWhere(function ($product) use ($search, $i, $j) {
                            $product->where('name', 'LIKE', "%{$search[$i]}%")
                                    ->where('name', 'LIKE', "%{$search[$j]}%");
                        });
                    }
                }
            }else{
                $product->orWhere('name', 'LIKE', "%{$search[0]}%");
            }
            
        });
        if($sort == 'newest'){
            $list_product->orderBy('created_at','desc');
        }
        if($sort == 'asc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END ASC');
        }
        if($sort == 'desc'){
            $list_product->orderByRaw('CASE WHEN pricesale IS NULL THEN price WHEN pricesale = 0 THEN price ELSE pricesale END DESC');
        }

        $list_product = $list_product->paginate(12)->withQueryString();
        return view('frontend.product_search',compact('list_product','row','sort','grid'));
    }
    public function product_detail($slug){
        $product = Product::where([['product.slug','=',$slug],['product.status','=',1]])
        ->join('category','product.category_id','=','category.id')
        ->join('brand','product.brand_id','=','brand.id')
        ->select('product.id','product.image','product.slug','product.name','category.name as categoryname','brand.name as brandname'
        ,'product.category_id','product.brand_id','product.status','product.price','product.pricesale','product.description','product.detail')
        ->first();
        $listcatid = $this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status','=',1],['id','!=',$product->id]])
        ->whereIn('category_id',$listcatid)
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
        return view('frontend.product_detail',compact('product','list_product'));
    }
}
