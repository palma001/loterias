<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sort;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function seconds ()
    {
        $seconds = 0;
        $now = new \DateTime();
        $sorts = Sort::all();

        foreach ($sorts as $sort) {
            $dailySorts = $sort->dailySorts()->orderBy('time_sort')->get();

            // Filtro solo los sorteos activos
            foreach ($dailySorts as $ds) {
                if ($ds->hasActive()) {
                    if (! isset($activeSorts[$sort->id])) {
                        $activeSorts[$sort->id] = [];
                    }

                    $activeSorts[$sort->id][] = $ds;

                    if ($seconds === 0) {
                        // Guardo los segundos restantes para el primer sorteo
                        $tenMinuteLess = $ds->getTimeSort()->modify('-10 minutes');
                        $seconds = ($now->diff($tenMinuteLess)->h * 3600) + ($now->diff($tenMinuteLess)->i * 60) + ($now->diff($tenMinuteLess)->s);
                    }
                }
            }
        }

        return response()->json($seconds, 200);
    }
}
