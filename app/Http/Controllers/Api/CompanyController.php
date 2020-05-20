<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\CompanyResource;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->paginate(20);
        return CompanyResource::collection($companies);
    }

    public function products(Request $request)
    {
        $company = Company::find($request->get('company_id'));
        $products = $company->products();
        return response()->json(['data' => $products]);
    }
}
