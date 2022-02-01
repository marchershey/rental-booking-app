<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Trip;
use Illuminate\Http\Request;

class RouteController extends Controller
{

    // Frontend
    public function reserveProperty(Request $request, Property $property) {
        return view('pages.frontend.reserve', ['propertyId' => $property->id]);
    }
    public function checkout(Request $request, $code)
    {
        return view('pages.frontend.checkout', ['code' => $code]);
    }

    // Backend
    public function createProperty(Request $request) {
        return $request;
    }

    public function editProperty(Request $request, Property $property) {
        return view('pages.dashboard.properties.edit', ['propertyId' => $property->id]);
    }

}
