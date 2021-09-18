<?php
require_once('./application/helpers/Cart.php');

/**
 * 
 */
class Api extends Frontend_Controller{

	// Load Parent 
    function __construct() {
        parent::__construct();
    }


    // SET CART ITEM
    function setCartItem()
    {
        if($_POST && !empty($_POST['product_id']))
        {
            $item = readTable("products", ['id'=>$_POST['product_id']])[0];
            $img  = readTable("product_images", ['product_id'=>$_POST['product_id'], 'type'=>'feature_photo']);
            // PRODUCT COLORS
            $colors  = readTable('product_colors', ['product_id'=>$_POST['product_id']]);
            // PRODUCT SIZES
            $sizes  = readTable('product_sizes', ['product_id'=>$_POST['product_id']]);
            //SELECT COLOR
            if(!empty($_POST['color_id']))
            $color  = readTable('colors', ['id'=>$_POST['color_id']]);
            //SELECT SIZE
            if(!empty($_POST['size_id']))
            $size  = readTable('sizes', ['id'=>$_POST['size_id']]);
            // DATA FOR ASSIGN IN THE CART
            $data = [
                'product_id' => $item->id,

                'is_color'   => (count($colors)> 0 ? 1:0),
                'color_id'   => (!empty($color) ? $color[0]->id : null),
                'color_code' => (!empty($color) ? $color[0]->color_code : null),
                'color'      => (!empty($color) ? $color[0]->color : null),

                'is_size'    => (count($sizes)> 0 ? 1:0),
                'size_id'    => (!empty($size) ? $size[0]->id : null),
                'size'       => (!empty($size) ? $size[0]->size : null),

                'title'      => $item->title,
                'price'      => ($item->price ? $item->price : 0),
                'quantity'   => $item->min_qty,
                'min_qty'    => $item->min_qty,
                'discount'   => $item->discount,
                'image'      => ($img ? $img[0]->small : ''),
            ];
            echo json_encode(Cart::setItem($data));            
        }
        else{
            echo 0;
        }
    }

    function cartItems(){ echo json_encode(Cart::getItems());}

    function wishList()
    {
        $user_id = $this->session->userdata('subscriber_id');
        if($user_id){
            $wishList = readTable('wish_list', ['user_id'=>$user_id]);
            $ids = [];
            foreach($wishList as $item){
                $ids[] = $item->product_id;
            }
            echo json_encode($ids);
        }
        else echo json_encode([]);
    }


    function setWishList($product_id)
    {
        $user_id = $this->session->userdata('subscriber_id');
        if($user_id){
            $data = [
                'product_id' => $product_id,
                'user_id'    => $user_id
            ];
            if(!readTable('wish_list', $data)) { 
                save('wish_list', $data, ['user_id'=>$user_id]);
            }
        }
        $wishList = readTable('wish_list', ['user_id'=>$user_id]);

        $ids = [];
        foreach($wishList as $item){
            $ids[] = $item->product_id;
        }
        echo json_encode($ids);
    }

    function removeCartItem()
    {   
        if(!empty($_POST['code']) && $_POST['code']!=''){
            echo json_encode(Cart::removeItem($_POST['code']));
        }
        else
            echo json_encode(Cart::getItems());
    }

    function setItemColor(){
        if(!empty($_POST['code']) && !empty($_POST['color_id']))
        {
            Cart::setItemColor(['code'=>$_POST['code'], 'color_id'=>$_POST['color_id']]);
        }
        echo json_encode(Cart::getItems());
    }

    function setItemSize(){
        if(!empty($_POST['code']) && !empty($_POST['size_id']))
        {
            Cart::setItemSize(['code'=>$_POST['code'], 'size_id'=>$_POST['size_id']]);
        }
        echo json_encode(Cart::getItems());
    }


    function updateCartQuantity()
    {   
        echo json_encode(Cart::updateCartQuantity($_POST));
    }

    //
    function getDistricts(){
        echo json_encode(readTable('districts'));
    }

    //
    function getUpazillas(){
        if(isset($_POST['where'])){
            echo json_encode(readTable('upazillas', json_decode($_POST['where'], true)));
        }
        else {
            echo json_encode([]);
        }
    }

    //
    function getPaymentMethod(){
        echo json_encode(readTable('payment_method'));
    }

    //
    function checkout(){
        if($_POST && count(Cart::getItems()) > 0){
            $order          = $_POST;
            $order['date']  = date('Y-m-d');
            // Generate A New Code
            $code = rand(1111111, 9999999);
            // Check is code available
            while(!empty(readTable('orders', ['code'=>$code]))){
                $code = rand(1111111, 9999999);                
            }
            // Assign a new code
            $order['code']=$code;
            // Processing order Data
            $order_id = save('orders', $order);
            // Processing order items
            foreach (Cart::getItems() as $key => $item){

                $stock = readTable('stock', ['product_id'=>$item['product_id']]);
                if($stock){
                    $current_stock = ($stock[0]->quantity - $item['quantity']);
                    update('stock', ['quantity'=>$current_stock], ['product_id'=>$item['product_id']]);
                }

                $item['order_id'] = $order_id;
                unset($item['code']);
                save('order_items', $item);            
            }
            Cart::destroy();
            echo $order_id;
        }
        else{
            echo 0;
        }
    }

    // 
    function getProductColors($product_id){
        echo json_encode(getProductColors($product_id));
    }

    // 
    function getProductSizes($product_id){
        echo json_encode(getProductSizes($product_id));
    }

    // 
    function setProductRating(){
        if($_POST){
            //
            $validation = $_POST;
            unset($validation['rate']);
            //
            $is_available = readTable('product_ratings', $validation);
            if($is_available) {
                update('product_ratings', $_POST, $validation);
            }
            else {
                save('product_ratings', $_POST);                
            }
            echo 1;          
        }
    }

    // 
    function getProductRate(){
        if($_POST){
            //
            $is_available = readTable('product_ratings', $_POST);
            if($is_available){
                echo $is_available[0]->rate;
            }
            else {
                echo '';
            }
        }
    }
}