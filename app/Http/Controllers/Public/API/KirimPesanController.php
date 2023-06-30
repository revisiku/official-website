<?php

namespace App\Http\Controllers\Public\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Rules\IsNumericRule;
use App\Services\UrlVisitedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class KirimPesanController extends Controller
{

    public function __invoke(Request $request)
    {
        UrlVisitedService::audit($request->url(), $request->ip());
        try {
            $this->_hitLimiter($request);

            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:50',
                'email'     => 'required|email|max:75',
                'handphone' => ['nullable', 'max:14', new IsNumericRule],
                'message'   => 'required|string|max:300',
            ]);

            if ($validator->fails()) throw new \Exception('silahkan periksa pesan Anda.');

            if (Pesan::latest()
                    ->where('ip_address', $request->ip())
                    ->where('created_at', '>=', \Carbon\Carbon::today()->subDays())
                    ->first()
                ) { throw new \Exception('silahkan coba beberapa saat lagi.'); }
            else Pesan::create($validator->validated() + ['ip_address' => $request->ip()]);

            return response()->json([
                'status' => true,
                'message' => 'Pesan Anda berhasil dikirim, terimakasih.',
            ]);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return response()->json([
                'status' => false,
                'message' => 'Pesan Anda gagal dikirim, '.$th->getMessage(),
            ]);
        }
    }

    private function _hitLimiter($request)
    {
        if (RateLimiter::tooManyAttempts('send-message:'.$request->ip(), 3)) {
            throw new \Exception('terlalu banyak request.');
        }

        RateLimiter::hit('send-message:'.$request->ip(), 60);
    }
}
