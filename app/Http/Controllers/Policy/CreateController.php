<?php

namespace App\Http\Controllers\Policy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('policy.create');
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function create(Request $request)
    {
	   return response()->ajax('Policy Type ('.$policyType->name.') Deleted');

    }
    


}
