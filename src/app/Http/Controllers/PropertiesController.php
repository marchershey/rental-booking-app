<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function createProperty(Request $request) {
        return $request;
    }

    public function editProperty(Request $request, Property $property) {
        return view('pages.dashboard.properties.edit', ['propertyId' => $property->id]);
    }
}
