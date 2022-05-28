<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Oportunidad;
use App\Models\Gestionagente;
use App\Models\Hojadevida;
use App\Models\Documentos_user;
use App\Models\Gestionarhojadevida;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Helper;
use Auth;
use App\Http\Requests\HojadevidaStoreRequest;

class HojadevidaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        Helper::updateOportu();
        $user_id = Auth::id();
        $dbdocumentos_user = Documentos_user::all();
        $numerodocumentos = Documentos_user::all()->count();
        $total = count(Schema::getColumnListing('$dbdocumentos_user'));
        $dbdatosuserids = [];
        foreach ($dbdocumentos_user as $itemsdocumentos) {
            $dbdatosuserids[] = $itemsdocumentos->user_id;
        }
//        $dboportunidades = Oportunidad::WhereIn('student_id', $dbdatosuserids)->where('agent_id', $user_id)->get();
        $dboportunidades = Oportunidad::WhereIn('student_id', $dbdatosuserids)->get();

        foreach ($dboportunidades as $items) {
            Hojadevida::updateOrCreate([
                'inscription_id' => $items->inscription_id, 
                'agent_id' => $items->agent_id, 
                'student_id' => $items->student_id
                    ], [
                'correciones' => 'Sin correcciones',
                'creation_date' => Carbon::now(),
            ]);
        }
        $HojadevidaData = Hojadevida::where('agent_id', $user_id)->get();
        //dd($HojadevidaData);

        return view('admin.admisiones.gestionarhvs', compact('HojadevidaData'));
    }

    public function store(HojadevidaStoreRequest $request) {
//        dd($request->id);
        $datosHv = Hojadevida::where('id', $request->id)->get();
        $datosinscripcion = Inscription::where('id', $datosHv['0']['inscription_id'])->first();
        $datosuser = User::where('id', $datosHv['0']['student_id'])->first();
//        dd($request->status);

        Hojadevida::updateOrCreate([
            'agent_id' => $request->id,
            'inscription_id' => $datosinscripcion->id,
            'student_id' => $datosuser->id
                ], [
            'status' => $request->status,
            'correciones' => $request->correciones,
            'creation_date' => Carbon::now(),
        ]);
        Gestionarhojadevida::create([
            'agent_id' => $request->id,
            'inscription_id' => $datosinscripcion->id,
            'student_id' => $datosuser->id,
            'status' => $request->status,
            'correciones' => $request->correciones,
            'creation_date' => Carbon::now(),
        ]);
        if ($request->status == '4') {
            Inscription::where('id', $datosHv['0']['inscription_id'])->update([
                'status' => '4',
            ]);
        }
        return back();
    }

}
