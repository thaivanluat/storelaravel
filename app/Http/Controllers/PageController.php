<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;  
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
class PageController extends Controller
{
    //

    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product =Product::where('promotion_price','<>',0)->paginate(8);
        
        
    	return view('page.trangchu',['slide'=>$slide,'new_product'=>$new_product,'sale_product'=>$sale_product]);
    }


    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',['sp_theoloai'=>$sp_theoloai,'sp_khac'=>$sp_khac,'loai'=>$loai,'loai_sp'=>$loai_sp]);
    }

    public function getChitietsp(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
    	return view('page.chitiet_sanpham',['sanpham'=>$sanpham,'sp_tuongtu'=>$sp_tuongtu]);   
    }

    public function getLienhe(){
        return view('page.lienhe');
    }

    public function getGioithieu(){
        return view('page.gioithieu');
    }
    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();


        return view('page.gioithieu');
    }

}
