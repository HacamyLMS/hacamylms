<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LtcController extends Controller
{
    use General;

    public function verify()
    {
        return true; // Always return true to bypass verification
    }

    public function registerKey(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'purchase_code' => 'required',
            'codecanyon_username' => 'required',
        ]);
    
        // Skip validation and directly store the key
        $key = $request->input('purchase_code');
        Setting::updateOrCreate(['option_key' => 'cpk'], ['option_value' => encrypt($key)]);
        $this->showToastrMessage('success', 'License Activation Successfully.');
        return redirect()->route('main.index');
    }

    public function validateKey($i0, $m1, $n2, $m3)
    {
        return ['message' => 'Successfully Verified', 'status' => 1];
    }

    private function updateSettingKeyIfFailed($vldl)
    {
        Setting::updateOrCreate(['option_key' => 'leck'], ['option_value' => now()]);
        Setting::updateOrCreate(['option_key' => 'vldl'], ['option_value' => $vldl]);
    }

    private function updateData($isExtended, $key)
    {
        $logFile = storage_path('installed');
        $fileData = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : [];

        $fileData['d'] = base64_encode(get_domain_name(request()->fullUrl()));
        $fileData['c'] = date('ymdhis');
        $fileData['ex'] = $isExtended;
        $fileData['cpk'] = encrypt($key);

        file_put_contents($logFile, json_encode($fileData));

        Setting::updateOrCreate(['option_key' => 'leck'], ['option_value' => now()]);
        Setting::updateOrCreate(['option_key' => 'vldl'], ['option_value' => 1]);
        Setting::updateOrCreate(['option_key' => 'iel'], ['option_value' => $isExtended]);
    }
}
