<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermAndCondiition;

class TermsController extends Controller
{
    public function indexTerms()
    {
        return view('frontend.pages.terms.index', [
            'terms' => TermAndCondiition::first()
        ]);
    }
}
