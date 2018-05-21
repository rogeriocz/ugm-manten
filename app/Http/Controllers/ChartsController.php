<?php

namespace App\Http\Controllers;

use App\Manten;
use DB;
use Charts;
//use App\Charts\SampleChart;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
	public function chart()
	{
		
		$products = Manten::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
		
		 $chart = Charts::database($products, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->lastByday(14, true);
		
		dd($chart);
		return view('graficas.index', compact('chart'));
	}
}
