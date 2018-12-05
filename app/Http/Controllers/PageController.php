<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\BillDetail;
use App\Bill;
use Session;
class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide = Slide::all();
    	$productnews = Product::where('new','1')->paginate(4 ,['*'], 'pag');
    	$sanphamkm = Product::where('promotion_price','<>','0')->paginate(8 );
    	return view('pages.trangchu',['slide'=>$slide,'productnews'=>$productnews,'sanphamkm'=>$sanphamkm]);
    }
    public function getLoaiSanPham($id){
        $loaisp = Product::where('id_type',$id)->paginate(3,['*'], 'pag' );
        $sp_khac = Product::where('id_type','<>',$id)->paginate(3);
        $loai = ProductType::all();
        $loaisanpham = ProductType::where('id',$id)->first(); 
    	return view('pages.loaisanpham',['loaisp'=>$loaisp,'sp_khac'=>$sp_khac,'loai'=>$loai,'loaisanpham'=>$loaisanpham]);
    }
    public function getChiTietSanPham($id){
        // $chitiet = ProductType::where('id',$id)->get();
        $thongtin = Product::where('id',$id)->first();
        $sanphamtt = Product::where('id_type',$id)->paginate(3);
    	return view('pages.chitietsanpham',['thongtin'=>$thongtin,'sanphamtt'=>$sanphamtt]);
    }
    public function getLienHe(){
    	return view('pages.lienhe');
    }
    public function getGioiThieu(){
    	return view('pages.gioithieu');
    }
    public function getAddtoCart(Request $res,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        //kieerm tra xem đã có sản phẩm ni trong giỏ hàng chưa, nếu có thì trả về giỏ hàng, còn ko thì null
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $res->session()->put('cart',$cart);//thêm sản phẩm vào session đẻ đưa vào giỏ hàng
        return redirect()->back();
    }
    public function getDeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);//xóa hết luôn, trong cart
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            session::forget('cart');
        }
        
        return redirect()->back();
    }
    public function getCheckout(){
        return view('pages.dathang');
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');//lấy session xuống
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value){
             $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price']/$value['qty'];
        $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công!');
    }
}
