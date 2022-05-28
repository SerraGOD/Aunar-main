<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Oportunidad;
use App\Models\Gestionagente;
use App\Models\Documentos_user;
use App\Models\Hojadevida;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Helpers\Helper;

class ReportesAdmicionesCController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function miGestion() {

        $user_id = Auth::id();
        //-----------------------------------------------------------------------------------
        //GRAFICO DE LINEAS
        //-----------------------------------------------------------------------------------

        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        $getDataOperacionesFecha = DB::table('oportunidads')
                ->select(DB::raw('DATE(creation_date) as date'), DB::raw('count(*) as views'))
                ->where('agent_id', $user_id)
                ->whereBetween('creation_date', [$startDate, $endDate])
                ->groupBy('date')
                ->get();

        //dd($getDataOperacionesFecha);


        $data = \Lava::DataTable();
        $data->addDateColumn('Fecha')
                ->addNumberColumn('Operaciones');


        // Random Data For Example
        foreach ($getDataOperacionesFecha as $items) {
            $rowData = [
                $items->date, $items->views
            ];
            $data->addRow($rowData);
        }
        \Lava::LineChart('Stocks', $data, [
            'title' => 'Proyeccion de operacion en el mes',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ],
            'colors' => ['blue', '#F4C1D8']
        ]);
        \Lava::LineChart('Stocks', $data, 'stocks-div');



        //-----------------------------------------------------------------------------------
        //GRAFICO DE PASTEL
        //-----------------------------------------------------------------------------------

        $getDataOperacionesporcentaje = DB::table('oportunidads')
                ->select('status', DB::raw('count(*) as total'))
                ->where('agent_id', $user_id)
                ->groupBy('status')
                ->get();

        $numeroperaciones = Oportunidad::where('agent_id', $user_id)->count();
        $numerOperacionesConAccion = Oportunidad::where('agent_id', $user_id)->where('status', '7')->count();

        //dd($getDataOperacionesporcentaje);

        $data2 = \Lava::DataTable();
        $data2->addStringColumn('Operaciones')
                ->addNumberColumn('Porcentaje');
        foreach ($getDataOperacionesporcentaje as $items) {
            $data2->addRow([Helper::estadoOportunidad($items->status), $items->total]);
        };


        \Lava::DonutChart('Stocks2', $data2, [
            'title' => 'Operaciones por porcentaje'
        ]);
        \Lava::DonutChart('Stocks2', $data2, 'stocks2-div');

        /*
          //-----------------------------------------------------------------------------------
          //GRAFICO DE BARRAS VERTICAL
          //-----------------------------------------------------------------------------------
          $data3 = \Lava::DataTable();
          $data3->addDateColumn('Year')
          ->addNumberColumn('Variable 1')
          ->addNumberColumn('Variable 2')
          ->setDateTimeFormat('Y')
          ->addRow(['2004', 1000, 400])
          ->addRow(['2005', 1170, 460])
          ->addRow(['2006', 660, 1120])
          ->addRow(['2007', 1030, 54]);

          \Lava::ColumnChart('Stocks3', $data3, [
          'title' => 'Grafico 1',
          'titleTextStyle' => [
          'color'    => '#eb6b2c',
          'fontSize' => 14
          ]
          ]);
          \Lava::ColumnChart('Stocks3', $data3, 'stocks3-div');


          //-----------------------------------------------------------------------------------
          //GRAFICO DE BARRAS HORIZONTAL
          //-----------------------------------------------------------------------------------
          $data4 = \Lava::DataTable();
          $data4->addStringColumn('Stock4')
          ->addNumberColumn('Cantidad de dicha variable')
          ->addRow(['Variable 1',  rand(1000,5000)])
          ->addRow(['Variable 2',  rand(1000,5000)])
          ->addRow(['Variable 3',  rand(1000,5000)])
          ->addRow(['Variable 4', rand(1000,5000)])
          ->addRow(['Variable 5',   rand(1000,5000)]);

          \Lava::BarChart('Stocks4', $data4, [
          'title' => 'Grafico 4'
          ]);

          \Lava::BarChart('Stocks4', $data4, 'stocks4-div'); */

        $metaoperaciones = '300';
        return view('admin.admisiones.miGestion', compact('numeroperaciones', 'metaoperaciones', 'numerOperacionesConAccion'));
    }

    public function reporteMatriculas() {
        $user_id = Auth::id();
        //-----------------------------------------------------------------------------------
        //GRAFICO DE LINEAS
        //-----------------------------------------------------------------------------------

        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        $getDataOperacionesFecha = DB::table('oportunidads')
                ->select(DB::raw('DATE(creation_date) as date'), DB::raw('count(*) as views'))
                ->whereBetween('creation_date', [$startDate, $endDate])
                ->groupBy('date')
                ->get();

        //dd($getDataOperacionesFecha);


        $data = \Lava::DataTable();
        $data->addDateColumn('Fecha')
                ->addNumberColumn('Operaciones');


        // Random Data For Example
        foreach ($getDataOperacionesFecha as $items) {
            $rowData = [
                $items->date, $items->views
            ];
            $data->addRow($rowData);
        }
        \Lava::LineChart('Stocks', $data, [
            'title' => 'Proyeccion de operacion en el mes',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ],
            'colors' => ['blue', '#F4C1D8']
        ]);
        \Lava::LineChart('Stocks', $data, 'stocks-div');



        //-----------------------------------------------------------------------------------
        //GRAFICO DE PASTEL
        //-----------------------------------------------------------------------------------

        $getDataOperacionesporcentaje = DB::table('oportunidads')
                ->select('status', DB::raw('count(*) as total'))
                ->groupBy('status')
                ->get();

        $numeroperaciones = Oportunidad::all()->count();
        $numerOperacionesConAccion = Oportunidad::all()->where('status', '7')->count();

        //dd($getDataOperacionesporcentaje);

        $data2 = \Lava::DataTable();
        $data2->addStringColumn('Operaciones')
                ->addNumberColumn('Porcentaje');
        foreach ($getDataOperacionesporcentaje as $items) {
            $data2->addRow([Helper::estadoOportunidad($items->status), $items->total]);
        };


        \Lava::DonutChart('Stocks2', $data2, [
            'title' => 'Operaciones por porcentaje'
        ]);
        \Lava::DonutChart('Stocks2', $data2, 'stocks2-div');

        /*
          //-----------------------------------------------------------------------------------
          //GRAFICO DE BARRAS VERTICAL
          //-----------------------------------------------------------------------------------
          $data3 = \Lava::DataTable();
          $data3->addDateColumn('Year')
          ->addNumberColumn('Variable 1')
          ->addNumberColumn('Variable 2')
          ->setDateTimeFormat('Y')
          ->addRow(['2004', 1000, 400])
          ->addRow(['2005', 1170, 460])
          ->addRow(['2006', 660, 1120])
          ->addRow(['2007', 1030, 54]);

          \Lava::ColumnChart('Stocks3', $data3, [
          'title' => 'Grafico 1',
          'titleTextStyle' => [
          'color'    => '#eb6b2c',
          'fontSize' => 14
          ]
          ]);
          \Lava::ColumnChart('Stocks3', $data3, 'stocks3-div');


          //-----------------------------------------------------------------------------------
          //GRAFICO DE BARRAS HORIZONTAL
          //-----------------------------------------------------------------------------------
          $data4 = \Lava::DataTable();
          $data4->addStringColumn('Stock4')
          ->addNumberColumn('Cantidad de dicha variable')
          ->addRow(['Variable 1',  rand(1000,5000)])
          ->addRow(['Variable 2',  rand(1000,5000)])
          ->addRow(['Variable 3',  rand(1000,5000)])
          ->addRow(['Variable 4', rand(1000,5000)])
          ->addRow(['Variable 5',   rand(1000,5000)]);

          \Lava::BarChart('Stocks4', $data4, [
          'title' => 'Grafico 4'
          ]);

          \Lava::BarChart('Stocks4', $data4, 'stocks4-div'); */
        $numAgentes = User::where('profile', '2')->where('status', '1')->count();
        $metaoperaciones = '300' * $numAgentes;

        return view('admin.admisiones.reporteMatriculas', compact('numeroperaciones', 'metaoperaciones', 'numerOperacionesConAccion'));
    }

}
