<?php

namespace App\Http\Controllers\VersionOne;

use App\Http\Controllers\Controller;
use App\Models\VersionOne\Farm;
use App\Models\VersionOne\FarmerCultivationDetail;
use App\Models\VersionOne\Product;
use App\Models\VersionOne\Region;
use DB;
use http\Env\Response;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard(){
//        //
        $regionsHasFarms = Region::regionsHasFarm("Arusha")
            //->take(2)
            ->orderByDesc('id')
            ->get();

        $regions = Region::regionsUniqueName()->get();

        $farmerCultivationDetailId = $regionsHasFarms->pluck('id');


        $result = FarmerCultivationDetail::whereIn('id',$farmerCultivationDetailId)
            ->selectRaw("harvest_date, count('id') as total ")
            ->groupByRaw("MONTH(harvest_date), YEAR('2023')")
            ->orderBy('harvest_date')
            ->get();

        $harvest_expectation_chart = $result->map(function ($data){
            return [
                'date' => $data->harvest_date['month_year'],
                'total' => $data->total,
            ];
        });







        $productVariety = $regionsHasFarms->pluck('product_name')->unique();
        return response()->json([
            'regions' => $regions,
            'charts' => [
                "harvest_expectation_chart" => $harvest_expectation_chart,
            ],
            'productVariety'=> $productVariety,
            'totalProductVariety'=> $productVariety->count(),
            'totalFarmSize' => $regionsHasFarms->sum('farm_size'),
            'totalExpectedHarvest' => $regionsHasFarms->sum('expected_harvest'),
            'totalNeedLoan' => $regionsHasFarms->where('needs_loan','=',1)->count(),
            'totalNeedFertilizer' => $regionsHasFarms->where('using_manure','=',1)->count(),
            'totalFarms' => $farmerCultivationDetailId->count(),
            'firstTime' => $regionsHasFarms->where('is_first_time','=',1)->count(),
            'data' => $regionsHasFarms
        ]);

    }
}
