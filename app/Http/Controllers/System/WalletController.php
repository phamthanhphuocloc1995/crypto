<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\Account;
use Illuminate\Support\Facades\Session;

use App\User;

class WalletController extends Controller
{
    public function coinbase(){
        //v2
        // $apiKey = 'CuFaVz2CMb5BPbzZ';
        // $apiSecret = 'NWJ5nh9PEyAKypYHuFkDPan7VFlGVaiw';

        //v1
        // $apiKey = '37KDOKJeRuVwKwhM';
        // $apiSecret = 'w6H5nYFn9QimZ1vbbVNowhErctmgQCMh';
        

        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $client = Client::create($configuration);

        return $client;
    }

    public function getDeposit() {
        // $user = Session('user');
        // $account = $this->coinbase()->getAccount('BTC');
        // $address = new Address([
        //     	'name' => 'New Address BTC of ID:'.$user->User_ID
        // ]);
        // $info = $this->coinbase()->createAccountAddress($account, $address);

        // $btcAddress = $info->getaddress();
        // dd($btcAddress);
        return view('system.wallet.deposit');
    }

    public function getWithdraw() {
        return view('system.wallet.withdraw');
    }
}
