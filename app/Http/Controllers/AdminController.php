<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        session()->flash('type', 'success');
        session()->flash('notif', 'Data berhasil ditambah');
        return view('admin.admin', [
            'title'     => 'Admin',
            'data'      => Admin::latest()->get()
        ]);
    }

    public function auth(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.login'))
            ->withErrors($validator)
                ->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $response_key = $request->input('g-recaptcha-response');
        $secret_key = env('GOOGLE_RECHATPTCHA_SECRETKEY');

        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response_key);
        $response = json_decode($verify);

        $data = Admin::where(['email' => $email]);
        if ($response->success) {
            if ($data->count() == 1) {
                $data = $data->first();
                if ($data->status == 1) {
                    if (Hash::check($password, $data->password)) {
                        session([
                            'id' => $data->id,
                            'name' => $data->name,
                            'email' => $data->email,
                            'level' => $data->level,
                            'login' => true
                        ]);
                        Admin::where("id", $data->id)->update(['login_at' => now()]);
                        session()->flash('notif', 'Selamat Datang ' . $data->name);
                        session()->flash('type', 'success');
                        return redirect('admin');
                    } else {
                        session()->flash('type', 'error');
                        session()->flash('notif', 'Email atau password anda tidak sesuai');
                    }
                } else {
                    session()->flash('type', 'error');
                    session()->flash('notif', 'Akun anda nonaktif. Silahkan hubungi administrator');
                }
            } else {
                session()->flash('type', 'error');
                session()->flash('notif', 'Email atau password anda tidak sesuai');
            }
        } else {
            session()->flash('type', 'error');
            session()->flash('notif', 'Ups! Sepertinya ada yang salah');
        }
        return redirect(route('admin.login'));
    }

    public function logout(){
        session()->flash('type', 'success');
        session()->flash('notif', 'Sampai jumpa ' . session('name'));
        session()->forget(['id', 'name', 'email', 'level', 'login']);
        return redirect(route('admin.login'));
    }
}
