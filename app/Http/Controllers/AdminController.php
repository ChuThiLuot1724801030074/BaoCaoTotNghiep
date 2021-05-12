<?php

namespace App\Http\Controllers;
use App\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Login;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;

class AdminController extends Controller
{

    public function days_order(){

        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
    
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
        $get = Statistic::whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();
    
    
        foreach($get as $key => $val){
    
           $chart_data[] = array(
            'period' => $val->order_date,
            'order' => $val->total_order,
            'sales' => $val->sales,
            'profit' => $val->profit,
            'quantity' => $val->quantity
        );
    
       }
    
       echo $data = json_encode($chart_data);
    }   
    public function filter_by_date(Request $request){

        $data = $request->all();
    
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
    
        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
    
    
        foreach($get as $key => $val){
    
            $chart_data[] = array(
    
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
    
        echo $data = json_encode($chart_data);  
    
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }   
    }
    public function index(){
        return view('admin_dangnhap');
    }
    public function show_dashboard(){
        // $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request ){  
        $admin_email = $request->admin_email;
        $admin_password = ($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result)
        {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message', 'Nhập lại mật khẩu và tài khoản');
            return Redirect::to('/admin');
        }
    }
    public function logout(Request $request ){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }         
    }
    