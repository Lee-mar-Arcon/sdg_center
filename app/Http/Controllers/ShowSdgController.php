<?php

namespace App\Http\Controllers;

use App\Models\SDG;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowSdgController extends Controller
{
    public function perSDG () {

        $sdgs = SDG::all(); // Fetch all SDG categories
        return Inertia::render('View/ShowArticle', [
            'sdgs' => $sdgs
        ]);
    }
}
