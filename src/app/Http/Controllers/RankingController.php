<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse; //para verificar la palabra

class RankingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ranking = Ranking::orderBy('racha', 'desc')->get();

        return view('ranking.ranking', compact('ranking'));
    }

}
