<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
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
    public function indexPrivacy()
    {
        return view('frontend.pages.terms.privacyindex', [
            'privacy' => PrivacyPolicy::first()
        ]);
    }
}
