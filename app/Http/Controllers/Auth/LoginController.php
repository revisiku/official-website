<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\LogLoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private $_maxAttempts = 3;
    private $_decaySeconds = 300; // 5 minutes

    public function index()
    {
        if (!Session::has('isConfirmed'))
            return abort(404);

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            if ($this->guard()->attempt($request->only('username', 'password'), $request->remember)) {

                if (auth()->user()->is_active == 1) {
                    return $this->_succeed($request);
                }

                return $this->_suspended($request);
            }

            return $this->_failed($request);
        } catch (\Throwable $th) {
            return redirect()->route('login.index')->with('error', $th->getMessage())
                ->onlyInput('username', 'remember');
        }
    }

    private function _loginHitLimiter($request)
    {
        if (RateLimiter::tooManyAttempts('login:'.$request->ip(), $this->_maxAttempts)) {
            $remaining = RateLimiter::availableIn('login:'.$request->ip());

            $message = ($remaining < 60)
                ? $remaining.' detik'
                : ceil(($remaining/60)).' menit';

            LogLoginService::failed('[ '.request()->username.' ][ '.$request->password.' ][ '.$message.' ]');
            throw new \Exception('Terlalu banyak login salah, silahkan coba lagi dalam '.$message.'.');
        }

        RateLimiter::hit('login:'.$request->ip(), $this->_decaySeconds);
    }

    private function _succeed($request)
    {
        RateLimiter::clear('login:'.$request->ip());
        LogLoginService::success();
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    private function _suspended($request)
    {
        $this->_loginHitLimiter($request);
        LogLoginService::failed('Akun Ditangguhkan');
        auth()->logout();
        throw new \Exception('Akun sedang ditangguhkan.');
    }

    private function _failed($request)
    {
        $this->_loginHitLimiter($request);
        LogLoginService::failed('[ '.request()->username.' ][ '.$request->password.' ]');
        throw new \Exception('Username atau Password Anda salah.');
    }
}
