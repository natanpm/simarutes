<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\Lampiran;
use Illuminate\Support\Facades\Storage;

class LampiranController extends Controller
{
    public function lihatLampiran($path)
    {
        $lampiran = Lampiran::where([
            'pathUri' => $path,
        ])->get()->first();

        if (!$lampiran) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU ini tidak memiliki lampiran atau lampiran tersebut tidak ada!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . $lampiran->path);
    }
}
