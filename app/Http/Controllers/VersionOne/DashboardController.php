<?php

namespace App\Http\Controllers\VersionOne;

use App\Helpers\AppHelper;
use App\Helpers\ChartsForLineAndBar;
use App\Helpers\DashboardWidgetCard;
use App\Http\Controllers\Controller;
use App\Models\VersionOne\FarmerCultivationDetail;
use App\Models\VersionOne\Product;
use App\Models\VersionOne\Region;
use DB;
use Request;

class DashboardController extends Controller
{
    function dashboard()
    {
        $regions = Region::regionsUniqueName()->get();
        $regionsHasFarms = Region::regionsHasFarm(Request::get('region')??"Arusha", Request::get('product')??"Alizeti")
            ->orderByDesc('id')
            ->get();

        $productVariety = $regionsHasFarms->pluck('product_name')->unique();

        $farmerCultivationDetailId = $regionsHasFarms->pluck('id');

        $harvestExpectationChartData = FarmerCultivationDetail::expectedHarvest($farmerCultivationDetailId, 'expected_harvest')
            ->get()->map(function ($data) {
                return [
                    'label' => $data->harvest_date['month_year'],
                    'value' => $data->subtotal,
                ];
            });

        $harvestChartData = FarmerCultivationDetail::expectedHarvest($farmerCultivationDetailId, 'harvest')
            ->get()->map(function ($data) {
                return [
                    'label' => $data->harvest_date['month_year'],
                    'value' => $data->subtotal,
                ];
            });

        $totalNeedLoan = $regionsHasFarms->where('is_needs_loan', '=', 1)->count();
        $totalHavingAgricultureSkills = $regionsHasFarms->where('is_having_agriculture_skills', '=', 1)->count();
        $totalHavingIrrigationSystem = $regionsHasFarms->where('is_have_irrigation_system', '=', 1)->count();
        $firstTime = $regionsHasFarms->where('is_first_time', '=', 1)->count();
        $totalFarms = $farmerCultivationDetailId->count();

        return response()->json([

            /*
            * Here you can manage chart data form dashboard without touch front ends
            * consider to add or remove cards here
             * only Line and bar chart type
            * */
            'chartsForLineAndBar' => [
                (new ChartsForLineAndBar(title: "Harvest Expectation"))->lineChart($harvestExpectationChartData->toArray()),
                /*
                 * for bar chart just call barChart method
                 * */
                (new ChartsForLineAndBar(title: "Harvest Results"))->barChart($harvestChartData->toArray()),
            ],
            /*
             * Here you can manage card data form dashboard without touch front ends
             * consider to add or remove cards here
             * */

            'dashboardWidgetCards' => [
               (new DashboardWidgetCard(
                   title:"Needs Loan" ,
                   subtitle:"Farmers who needs loan" ,
                   subtotal:$totalNeedLoan ,
                   percentage: AppHelper::getPercentage($totalNeedLoan, $totalFarms))
               )->getCard(),

                (new DashboardWidgetCard(
                   title:"Skills" ,
                   subtitle:"Having Agriculture skills" ,
                   subtotal:$totalHavingAgricultureSkills ,
                   percentage: AppHelper::getPercentage($totalHavingAgricultureSkills, $totalFarms))
               )->getCard(),

                (new DashboardWidgetCard(
                   title:"Irrigation" ,
                   subtitle:"Using Irrigation system" ,
                   subtotal:$totalHavingIrrigationSystem,
                   percentage: AppHelper::getPercentage($totalHavingIrrigationSystem, $totalFarms))
               )->getCard(),

                (new DashboardWidgetCard(
                   title:"New farmers" ,
                   subtitle:"Farmer who are new in agriculture" ,
                   subtotal:$totalHavingIrrigationSystem,
                   percentage: AppHelper::getPercentage($firstTime, $totalFarms))
               )->getCard(),
            ],


            /*
             *Below value are required from front end
             * */

            'productVariety' => Product::select(['name'])->whereStatus(1)->get(),
            'totalProductVariety' => number_format($productVariety->count()),
            'totalFarmSize' => number_format($regionsHasFarms->sum('farm_size')),
            'totalExpectedHarvest' => number_format($regionsHasFarms->sum('expected_harvest')),
            'totalNeedFertilizer' => number_format($regionsHasFarms->where('is_using_fertilizer', '=', 1)->count()),
            'totalFarms' => number_format($farmerCultivationDetailId->count()),
            'data' => $regionsHasFarms,
            'regions' => $regions,
        ]);

    }

}
