<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\Api\V1\HousesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\HouseCollection;
use App\Http\Resources\Api\V1\HouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return HouseCollection
     */
    public function index(Request $request)
    {
        $filter = new HousesFilter();
        $queryData = $filter->transform($request);
        // if query param output filtered
        if(count($queryData)) return new HouseCollection(House::where($queryData)->paginate(10));

        return new HouseCollection(House::paginate(10));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return HouseResource
     */
    public function show(House $house)
    {
        return new HouseResource($house);
    }
}
