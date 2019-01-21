<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\Account;
use Illuminate\Support\Facades\Session;

use App\Address as ModelAddress;
use App\User;
use App\Price;
use App\Money;

class WalletController extends Controller
{
    public function coinbase(){
        //v2
        $apiKey = 'CuFaVz2CMb5BPbzZ';
        $apiSecret = 'NWJ5nh9PEyAKypYHuFkDPan7VFlGVaiw';

        //v1 tạm thời không dùng
        // $apiKey = '37KDOKJeRuVwKwhM';
        // $apiSecret = 'w6H5nYFn9QimZ1vbbVNowhErctmgQCMh';
        
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $client = Client::create($configuration);

        return $client;
    }

    public function getDeposit() {	
        // Lấy thông tin user đang đăng nhập
        $user = Session::get('user');

        // kiểm tra ví BTC có chưa?
        $addressBTC = ModelAddress::getAddressByUser($user->User_ID);
        
        if(!$addressBTC){
	    
    		$account = $this->coinbase()->getAccount('BTC');
            $address = new Address([
            	'name' => 'New Address BTC of ID:'.$user->User_ID
            ]);
            $info = $this->coinbase()->createAccountAddress($account, $address);

            $btcAddress = $info->getaddress();
            // Thêm địa chỉ ví vào DB
            $wallet = new ModelAddress();
            $wallet->Address_Currency = 1;
            $wallet->Address_Address = $btcAddress;
            $wallet->Address_User = $user->User_ID;
            $wallet->Address_IsUse = 0;
            $wallet->Address_Comment = 'Create new address';
            $wallet->save();
    	}else{
    		$btcAddress = $addressBTC->Address_Address;
        }

        // kiểm tra ví ETH có chưa?
    	$addressETH = ModelAddress::getAddressByUser($user->User_ID, 2);
    	if(!$addressETH){

    		$account = $this->coinbase()->getAccount('ETH');
            $address = new Address([
            	'name' => 'New Address ETH of ID:'.$user->User_ID
            ]);
            $info = $this->coinbase()->createAccountAddress($account, $address);

            $ethAddress = $info->getaddress();
            // Thêm địa chỉ ví vào DB
            $wallet = new ModelAddress();
            $wallet->Address_Currency = 2;
            $wallet->Address_Address = $ethAddress;
            $wallet->Address_User = $user->User_ID;
            $wallet->Address_IsUse = 0;
            $wallet->Address_Comment = 'Create new address';
            $wallet->save();
    	}else{
    		$ethAddress = $addressETH->Address_Address;
        }
        
        return view('system.wallet.deposit',compact('btcAddress','ethAddress'));
    }

    public function getWithdraw() {
        return view('system.wallet.withdraw');
    }

    public function getExchangeBTC() {
        $currency = 'BTC';
        return view('system.wallet.exchange',compact('currency'));
    }

    public function getExchangeETH() {
        $currency = 'ETH';
        return view('system.wallet.exchange',compact('currency'));
    }

    public function postExchangeBTC(Request $request) {
        //Lấy giá BTC theo USD
        $PriceBTC = Price::getBTCPrice();

        //Tính ở client
        $amountUSD = $request->amountUSD;
        $needtoexchange_client = $request->needtoexchange_client;

        if ($amountUSD == -1 or $needtoexchange_client == null) {
            return redirect()->route('system.getExchangeBTC')->with(['flash_type'=>'error','flash_message'=>'Error please contact Administrator!']);
        }

        //Tính ở server
        $needtoexchange = number_format($amountUSD / $PriceBTC,5);

        //Checksum
        if ($needtoexchange_client==$needtoexchange) {
            //Trừ BTC
            $Exchange = new Money();
            $Exchange->Money_User = Session('user')->User_ID;
            $Exchange->Money_Amount = ($needtoexchange)*(-1);
            $Exchange->Money_AmountFee = 0;
            $Exchange->Money_Time = strtotime(date("Y-m-d H:i:s"));
            $Exchange->Money_Comment = "Exchange to USD from BTC";
            $Exchange->Money_Action = 3;
            $Exchange->Money_Status = 1;
            $Exchange->Money_Currency = 1;
            $Exchange->Money_CurrencyCurrentPrice = Price::getBTCPrice();
            $Exchange->Money_Confirm = 1;
            $Exchange->Money_Demo = 0;
            $Exchange->save();
            //Cộng USD
            $Exchange2 = new Money();
            $Exchange2->Money_User = Session('user')->User_ID;
            $Exchange2->Money_Amount = ($amountUSD);
            $Exchange2->Money_AmountFee = 0;
            $Exchange2->Money_Time = strtotime(date("Y-m-d H:i:s"));
            $Exchange2->Money_Comment = "Exchange to USD from BTC";
            $Exchange2->Money_Action = 3;
            $Exchange2->Money_Status = 1;
            $Exchange2->Money_Currency = 0;
            $Exchange2->Money_CurrencyCurrentPrice = 1;
            $Exchange2->Money_Confirm = 1;
            $Exchange2->Money_Demo = 0;
            $Exchange2->save();

            return redirect()->route('system.getExchangeBTC')->with(['flash_type'=>'success','flash_message'=>'Exchange to $ from BTC Success!']);
        }
        
    }
}
