<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ManageSession
{
    public function ClearSession(Request $request, string $key)
    {
        $request->session()->forget($key);
        $request->session()->put($key, []);
    }

    public function StoreSession(Request $request, $key, $validatedData)
    {
        foreach ($validatedData as $k => $value) {
            $request->session()->push($key . '.' . $k, $value);
        }
    }
}
