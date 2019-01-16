<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use DB;

class MemberController extends Controller
{
    public function getMemberlist(){
        //Thông tin user đang đăng nhập
        $user = Session('user');
        //Lấy danh sách người đã giới thiệu của user
        $listmember = User::GetUserChildren($user);
        
        return view('system.members.memberlist',compact('listmember'));
    }
}
