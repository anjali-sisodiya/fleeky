public function place_order(Request $request)
    {
        $payment_url='';
        if($request->session()->has('FRONT_USER_LOGIN')){
            $coupon_value=0;
            if($request->coupon_code!=''){
                $arr=apply_coupon_code($request->coupon_code);
                $arr=json_decode($arr,true);
                if($arr['status']=='success'){
                    $coupon_value=$arr['coupon_code_value'];
                }else{
                    return response()->json(['status'=>'false','msg'=>$arr['msg']]);
                }
            }
            

            $uid=$request->session()->get('FRONT_USER_ID');
            $totalPrice=0;
            $getAddToCartTotalItem=getAddToCartTotalItem();
            foreach($getAddToCartTotalItem as $list){
                $totalPrice=$totalPrice+($list->qty*$list->price);
            }  
            $arr=[
                "customers_id"=>$uid,
                "name"=>$request->name,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "address"=>$request->address,
                "city"=>$request->city,
                "state"=>$request->state,
                "pincode"=>$request->zip,
                "coupon_code"=>$request->coupon_code,
                "coupon_value"=>$coupon_value,
                "payment_type"=>$request->payment_type,
                "payment_status"=>"Pending",
                "total_amt"=>$totalPrice,
                "order_status"=>1,
                "added_on"=>date('Y-m-d h:i:s')
            ];
            $order_id=DB::table('orders')->insertGetId($arr);

            if($order_id>0){
                foreach($getAddToCartTotalItem as $list){
                    $prductDetailArr['product_id']=$list->pid;
                    $prductDetailArr['products_attr_id']=$list->attr_id;
                    $prductDetailArr['price']=$list->price;
                    $prductDetailArr['qty']=$list->qty;
                    $prductDetailArr['orders_id']=$order_id;
                    DB::table('orders_details')->insert($prductDetailArr);
                }  
                
                if($request->payment_type=='Gateway'){
                    $final_amt=$totalPrice-$coupon_value;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                    curl_setopt($ch, CURLOPT_HTTPHEADER,
                        array("X-Api-Key:KEY",
                            "X-Auth-Token:TOKEN"));
                    $payload = Array(
                        'purpose' => 'Buy Product',
                        'amount' => $final_amt,
                        'phone' => $request->mobile,
                        'buyer_name' =>$request->name,
                        'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                        'send_email' => true,
                        'send_sms' => true,
                        'email' => $request->email,
                        'allow_repeated_payments' => false
                    );
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                    $response = curl_exec($ch);
                    curl_close($ch); 
                    $response=json_decode($response);
                    if(isset($response->payment_request->id)){
                        $txn_id=$response->payment_request->id;
                        DB::table('orders')
                        ->where(['id'=>$order_id])
                        ->update(['txn_id'=>$txn_id]);
                        $payment_url=$response->payment_request->longurl;
                    }else{
                        $msg="";
                        foreach($response->message as $key=>$val){
                            $msg.=strtoupper($key).": ".$val[0].'<br/>';
                        }
                        return response()->json(['status'=>'error','msg'=>$msg,'payment_url'=>'']); 
                    }
                    
                }
                DB::table('cart')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
                $request->session()->put('ORDER_ID',$order_id);

                $status="success";
                $msg="Order placed";
            }else{
                $status="false";
                $msg="Please try after sometime";
            }
        }else{
            $status="false";
            $msg="Please login to place order";
        }
        return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]); 
    }


    <!-- ************************************************************************* -->
    public function place_order(Request $request)
    {
        $payment_url='';
        if($request->session()->has('FRONT_USER_LOGIN')){
            $coupon_value=0;
            if($request->coupon_code!=''){
                $arr=apply_coupon_code($request->coupon_code);
                $arr=json_decode($arr,true);
                if($arr['status']=='success'){
                    $coupon_value=$arr['coupon_code_value'];
                }else{
                    return response()->json(['status'=>'false','msg'=>$arr['msg']]);
                }
            }
            

            $uid=$request->session()->get('FRONT_USER_ID');
            $totalPrice=0;
            $getAddToCartTotalItem=getAddToCartTotalItem();
            foreach($getAddToCartTotalItem as $list){
                $totalPrice=$totalPrice+($list->qty*$list->price);
            }  
            $arr=[
                "customers_id"=>$uid,
                "name"=>$request->name,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "address"=>$request->address,
                "city"=>$request->city,
                "state"=>$request->state,
                "pincode"=>$request->zip,
                "coupon_code"=>$request->coupon_code,
                "coupon_value"=>$coupon_value,
                "payment_type"=>$request->payment_type,
                "payment_status"=>"Pending",
                "total_amt"=>$totalPrice,
                "order_status"=>1,
                "added_on"=>date('Y-m-d h:i:s')
            ];
            $order_id=DB::table('orders')->insertGetId($arr);

            if($order_id>0){
                foreach($getAddToCartTotalItem as $list){
                    $prductDetailArr['product_id']=$list->pid;
                    $prductDetailArr['products_attr_id']=$list->attr_id;
                    $prductDetailArr['price']=$list->price;
                    $prductDetailArr['qty']=$list->qty;
                    $prductDetailArr['orders_id']=$order_id;
                    DB::table('orders_details')->insert($prductDetailArr);
                }  
                
                if ($request->payment_type == 'Gateway') {
                    $final_amt = $totalPrice - $coupon_value;
            
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    Stripe::setApiVersion('2023-10-16');
            
                    try {
                        $payment_intent = \Stripe\PaymentIntent::create([
                            'amount' => $final_amt * 100,
                            'currency' => 'usd',
                            'payment_method' => $request->stripeToken,
                            'confirmation_method' => 'manual',
                        ]);
                        
                        $confirmation_required = $payment_intent->status === 'requires_confirmation';
                        
                        return response()->json([
                            'status' => 'success',
                            'payment_intent_client_secret' => $payment_intent->client_secret,
                            'confirmation_required' => $confirmation_required,
                            'msg' => 'Order placed',
                        ]);
                        
                        
                    
            
                        $txn_id = $payment_intent->id;
            
                        DB::table('orders')
                            ->where(['id' => $order_id])
                            ->update(['txn_id' => $txn_id]);
            
                        $payment_url = $payment_intent->client_secret;
                    } catch (\Exception $e) {
                        return response()->json(['status' => 'error', 'msg' => $e->getMessage(), 'payment_url' => '']);
                    }
                }
                        return response()->json(['status'=>'error','msg'=>$msg,'payment_url'=>'']); 
                    
                    
                
                // DB::table('cart')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
                // $request->session()->put('ORDER_ID',$order_id);

                $status="success";
                $msg="Order placed";
            }else{
                $status="false";
                $msg="Please try after sometime";
            }
        }else{
            $status="false";
            $msg="Please login to place order";
        }
        return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]); 
    }

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe::setApiVersion('2023-10-16');

        Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
