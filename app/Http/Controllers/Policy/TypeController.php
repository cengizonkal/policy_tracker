<?php

namespace App\Http\Controllers\Policy;

use App\Models\PolicyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TypeController
 * @package App\Http\Controllers\Policy
 */
class TypeController extends Controller
{
    public function index()
    {
        return view('policy.types');
    }

    public function types()
    {
        return PolicyType::all();
    }

    public function delete(PolicyType $policyType)
    {
        $policyType->delete();
	return response()->ajax('Policy Type ('.$policyType->name.') Deleted');
    }
}
