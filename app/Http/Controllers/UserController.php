<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

use App\Models\Product;
use Vonage\SMS\Message\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderShipped;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Coupon_User;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Notifications\Facades\Vonage;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function redirect(){
  $user = Auth::user();
  $product = Product::paginate(4);
  if($user->role == 'user'){

return view('user.product',compact('product'));
  }
  else{
      return view('admin.home');
  }

    }
    public function index(){
        return view('user.home');
    }
public function addCart(Request $request,$id){
    $user = Auth::user();
    $product = Product::find($id);
    if(Auth::user() && isset($_POST['addCart'])){

$cart = Cart::create(['product_id'=> $product->id,'user_id' =>  $user->id ,'price' => $product->price,'quantity' => $request->quantity]);
        return redirect()->back();
    }
    elseif(empty( $product->quantity)){
        return redirect('login');
    }
}

public function showCart(){
    $user = Auth::user();
    $cart = Cart::where('user_id',$user->id)->get();
$sum = 0;
foreach($cart as $value){
    $sum += $value-> quantity  *  $value-> price;
}

    return view('user.showCart',compact('cart','sum'));
}
public function confirm(Request $request){
    $user = Auth::user();
    $cart = Cart::where('user_id',$user->id)->get();
    foreach($cart as $value){
        $order = Order::create(['user_id' => $user->id, 'product_title' => $value->product->title,'product_price' => $value-> quantity  *  $value-> price, 'quantity'=> $value->quantity ]);
    }
    $product = order::Where('user_id',$user->id)->get();
    // $cart = Cart::where('user_id',$user->id)->delete();
    // $this->Re_autoIncrement('carts');
    return view('user.payment',compact('product'));

}
public function destroy($id)
{

    $product = Cart::find($id);
    $product->delete();
    $this->Re_autoIncrement('carts');
    return redirect('/redirect');
}
public function Re_autoIncrement($table){
    DB::statement("SET @count = 0;");
    DB::statement("UPDATE `$table` SET `$table`.`id` = @count:= @count + 1;");
    DB::statement(("ALTER TABLE `$table` AUTO_INCREMENT = 1;"));
}
public function editForm($id)
{
    $cart = Cart::find($id);
    $product = Product::find($id);

    return view('user.edit', compact('product', 'cart'));
}
public function edit(Request $request, $id)
{
    $product = Cart::find($id);
    $product->update(['quantity' => $request->quantity]);
    return redirect()->back()->with('updated', 'product updated');
}

public function voucher(Request $request){

    $discount = Coupon::where('code',$request->discount)->first();

    if(!$discount){
        return view('user.payment');
    }
    else{
        session()->put('coupon',[
            'name' => $discount->code,
            'discount' => $this->showCart()->sum,
            'value' => $discount->value,
        ]);
        return view('user.payment');
    }
}
public function remove(){
    session()->forget('coupon');
    return view('user.payment');
}

public function payment(Request $request){


$dis = session()->has('coupon')?(session()->get('coupon')['discount'] - (session()->get('coupon')['discount'] * session()->get('coupon')['value']) /100) : $this->showCart()->sum;

     //$request->validate(['email' => 'required','paymentType' => 'required' ,'city' =>'required','region' =>'required','street' => 'required']);
     $order = Order::where('user_id',Auth::user()->id)->get();
    //  $pay = payment::where('user_id',Auth::user()->id)->orderby('created_at','DESC')->first();
    //  $num = '#'.str_pad($pay->id + 0, 8, "0", STR_PAD_LEFT);


    foreach($order as $value){
        $payment = Payment::create(['user_id'=>Auth::user()->id,'order_id' => $value->id,'city' => $request->city,'region'=>$request->region,'street' => $request->street,'amount'=> $dis,'payment_type' => $request->paymentType,'email' =>$request->email ]);
    }
    $this->remove();
    $cart =Cart::where('user_id',Auth::user()->id);
    $cart->delete();
    $this->Re_autoIncrement('carts');
    return redirect('/invoice');
// // $code++;
// // $this->mail();
// // $this->sms();
// //
}
public function invoice(){
    $order = payment::where('user_id',Auth::user()->id)->orderby('created_at','DESC')->first();
    $orders = payment::where('user_id',Auth::user()->id)->get();
   
    $num = '#'.str_pad($order->id + 0, 8, "0", STR_PAD_LEFT);
    foreach($orders as $value){
        Invoice::create(['payment_id' => $value->id,'code' => $num]);
    }

   return redirect('/redirect');
}
public function mail(){
    $details = [
        'title' => 'Mail from admin',
        'body' => 'this is for your orders',
    ];
    Mail::to('youssifk390@gmail.com')->send(new \App\Mail\OrderShipped($details));
}
public function sms(){
    vonage::message()->send([
        'to' => '+201149060651',
        'from' => '16105552344',
        'text' => 'order was shipped'
    ]);
}
public function reviewform($id){
    $product= product::find($id);
    $review = Review::Select('comment')->WHERE('product_id',$product->id)->orderby('created_at','DESC')->get();

return view('user.review',compact('product','review'));
}
public function review(Request $request,$id){
    $product = product::find($id);

$review = Review::create(['user_id' => Auth::user()->id,'product_id' => $product->id,'comment' => $request->comment,'rating' => $request->star]);
return redirect()->back();

}

}
