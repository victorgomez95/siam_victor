<?php

namespace SIAM\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\PacientCreateRequest;
use SIAM\Http\Controllers\Controller;

use SIAM\Pacient;
use SIAM\Date;
use SIAM\State;
use SIAM\Ahf;
use SIAM\App;
use SIAM\Apnp;
use SIAM\Ago;
use SIAM\NSomatometry;
use SIAM\Aeg;
use SIAM\Aapysis;
use SIAM\Apact;
use SIAM\Asg;
use SIAM\Aer;
use SIAM\NurseSheet;

use SIAM\Town;
use SIAM\Locality;
use SIAM\Nationality;

use DB;
use PDF;
use Carbon\Carbon;
use Session;
use Redirect;

class PacientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index(Request $request)
  {
    if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes = Pacient::name($request->get('name'))->orderBy('created_at','DESC')->paginate(15);
            return view('pacients.index',["pacients"=>$pacientes,"searchText"=>$query]);
        }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $states = State::pluck('NOM_ENT','CVE_ENT');
    $nationalities = Nationality::nationalities();
    return view('pacients/create',compact('states','nationalities'));
  }
  public function getTowns(Request $request, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities(Request $request, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  public function getTowns2(Request $request, $id_paciente, $id){
    if ($request->ajax()) {
      $towns = Town::towns($id);
      return response()->json($towns);
    }
  }
  public function getLocalities2(Request $request, $id_paciente, $id_estado , $id_municipio){
    if ($request->ajax()) {
      $localities = Locality::localities($id_estado,$id_municipio);
      return response()->json($localities);
    }
  }
  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */

  public function addPacient(PacientCreateRequest $request){
	//el método create() crea un nuevo registro, se deben asociar los datos del request
    //con las columnas de la tabla
    $paciente = Pacient::create([
    'nombre'           => $request['nombre'],
    'apaterno'         => $request['apaterno'],
    'amaterno'         => $request['amaterno'],
    'sexo'             => $request['sexo'],
    'fecha_nac'        => $request['fecha_nac'],
    'curp'             => $request['curp'],
    'nacionalidad'     => $request['nacionalidad'],
    'calle'            => $request['calle'],
    'num_ext'          => $request['num_ext'],
    'num_int'          => $request['num_int'],
    'colonia'          => $request['colonia'],
    'cp'               => $request['cp'],
    'localidad'        => $request['localidad'],
    'municipio'        => $request['municipio'],
    'estado'           => $request['estado'],
    'telefono_casa'    => $request['telefono_casa'],
    'telefono_celular' => $request['telefono_celular'],
    'telefono_oficina' => $request['telefono_oficina'],
    'correo'           => $request['correo']
    ]);
	return response()->json(['estado' => 'Paciente registrado correctamente','id_paciente' => $paciente->id]);
  }
  
  public function addPacientComplement(Request $request){
    //el método create() crea un nuevo registro, se deben asociar los datos del request
    /*/con las columnas de la tabla
    Pacient::create([
    'nombre'           => $request['nombre'],
    'apaterno'         => $request['apaterno'],
    'amaterno'         => $request['amaterno'],
    'sexo'             => $request['sexo'],
    'fecha_nac'        => $request['fecha_nac'],
    'curp'             => $request['curp'],
    'nacionalidad'     => $request['nacionalidad'],
    'calle'            => $request['calle'],
    'num_ext'          => $request['num_ext'],
    'num_int'          => $request['num_int'],
    'colonia'          => $request['colonia'],
    'cp'               => $request['cp'],
    'localidad'        => $request['localidad'],
    'municipio'        => $request['municipio'],
    'estado'           => $request['estado'],
    'telefono_casa'    => $request['telefono_casa'],
    'telefono_celular' => $request['telefono_celular'],
    'telefono_oficina' => $request['telefono_oficina'],
    'correo'           => $request['correo']
    ]);*/

    $fecha = Carbon::now();
    $id_paciente = $request['id_paciente'];

    //Agregamos antecedentes heredoFamiliares
    Ahf::create([
      'id_paciente'	 => $id_paciente,
      'diabetes'	 => $request['diabetes'],
      'hipertension' => $request['hipertension'],
      'cardiopatia'	 => $request['cardiopatia'],
      'hepatopatia'	 => $request['hepatopatia'],
      'nefropatia'	 => $request['nefropatia'],
      'enmentales'	 => $request['enmentales'],
      'asma'	     => $request['asma'],
      'cancer'	     => $request['cancer'],
      'enalergicas'	 => $request['enalergicas'],
      'endocrinas'	 => $request['endocrinas'],
      'otros'	     => $request['otros'],
      'intneg'	     => $request['intneg']
    ]);

    //Agregamos antecedentes personales patológicos
    App::create([
      'id_paciente'	     => $id_paciente,
      'enactuales'	     => $request['enactuales'],
      'quirurjicos'	     => $request['quirurjicos'],
      'transfuncionales' => $request['transfuncionales'],
      'alergias'	       => $request['alergias'],
      'traumaticos'	     => $request['traumaticos'],
      'hosprevias'	     => $request['hosprevias'],
      'adicciones'	     => $request['adicciones'],
      'otros'            => $request['adicciones']
    ]);

	$servicios = "";

    if (isset($request['agua_pacient_check']))
    {
      $servicios .= "Agua potable. ";
    }
    if (isset($request['energia_pacient_check']))
    {
      $servicios .= "Energía eléctrica. ";
    }
    if (isset($request['telefono_pacient_check']))
    {
      $servicios .= "Teléfono fijo. ";
    }
    if (isset($request['internet_pacient_check']))
    {
      $servicios .= "Internet. ";
    }
    if (isset($request['tv_pacient_check']))
    {
      $servicios .= "TV por cable. ";
    }
	  
    //Agregamos antecedentes personales no patológicos
    Apnp::create([
      'id_paciente'  => $id_paciente,
      'banio'        => $request['banio'],
      'dientes'      => $request['dientes'],
      'habitacion'   => $request['habitacion'],
      'servicios'   => $servicios,
      'tabaquismo'   => $request['tabaquismo'],
      'alcoholismo'  => $request['alcoholismo'],
      'alimentacion' => $request['alimentacion'],
      'deportes'     => $request['deportes']
    ]);


    //se crea la hoja de enfermería y se recupera el registro para crear las otras partes de la hoja
    $fecha = Carbon::now();
    NurseSheet::create([
      'fecha'       => $fecha,
      'id_paciente' => $id_paciente
    ]);
    $nurseSheets = NurseSheet::all();
    $unurseSheets = $nurseSheets->last();

    //Se crea la somatometría de la hoja de enfermería
    //Exploracion fisica
    NSomatometry::create([
    'id_ns' 		    => $unurseSheets->id,
    'peso' 			    => $request['peso_pacient'],
    'altura' 		    => $request['altura_pacient'],
    'psistolica'  	=> $request['psistolica_pacient'],
    'pdiastolica' 	=> $request['pdiastolica_pacient'],
    'frespiratoria' => $request['frespiratoria_pacient'],
    'pulso' 		    => $request['pulso_pacient'],
    'oximetria' 	  => $request['oximetria_pacient'],
    'glucometria' 	=> $request['glucometria_pacient']
    ]);

    //Antecedentes Exploracion general
     Aeg::create([
     'id_paciente'  		  => $id_paciente,
     'ori_desori'         => $request['ori_desori'],
     'hidra_deshidra'     => $request['hidra_deshidra'],
     'coloracion'   		  => $request['coloracion'],
     'marcha_normal'   	  => $request['marcha_normal'],
     'altMarcha_otrasAlt' => $request['altMarcha_otrasAlt'],
     'otro_iter' 		      => $request['otro_iter']
     ]);

    //Antecedentes Exploracion de aparatos y sistemas
     Aapysis::create([
      'id_paciente'  			=> $id_paciente,
      'ap_digestivo'      => $request['ap_digestivo'],
      'ap_cardivascular'  => $request['ap_cardivascular'],
      'ap_respiratorio'   => $request['ap_respiratorio'],
      'ap_urinario'   		=> $request['ap_urinario'],
      'ap_genital'  			=> $request['ap_genital'],
      'ap_hematologico' 	=> $request['ap_hematologico'],
      'ap_endocrino' 			=> $request['ap_endocrino'],
      'ap_osteomuscular' 	=> $request['ap_osteomuscular'],
      'si_nervioso' 			=> $request['si_nervioso'],
      'si_sensorial' 			=> $request['si_sensorial'],
      'sicosomatico' 			=> $request['sicosomatico']
     ]);
		
     //Antecedentes Padecimiento actual
     Apact::create([
      'id_paciente'  		    => $id_paciente,
      'descripcion_pacient'     => $request['descripcion_pacient']
      ]);

     //Antecedentes sintomas generales
     Asg::create([
      'id_paciente'  		  => $id_paciente,
      'astenia_pacient'  	=> $request['astenia_pacient'],
      'adinamia_pacient'  => $request['adinamia_pacient'],
      'anorexia_pacient'  => $request['anorexia_pacient'],
      'fiebre_pacient'   	=> $request['fiebre_pacient'],
      'pPeso_pacient'   	=> $request['pPeso_pacient'],
      'otrosSI_pacient'   => $request['otrosSI_pacient']
     ]);

     //Antecedentes sintomas generales
     Aer::create([
      'id_paciente'  		 => $id_paciente,
      'cuello_sujeto'  	 => $request['cuello_sujeto'],
      'torax_sujeto'   	 => $request['torax_sujeto'],
      'abdomen_sujeto'   => $request['abdomen_sujeto'],
      'miembros_sujeto'  => $request['miembros_sujeto'],
      'genitales_sujeto' => $request['genitales_sujeto'],
      'cabeza_sujeto'    => $request['cabeza_sujeto']
     ]);


    if (empty($request['menarca']) && empty($request['rmenstrual']) && empty($request['dismenorrea']) && empty($request['ivsa']) && empty($request['parejas']) && empty($request['gestas']) && empty($request['abortos']) && empty($request['partos']) && empty($request['cesareas']) && empty($request['fpp']) && empty($request['menopausia']) && empty($request['climaterio']) && empty($request['mpp']) && empty($request['citologia']) && empty($request['mastografia'])) {
      # nothing to do here...
    }
    else {
      //Agregamos antecedentes gineco-obstétricos
      Ago::create([
        'id_paciente' => $id_paciente,
        'menarca'     => $request['menarca'],
        'rmenstrual'  => $request['rmenstrual'],
        'dismenorrea' => $request['dismenorrea'],
        'ivsa'        => $request['ivsa'],
        'parejas'     => $request['parejas'],
        'gestas'      => $request['gestas'],
        'abortos'     => $request['abortos'],
        'partos'      => $request['partos'],
        'cesareas'    => $request['cesareas'],
        'fpp'         => $request['fpp'],
        'menopausia'  => $request['menopausia'],
        'climaterio'  => $request['climaterio'],
        'mpp'         => $request['mpp'],
        'citologia'   => $request['citologia'],
        'mastografia' => $request['mastografia']
      ]);
    }

    return response()->json("Paciente registrado correctamente");
  }
	
  public function pdf($apartados2)
  {
    $apartados                  = explode(",", $apartados2);
    $fecha                      = Carbon::now();
    $pacients                   = Pacient::all();
    $upacient                   = $pacients->last();
    $id_paciente                = $upacient->id;
    $nombre_paciente            = $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno;
    $datos_personales_array     = array();
    $antecedentes_hf_array      = array();
    $antecedentes_pp_array      = array();
    $antecedentes_pnp_array     = array();
    $antecedentes_go_array      = array();
    $interrogatorio_as_array    = array();
    $sintomas_generales_array   = array();
    $padecimiento_actual_array  = array();
    $somatometria_array         = array();
    $inspeccion_general_array   = array();
    $exploracion_fisica_array   = array();
    $info_array                 = array();

    for ($i=0; $i < count($apartados) ; $i++) {
      if ($apartados[$i] == 1) {
        $datos_personales_array[] = array(
        'nombre_paciente'  => $upacient->nombre.' '.$upacient->apaterno.' '.$upacient->amaterno,
        'nombre'           => $upacient->nombre,
        'apaterno'         => $upacient->apaterno,
        'amaterno'         => $upacient->amaterno,
        'sexo'             => $upacient->sexo,
        'fecha_nac'        => $upacient->fecha_nac,
        'curp'             => $upacient->curp,
        'nacionalidad'     => $upacient->nacionalidad,
        'calle'            => $upacient->calle,
        'num_ext'          => $upacient->num_ext,
        'num_int'          => $upacient->num_int,
        'colonia'          => $upacient->colonia,
        'cp'               => $upacient->cp,
        'localidad'        => $upacient->localidad,
        'municipio'        => $upacient->municipio,
        'estado'           => $upacient->estado,
        'telefono_casa'    => $upacient->telefono_casa,
        'telefono_celular' => $upacient->telefono_celular,
        'telefono_oficina' => $upacient->telefono_oficina,
        'correo'           => $upacient->correo
        );
        $info_array[]  = 'Datos_personales';
      }
      if ($apartados[$i] == 2) {
        $fila_antecedentes_hf = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_hf as $antecedente_hf) {
          $antecedentes_hf_array [] = array(
          'diabetes'        => $antecedente_hf->diabetes,
          'hipertension'    => $antecedente_hf->hipertension,
          'cardiopatia'     => $antecedente_hf->cardiopatia,
          'hepatopatia'     => $antecedente_hf->hepatopatia,
          'nefropatia'      => $antecedente_hf->nefropatia,
          'enmentales'      => $antecedente_hf->enmentales,
          'asma'            => $antecedente_hf->asma,
          'cancer'          => $antecedente_hf->cancer,
          'enalergicas'     => $antecedente_hf->enalergicas,
          'endocrinas'      => $antecedente_hf->endocrinas,
          'otros'           => $antecedente_hf->otros,
          'intneg'          => $antecedente_hf->intneg
          );
        }
        $info_array[]  = 'Antecedentes_HF';
      }
      if ($apartados[$i] == 3) {
        $fila_antecedentes_pp = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_pp as $antecedente_pp) {
          $antecedentes_pp_array [] = array(
          'enactuales'        => $antecedente_pp->enactuales,
          'quirurjicos'       => $antecedente_pp->quirurjicos,
          'transfucionales'   => $antecedente_pp->transfuncionales,
          'alergias'          => $antecedente_pp->alergias,
          'traumaticos'       => $antecedente_pp->traumaticos,
          'hosprevias'        => $antecedente_pp->hosprevias,
          'adicciones'        => $antecedente_pp->adicciones,
          'otros'             => $antecedente_pp->otros
          );
        }
        $info_array[]  =  'Antecedentes_PP';
      }
      if ($apartados[$i] == 4) {
        $fila_antecedentes_pnp = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_pnp as $antecedente_pnp) {
          $antecedentes_pnp_array [] = array(
          'banio'          => $antecedente_pnp->banio,
          'dientes'        => $antecedente_pnp->dientes,
          'habitacion'     => $antecedente_pnp->habitacion,
          'servicios'      => $antecedente_pnp->servicios,
          'tabaquismo'     => $antecedente_pnp->tabaquismo,
          'alcoholismo'    => $antecedente_pnp->alcoholismo,
          'alimentacion'   => $antecedente_pnp->alimentacion,
          'deportes'       => $antecedente_pnp->deportes
          );
        }
        $info_array[]  = 'Antecedentes_PNP';
      }
      if ($apartados[$i] == 5) {
        $fila_antecedentes_go = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_go as $antecedente_go) {
          $antecedentes_go_array [] = array(
          'menarca'          => $antecedente_go->menarca,
          'rmenstrual'       => $antecedente_go->rmenstrual,
          'dismenorrea'      => $antecedente_go->dismenorrea,
          'ivsa'             => $antecedente_go->ivsa,
          'parejas'          => $antecedente_go->parejas,
          'gestas'           => $antecedente_go->gestas,
          'abortos'          => $antecedente_go->abortos,
          'partos'           => $antecedente_go->partos,
          'cesareas'         => $antecedente_go->cesareas,
          'fpp'              => $antecedente_go->fpp,
          'menopausia'       => $antecedente_go->menopausia,
          'climaterio'       => $antecedente_go->climaterio,
          'mpp'              => $antecedente_go->climaterio,
          'citologia'        => $antecedente_go->citologia,
          'mastografia'      => $antecedente_go->mastografia
          );
        }
        $info_array[]  = 'Antecedentes_GO';
      }
      if ($apartados[$i] == 6) {
        $fila_antecedentes_as = DB::select("select * FROM antecedentesapysis where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_as as $antecedente_as) {
          $interrogatorio_as_array [] = array(
          'ap_digestivo'       => $antecedente_as->ap_digestivo,
          'ap_cardivascular'   => $antecedente_as->ap_cardivascular,
          'ap_respiratorio'    => $antecedente_as->ap_respiratorio,
          'ap_urinario'        => $antecedente_as->ap_urinario,
          'ap_genital'         => $antecedente_as->ap_genital,
          'ap_hematologico'    => $antecedente_as->ap_hematologico,
          'ap_endocrino'       => $antecedente_as->ap_endocrino,
          'ap_osteomuscular'   => $antecedente_as->ap_osteomuscular,
          'si_nervioso'        => $antecedente_as->si_nervioso,
          'si_sensorial'       => $antecedente_as->si_sensorial,
          'sicosomatico'       => $antecedente_as->sicosomatico
          );
        }
        $info_array[]  = 'Interrogatorio_AS';
      }
      if ($apartados[$i] == 7) {
        $fila_antecedentes_g = DB::select("select * FROM antecedentesg where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_g as $antecedente_g) {
          $sintomas_generales_array [] = array(
          'astenia_pacient'     => $antecedente_g->astenia_pacient,
          'adinamia_pacient'    => $antecedente_g->adinamia_pacient,
          'anorexia_pacient'    => $antecedente_g->anorexia_pacient,
          'fiebre_pacient'      => $antecedente_g->fiebre_pacient,
          'pPeso_pacient'       => $antecedente_g->pPeso_pacient,
          'otrosSI_pacient'     => $antecedente_g->otrosSI_pacient,
          );
        }
        $info_array[]  = 'Sintomas_generales';
      }
      if ($apartados[$i] == 8) {
        $fila_antecedentes_apact = DB::select("select * FROM antecedentespact where id_paciente='$id_paciente'");
        foreach ($fila_antecedentes_apact as $antecedente_apact) {
          $padecimiento_actual_array [] = array(
          'descripcion_pacient'   => $antecedente_apact->descripcion_pacient,
          );
        }
        $info_array[]  = 'Padecimiento_actual';
      }
      if ($apartados[$i] == 9) {
        $fila_hde = DB::select("select * FROM nursesheets where id_paciente='$id_paciente'");
        foreach ($fila_hde as $hde) {
          $id_hde = $hde->id;
        }
        if (isset($id_hde)) {
          $fila_somatometria = DB::select("select * FROM nsomatometries where id_ns='$id_hde'");
          foreach ($fila_somatometria as $somatometria) {
            $somatometria_array [] = array(
            'peso'            => $somatometria->peso,
            'altura'          => $somatometria->altura,
            'psistolica'      => $somatometria->psistolica,
            'pdiastolica'     => $somatometria->pdiastolica,
            'frespiratoria'   => $somatometria->frespiratoria,
            'pulso'           => $somatometria->pulso,
            'oximetria'       => $somatometria->oximetria,
            'glucometria'     => $somatometria->glucometria
            );
          }
        }
        $info_array[]  = 'Somatometria';
      }
      if ($apartados[$i] == 10) {
        $fila_inspeccion_general = DB::select("select * FROM antecedenteseg where id_paciente='$id_paciente'");
        foreach ($fila_inspeccion_general as $inspeccion_general) {
          $inspeccion_general_array [] = array(
          'ori_desori'         => $inspeccion_general->ori_desori,
          'hidra_deshidra'     => $inspeccion_general->hidra_deshidra,
          'coloracion'         => $inspeccion_general->coloracion,
          'marcha_normal'      => $inspeccion_general->marcha_normal,
          'altMarcha_otrasAlt' => $inspeccion_general->altMarcha_otrasAlt,
          'otro_iter'          => $inspeccion_general->otro_iter
          );
        }
        $info_array[]  = 'Inspeccion_general';
      }
      if ($apartados[$i] == 11) {
        $fila_exploracion_fisica = DB::select("select * FROM antecedenteser where id_paciente='$id_paciente'");
        foreach ($fila_exploracion_fisica as $exploracion_fisica) {
          $exploracion_fisica_array [] = array(
          'cabeza_sujeto'     => $exploracion_fisica->cabeza_sujeto,
          'cuello_sujeto'     => $exploracion_fisica->cuello_sujeto,
          'torax_sujeto'      => $exploracion_fisica->torax_sujeto,
          'abdomen_sujeto'    => $exploracion_fisica->abdomen_sujeto,
          'miembros_sujeto'   => $exploracion_fisica->miembros_sujeto,
          'genitales_sujeto'  => $exploracion_fisica->genitales_sujeto
          );
        }
        $info_array[]  = 'Exploracion_fisica';
      }
    }
    $pdf = PDF::loadView('reports/pacient_report',compact(
      'info_array'               ,
      'datos_personales_array'   ,
      'antecedentes_hf_array'    ,
      'antecedentes_pp_array'    ,
      'antecedentes_pnp_array'   ,
      'antecedentes_go_array'    ,
      'interrogatorio_as_array'  ,
      'sintomas_generales_array' ,
      'padecimiento_actual_array',
      'somatometria_array'       ,
      'inspeccion_general_array' ,
      'exploracion_fisica_array'
    ));
    $nombre_hoja= 'HojaRegistro'.$nombre_paciente.$fecha.'.pdf';
    return $pdf->download($nombre_hoja);
  }
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function addNurseSheet($id)
  {
    $somatometries_array = array();
    $somatometries2_array = array();
    $paciente_array = array();

    $paciente = Pacient::find($id);
    $fila_hojas_enfermeria = DB::select("select * FROM nursesheets where id_paciente='$id' ORDER BY id DESC LIMIT 5");

    $fila_paciente = DB::select("select * FROM pacients where id='$id'");
    foreach ($fila_paciente as $fila) {
      $paciente_array[] = array(
        'id_paciente' => $fila->id,
        'nombre' => $fila->nombre." ".$fila->apaterno." ".$fila->amaterno
      );
    }

    foreach ($fila_hojas_enfermeria as $fila) {
      $id_hoja    = $fila->id;
      $fecha_hoja = $fila->fecha;
      $fila_somatometria = DB::select("select * FROM nsomatometries where id_ns='$id_hoja'");
      foreach ($fila_somatometria as $fila2) {
        $peso           = $fila2->peso.' kg';
        $altura         = $fila2->altura.' cm';
        $psistolica     = $fila2->psistolica.' mm/Hg';
        $pdiastolica    = $fila2->pdiastolica.' mm/Hg';
        $frespiratoria  = $fila2->frespiratoria;
        $pulso          = $fila2->pulso;
        $oximetria      = $fila2->oximetria.' %';
        $glucometria    = $fila2->glucometria.' mg/dL';

        $peso2          = $fila2->peso;
        $altura2        = $fila2->altura;
        $psistolica2    = $fila2->psistolica;
        $pdiastolica2   = $fila2->pdiastolica;
        $frespiratoria2 = $fila2->frespiratoria;
        $pulso2         = $fila2->pulso;
        $oximetria2     = $fila2->oximetria;
        $glucometria2   = $fila2->glucometria;

        $somatometries_array[] = array(
        'fecha'         => $fecha_hoja,
        'peso'          => $peso,
        'altura'        => $altura,
        'psistolica'    => $psistolica,
        'pdiastolica'   => $pdiastolica,
        'frespiratoria' => $frespiratoria,
        'pulso'         => $pulso,
        'oximetria'     => $oximetria,
        'glucometria'   => $glucometria);

        $somatometries2_array[] = array(
        'fecha'         => $fecha_hoja,
        'peso'          => $peso2,
        'altura'        => $altura2,
        'psistolica'    => $psistolica2,
        'pdiastolica'   => $pdiastolica2,
        'frespiratoria' => $frespiratoria2,
        'pulso'         => $pulso2,
        'oximetria'     => $oximetria2,
        'glucometria'   => $glucometria2);
      }
    }
    //Se crea el archivo json, si existe, se sobreescribe
    $collection = Collection::make($somatometries_array);
    $collection->toJson();
    $file = 'json/somatometrias.json';
    file_put_contents($file, $collection);

    //Se crea el archivo json, si existe, se sobreescribe
    $collection2 = Collection::make($somatometries2_array);
    $collection2->toJson();
    $file2 = 'json/somatometrias2.json';
    file_put_contents($file2, $collection2);

    //Se crea el archivo json, si existe, se sobreescribe
    $collection3 = Collection::make($paciente_array);
    $collection3->toJson();
    $file3 = 'json/pacientehde.json';
    file_put_contents($file3, $collection3);

    return view('nurseSheets/create',['pacient'=>$paciente]);
  }

  public function show(Request $request)
  {
    //dd($request->get('name'));
    $pacients = Pacient::name($request->get('name'))->orderBy('id','DESC')->paginate(4);
    //se returna la vista con todos los registros
    return view('pacients/index',compact('pacients'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id_usuario
  * @return Response
  */
  //muestra a todos los pacientes para elegir uno y actualizarlo
  public function actualizar(Request $request){
	$pacients = Pacient::name($request->get('name'))->orderBy('created_at','DESC')->paginate(15);
  	return view('pacients.update',compact('pacients'));
  }
  //ya que se ha eligido uno, se aparta para editarlo//
  public function edit($id)
  {
	$go_data = false;
    $pacient = Pacient::find($id);
    $pacients = Pacient::all();
    $nacio = $pacient->nacionalidad;
    $fila_nac = DB::select("select * from nationalities where CVE_NAC='$nacio'");
	$nac = "";
    foreach ($fila_nac as $fila) {
      $nac = $fila->pais;
    }
	  
    $enti = $pacient->estado;
	$ent  = "";
    $fila_enti = DB::select("select * from states where CVE_ENT='$enti'");
    foreach ($fila_enti as $fila1) {
      $ent = $fila1->NOM_ENT;
    }
	  
    $muni = $pacient->municipio;
	$mun = "";
    $fila_muni = DB::select("select * from towns where CVE_MUN='$muni' and CVE_ENT='$enti'");
    foreach ($fila_muni as $fila2) {
      $mun = $fila2->NOM_MUN;
    }
	  
    $local = $pacient->localidad;
	$loc   = "";
    $fila_loc = DB::select("select * from localities where id='$local'");
    foreach ($fila_loc as $fila3) {
      $loc = $fila3->NOM_LOC;
    }

    $states = State::all();
    $nationalities = Nationality::nationalities();
    $id_paciente       = $pacient->id;
    $antecedentes_go   = " ";
    $fila_go           = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
    foreach ($fila_go as $go) {
    	$antecedentes_go   = $go;
		$go_data = true;
    }
	  
	
    $antecedentes_hf   = " ";
    $fila_hf           = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
    foreach ($fila_hf as $hf) {
    	$antecedentes_hf   = $hf;
    }
	  
    $antecedentes_pnp  = " ";
    $fila_pnp          = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
    foreach ($fila_pnp as $pnp) {
    	$antecedentes_pnp  = $pnp;
    }
	  
    $antecedentes_pp   = " ";
    $fila_pp           = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
    foreach ($fila_pp as $pp) {
    	$antecedentes_pp   = $pp;
    }
	  
	$antecedentes_apysis   = " ";
    $fila_apysis           = DB::select("select * FROM antecedentesapysis where id_paciente='$id_paciente'");
    foreach ($fila_apysis as $pp) {
    	$antecedentes_apysis   = $pp;
    }
	  
	$antecedentes_sg   = " ";
    $fila_sg           = DB::select("select * FROM antecedentesg where id_paciente='$id_paciente'");
    foreach ($fila_sg as $pp) {
    	$antecedentes_sg   = $pp;
    }
	  
	$antecedentes_apact   = " ";
    $fila_apact           = DB::select("select * FROM antecedentespact where id_paciente='$id_paciente'");
    foreach ($fila_apact as $pp) {
    	$antecedentes_apact   = $pp;
    }
	  
	$antecedentes_aer   = " ";
    $fila_aer           = DB::select("select * FROM antecedenteser where id_paciente='$id_paciente'");
    foreach ($fila_aer as $pp) {
    	$antecedentes_aer   = $pp;
    }
	  
	$antecedentes_nsoma   = " ";
    $fila_nsoma           = DB::select("SELECT * from nursesheets JOIN nsomatometries ON nursesheets.id = nsomatometries.id_ns WHERE nursesheets.id_paciente='$id_paciente'");
    foreach ($fila_nsoma as $pp) {
    	$antecedentes_nsoma   = $pp;
    }
	  
	$antecedentes_eg   = " ";
    $fila_eg           = DB::select("SELECT * from antecedenteseg WHERE id_paciente='$id_paciente'");
    foreach ($fila_eg as $pp) {
    	$antecedentes_eg   = $pp;
    }
	  
	  
    //se returna la vista del formulario que contendrá los datos del elemento
    //a editar
    return view('pacients.edit',[
    'pacient'          		=> $pacient,
    'pacients'         		=> $pacients,
    'nationalities'    		=> $nationalities,
    'states'           		=> $states,
    'nac'              		=> $nac,
    'ent'              		=> $ent,
    'mun'              		=> $mun,
    'loc'              		=> $loc,
	'id_usuario'			=> $id,
    'antecedentes_go'  		=> $antecedentes_go,
    'antecedentes_hf'  		=> $antecedentes_hf,
    'antecedentes_pnp' 		=> $antecedentes_pnp,
    'antecedentes_pp'  		=> $antecedentes_pp,
	'go_data'		   		=> $go_data,
	'antecedentes_apysis'	=> $antecedentes_apysis,
	'antecedentes_sg'		=> $antecedentes_sg,
	'antecedentes_apact'	=> $antecedentes_apact,
	'antecedentes_aer' 		=> $antecedentes_aer,
	'antecedentes_nsoma'    => $antecedentes_nsoma,
	'antecedentes_eg'		=> $antecedentes_eg
    ]);
  }
  /**
  * Actualiza el registro en la base de datos
  * Recibe como parámetro un Request, que es el formulario que contiene
  * los datos que se van a actualizar y el id del registro a modificar
  * @param  int  $id
  * @return Response
  */
	
  public function update(PacientCreateRequest $request, $id){
	$pacient = Pacient::where('id', $id)->firstOrFail();
    $pacient->fill($request->all());
    $pacient->save();
	  
	/*$Ahf = Ahf::where('id_paciente', $id)->firstOrFail();
    $Ahf->fill($request->all());
    $Ahf->save();*/
	$Ahf = Ahf::where('id_paciente', $id)->firstOrFail();
    $Ahf->diabetes	 	 = $request['diabetes'];
    $Ahf->hipertension 	 = $request['hipertension'];
    $Ahf->cardiopatia	 = $request['cardiopatia'];
    $Ahf->hepatopatia	 = $request['hepatopatia'];
    $Ahf->nefropatia	 = $request['nefropatia'];
    $Ahf->enmentales	 = $request['enmentales'];
    $Ahf->asma	     	 = $request['asma'];
    $Ahf->cancer	     = $request['cancer'];
    $Ahf->enalergicas	 = $request['enalergicas'];
    $Ahf->endocrinas	 = $request['endocrinas'];
    $Ahf->otros	     	 = $request['otros'];
    $Ahf->intneg	     = $request['intneg'];
	$Ahf->save();
	
	/*$App = App::where('id_paciente', $id)->firstOrFail();
    $App->fill($request->all());
    $App->save();*/
	
	$App = App::where('id_paciente', $id)->firstOrFail();
    $App->enactuales	     	= $request['enactuales'];
    $App->quirurjicos	     	= $request['quirurjicos'];
    $App->transfuncionales 		= $request['transfuncionales'];
    $App->alergias	       		= $request['alergias'];
    $App->traumaticos	     	= $request['traumaticos'];
    $App->hosprevias	     	= $request['hosprevias'];
    $App->adicciones	     	= $request['adicciones'];
    $App->otros            		= $request['adicciones'];
	$App->save();
	
	$servicios = "";
    if (isset($request['agua_pacient_check'])){
      $servicios .= "Agua potable. ";
    }
    if (isset($request['energia_pacient_check'])){
      $servicios .= "Energía eléctrica. ";
    }
    if (isset($request['telefono_pacient_check'])){
      $servicios .= "Teléfono fijo. ";
    }
    if (isset($request['internet_pacient_check'])){
      $servicios .= "Internet. ";
    }
    if (isset($request['tv_pacient_check'])){
      $servicios .= "TV por cable. ";
    }
	  
    /*$Apnp = Apnp::where('id_paciente', $id)->firstOrFail();
    $Apnp->fill($request->all());
    $Apnp->save();*/
    $Apnp = Apnp::where('id_paciente', $id)->firstOrFail();
    $Apnp->banio        = $request['banio'];
    $Apnp->dientes      = $request['dientes'];
    $Apnp->habitacion   = $request['habitacion'];
    $Apnp->servicios    = $servicios;
    $Apnp->tabaquismo   = $request['tabaquismo'];
    $Apnp->alcoholismo  = $request['alcoholismo'];
    $Apnp->alimentacion = $request['alimentacion'];
    $Apnp->deportes     = $request['deportes'];
	$Apnp->save();
	  
	/*$NurseSheet  	= NurseSheet::where('id_paciente', $id)->firstOrFail();
	$NSomatometry 	= NSomatometry::where('id_ns', $NurseSheet->id)->firstOrFail();
    $NSomatometry->fill($request->all());
    $NSomatometry->save();*/
	  
	$NurseSheet  	= NurseSheet::where('id_paciente', $id)->firstOrFail();
	
	DB::table('nsomatometries')
    	->where('id_ns', $NurseSheet->id)
        ->update(['peso'    		=> $request['peso_pacient'],
				  'altura'    		=> $request['altura_pacient'] ,
				  'psistolica'   	=> $request['psistolica_pacient'],
				  'pdiastolica'  	=> $request['pdiastolica_pacient'],
				  'frespiratoria' 	=> $request['frespiratoria_pacient'],
				  'pulso'    		=> $request['pulso_pacient'],
				  'oximetria'    	=> $request['oximetria_pacient'],
				  'glucometria'    	=> $request['glucometria_pacient']]);
	  
	
	  
	DB::table('antecedenteseg')
    	->where('id_paciente', $id)
        ->update(['ori_desori'    		=> $request['ori_desori'],
				  'hidra_deshidra'    	=> $request['hidra_deshidra'] ,
				  'coloracion'   		=> $request['coloracion'],
				  'marcha_normal'  		=> $request['marcha_normal'],
				  'altMarcha_otrasAlt' 	=> $request['altMarcha_otrasAlt'],
				  'otro_iter'    		=> $request['otro_iter']]);

	
	DB::table('antecedentesapysis')
    	->where('id_paciente', $id)
        ->update(['ap_digestivo'  	 => $request['ap_digestivo'],
				 'ap_cardivascular'  => $request['ap_cardivascular'],
				 'ap_respiratorio'   => $request['ap_respiratorio'],
				 'ap_urinario'  	 => $request['ap_urinario'],
				 'ap_genital'  		 => $request['ap_genital'],
				 'ap_hematologico'   => $request['ap_hematologico'],
				 'ap_endocrino'  	 => $request['ap_endocrino'],
				 'ap_osteomuscular'  => $request['ap_osteomuscular'],
				 'si_nervioso'  	 => $request['si_nervioso'],
				 'si_sensorial'  	 => $request['si_sensorial'],
				 'sicosomatico'  	 => $request['sicosomatico']]);
		
 
	DB::table('antecedentespact')
    	->where('id_paciente', $id)
        ->update(['descripcion_pacient'  => $request['descripcion_pacient']]);
	
	
	DB::table('antecedentesg')
    	->where('id_paciente', $id)
        ->update(['astenia_pacient'    	=> $request['astenia_pacient'],
				  'adinamia_pacient'    => $request['adinamia_pacient'] ,
				  'anorexia_pacient'   	=> $request['anorexia_pacient'],
				  'fiebre_pacient'  	=> $request['fiebre_pacient'],
				  'pPeso_pacient' 		=> $request['pPeso_pacient'],
				  'otrosSI_pacient'    	=> $request['otrosSI_pacient']]);

	DB::table('antecedenteser')
    	->where('id_paciente', $id)
        ->update(['cuello_sujeto'    => $request['cuello_sujeto'],
				  'torax_sujeto'     => $request['torax_sujeto'] ,
				  'abdomen_sujeto'   => $request['abdomen_sujeto'],
				  'miembros_sujeto'  => $request['miembros_sujeto'],
				  'genitales_sujeto' => $request['genitales_sujeto'],
				  'cabeza_sujeto'    => $request['cabeza_sujeto']]);


    if (empty($request['menarca']) && empty($request['rmenstrual']) && empty($request['dismenorrea']) && empty($request['ivsa']) && empty($request['parejas']) && empty($request['gestas']) && empty($request['abortos']) && empty($request['partos']) && empty($request['cesareas']) && empty($request['fpp']) && empty($request['menopausia']) && empty($request['climaterio']) && empty($request['mpp']) && empty($request['citologia']) && empty($request['mastografia'])) {
      # nothing to do here...
    }
    else {
     /*$Ago = Ago::where('id_paciente', $id)->firstOrFail();
     $Ago->fill($request->all());
     $Ago->save();*/
	 
	 DB::table('antecedentesgo')
    	->where('id_paciente', $id)
        ->update(['menarca'    	=> $request['menarca'],
				  'rmenstrual'  => $request['rmenstrual'] ,
				  'dismenorrea' => $request['dismenorrea'],
				  'ivsa'  		=> $request['ivsa'],
				  'parejas' 	=> $request['parejas'],
				  'gestas'    	=> $request['gestas'],
				  'abortos'     => $request['abortos'],
				  'partos'      => $request['partos'],
				  'cesareas'    => $request['cesareas'],
				  'fpp'         => $request['fpp'],
				  'menopausia'  => $request['menopausia'],
				  'climaterio'  => $request['climaterio'],
				  'mpp'         => $request['mpp'],
				  'citologia'   => $request['citologia'],
				  'mastografia' => $request['mastografia']]);
		
	}

    Session::flash('message','Paciente Actualizado Correctamente');
    return Redirect::to('pacient/');
  }

  public function actualizarPaciente(Request $request){
  	$id 	 = $request['id_pacient'];
	
	/*$pacient = Pacient::where('id_paciente', $id)->firstOrFail();
    $Ahf->fill($request->all());
    $Ahf->save();*/
	$pacient = Pacient::where('id', $id)->firstOrFail();
    $pacient->nombre           = $request['nombre'];
    $pacient->apaterno         = $request['apaterno'];
    $pacient->amaterno         = $request['amaterno'];
    $pacient->sexo             = $request['sexo'];
    $pacient->fecha_nac        = $request['fecha_nac'];
    $pacient->curp             = $request['curp'];
    $pacient->nacionalidad     = $request['nacionalidad'];
    $pacient->calle            = $request['calle'];
    $pacient->num_ext          = $request['num_ext'];
    $pacient->num_int          = $request['num_int'];
    $pacient->colonia          = $request['colonia'];
    $pacient->cp               = $request['cp'];
    $pacient->localidad        = $request['localidad'];
    $pacient->municipio        = $request['municipio'];
    $pacient->estado           = $request['estado'];
    $pacient->telefono_casa    = $request['telefono_casa'];
    $pacient->telefono_celular = $request['telefono_celular'];
    $pacient->telefono_oficina = $request['telefono_oficina'];
    $pacient->correo           = $request['correo'];
    $pacient->save();
	  
	/*$Ahf = Ahf::where('id_paciente', $id)->firstOrFail();
    $Ahf->fill($request->all());
    $Ahf->save();*/
	$Ahf = Ahf::where('id_paciente', $id)->firstOrFail();
    $Ahf->diabetes	 	 = $request['diabetes'];
    $Ahf->hipertension 	 = $request['hipertension'];
    $Ahf->cardiopatia	 = $request['cardiopatia'];
    $Ahf->hepatopatia	 = $request['hepatopatia'];
    $Ahf->nefropatia	 = $request['nefropatia'];
    $Ahf->enmentales	 = $request['enmentales'];
    $Ahf->asma	     	 = $request['asma'];
    $Ahf->cancer	     = $request['cancer'];
    $Ahf->enalergicas	 = $request['enalergicas'];
    $Ahf->endocrinas	 = $request['endocrinas'];
    $Ahf->otros	     	 = $request['otros'];
    $Ahf->intneg	     = $request['intneg'];
	$Ahf->save();
	
	/*$App = App::where('id_paciente', $id)->firstOrFail();
    $App->fill($request->all());
    $App->save();*/
	
	$App = App::where('id_paciente', $id)->firstOrFail();
    $App->enactuales	     	= $request['enactuales'];
    $App->quirurjicos	     	= $request['quirurjicos'];
    $App->transfuncionales 		= $request['transfuncionales'];
    $App->alergias	       		= $request['alergias'];
    $App->traumaticos	     	= $request['traumaticos'];
    $App->hosprevias	     	= $request['hosprevias'];
    $App->adicciones	     	= $request['adicciones'];
    $App->otros            		= $request['adicciones'];
	$App->save();

	$servicios = "";
    if (isset($request['agua_pacient_check'])){
      $servicios .= "Agua potable. ";
    }
    if (isset($request['energia_pacient_check'])){
      $servicios .= "Energía eléctrica. ";
    }
    if (isset($request['telefono_pacient_check'])){
      $servicios .= "Teléfono fijo. ";
    }
    if (isset($request['internet_pacient_check'])){
      $servicios .= "Internet. ";
    }
    if (isset($request['tv_pacient_check'])){
      $servicios .= "TV por cable. ";
    }
	  
    /*$Apnp = Apnp::where('id_paciente', $id)->firstOrFail();
    $Apnp->fill($request->all());
    $Apnp->save();*/
    $Apnp = Apnp::where('id_paciente', $id)->firstOrFail();
    $Apnp->banio        = $request['banio'];
    $Apnp->dientes      = $request['dientes'];
    $Apnp->habitacion   = $request['habitacion'];
    $Apnp->servicios    = $servicios;
    $Apnp->tabaquismo   = $request['tabaquismo'];
    $Apnp->alcoholismo  = $request['alcoholismo'];
    $Apnp->alimentacion = $request['alimentacion'];
    $Apnp->deportes     = $request['deportes'];
	$Apnp->save();
	  
	/*$NurseSheet  	= NurseSheet::where('id_paciente', $id)->firstOrFail();
	$NSomatometry 	= NSomatometry::where('id_ns', $NurseSheet->id)->firstOrFail();
    $NSomatometry->fill($request->all());
    $NSomatometry->save();*/
	  
	$NurseSheet  	= NurseSheet::where('id_paciente', $id)->firstOrFail();
	$NSomatometry 	= NSomatometry::where('id_ns', $NurseSheet->id)->firstOrFail();
    $NSomatometry->peso 	     = $request['peso_pacient'];
    $NSomatometry->altura 		 = $request['altura_pacient'];
    $NSomatometry->psistolica  	 = $request['psistolica_pacient'];
    $NSomatometry->pdiastolica 	 = $request['pdiastolica_pacient'];
    $NSomatometry->frespiratoria = $request['frespiratoria_pacient'];
    $NSomatometry->pulso 	     = $request['pulso_pacient'];
    $NSomatometry->oximetria  	 = $request['oximetria_pacient'];
    $NSomatometry->glucometria 	 = $request['glucometria_pacient'];
	$NSomatometry->save();
	
	/*$Aeg = Aeg::where('id_paciente', $id)->firstOrFail();
    $Aeg->fill($request->all());
    $Aeg->save();*/
	$Aeg = Aeg::where('id_paciente', $id)->firstOrFail();
    $Aeg->ori_desori         = $request['ori_desori'];
    $Aeg->hidra_deshidra     = $request['hidra_deshidra'];
    $Aeg->coloracion   	     = $request['coloracion'];
    $Aeg->marcha_normal      = $request['marcha_normal'];
    $Aeg->altMarcha_otrasAlt = $request['altMarcha_otrasAlt'];
    $Aeg->otro_iter 	     = $request['otro_iter'];
	$Aeg->save();

    /*$Aapysis = Aapysis::where('id_paciente', $id)->firstOrFail();
    $Aapysis->fill($request->all());
    $Aapysis->save();*/
    $Aapysis = Aapysis::where('id_paciente', $id)->firstOrFail();
    $Aapysis->ap_digestivo       = $request['ap_digestivo'];
    $Aapysis->ap_cardivascular   = $request['ap_cardivascular'];
    $Aapysis->ap_respiratorio    = $request['ap_respiratorio'];
    $Aapysis->ap_urinario     	 = $request['ap_urinario'];
    $Aapysis->ap_genital   	   	 = $request['ap_genital'];
    $Aapysis->ap_hematologico  	 = $request['ap_hematologico'];
    $Aapysis->ap_endocrino       = $request['ap_endocrino'];
    $Aapysis->ap_osteomuscular   = $request['ap_osteomuscular'];
    $Aapysis->si_nervioso  	     = $request['si_nervioso'];
    $Aapysis->si_sensorial  	 = $request['si_sensorial'];
    $Aapysis->sicosomatico  	 = $request['sicosomatico'];
	$Aapysis->save();
		
    /*$Apact = Apact::where('id_paciente', $id)->firstOrFail();
    $Apact->fill($request->all());
    $Apact->save();*/
    $Apact = Apact::where('id_paciente', $id)->firstOrFail();
    $Apact->descripcion_pacient     = $request['descripcion_pacient'];
	$Apact->save();
	
	/*$Asg = Asg::where('id_paciente', $id)->firstOrFail();
    $Asg->fill($request->all());
    $Asg->save();*/
    $Asg = Asg::where('id_paciente', $id)->firstOrFail();
    $Asg->astenia_pacient    = $request['astenia_pacient'];
    $Asg->adinamia_pacient   = $request['adinamia_pacient'];
    $Asg->anorexia_pacient   = $request['anorexia_pacient'];
    $Asg->fiebre_pacient     = $request['fiebre_pacient'];
    $Asg->pPeso_pacient    	 = $request['pPeso_pacient'];
    $Asg->otrosSI_pacient    = $request['otrosSI_pacient'];
	$Asg->save();

    /*$Aer = Aer::where('id_paciente', $id)->firstOrFail();
    $Aer->fill($request->all());
    $Aer->save();*/
    $Aer = Aer::where('id_paciente', $id)->firstOrFail();
    $Aer->cuello_sujeto    = $request['cuello_sujeto'];
    $Aer->torax_sujeto     = $request['torax_sujeto'];
    $Aer->abdomen_sujeto   = $request['abdomen_sujeto'];
    $Aer->miembros_sujeto  = $request['miembros_sujeto'];
    $Aer->genitales_sujeto = $request['genitales_sujeto'];
    $Aer->cabeza_sujeto    = $request['cabeza_sujeto'];
	$Aer->save();


    if (empty($request['menarca']) && empty($request['rmenstrual']) && empty($request['dismenorrea']) && empty($request['ivsa']) && empty($request['parejas']) && empty($request['gestas']) && empty($request['abortos']) && empty($request['partos']) && empty($request['cesareas']) && empty($request['fpp']) && empty($request['menopausia']) && empty($request['climaterio']) && empty($request['mpp']) && empty($request['citologia']) && empty($request['mastografia'])) {
      # nothing to do here...
    }
    else {
     /*$Ago = Ago::where('id_paciente', $id)->firstOrFail();
     $Ago->fill($request->all());
     $Ago->save();*/
     $Ago = Ago::where('id_paciente', $id)->firstOrFail();
     $Ago->menarca     = $request['menarca'];
     $Ago->rmenstrual  = $request['rmenstrual'];
     $Ago->dismenorrea = $request['dismenorrea'];
     $Ago->ivsa        = $request['ivsa'];
     $Ago->parejas     = $request['parejas'];
     $Ago->gestas      = $request['gestas'];
     $Ago->abortos     = $request['abortos'];
     $Ago->partos      = $request['partos'];
     $Ago->cesareas    = $request['cesareas'];
     $Ago->fpp         = $request['fpp'];
     $Ago->menopausia  = $request['menopausia'];
     $Ago->climaterio  = $request['climaterio'];
     $Ago->mpp         = $request['mpp'];
     $Ago->citologia   = $request['citologia'];
     $Ago->mastografia = $request['mastografia'];
     $Ago->save();
		
	}

	  
    Session::flash('message','Paciente Actualizado Correctamente');
    return Redirect::to('pacient/');
  }
	

  //Muestra todos los pacientes de la base de datos para elegir al que se quiere eliminar
  public function deleter(Request $request)
  {
   $pacientes = Pacient::name($request->get('name'))->orderBy('created_at','DESC')->paginate(15);
   return view('pacients.delete',compact('pacientes')); 
 }
  /**
  * Remueve el elemento de la base de datos, recibe como parámetro
  *el id del usuario que se va a eliminar
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
   $pacient = Pacient::find($id);
   $pacient->delete();
   //se manda mensaje mensaje de confirmación
   Session::flash('message','Paciente eliminado de la base de datos correctamente');
   //Se redirecciona a la vista que muestra los registros
   return Redirect::to('/pacient/index');

  }
  public function registros_paciente(Request $request)
  {
     $nursesheets = NurseSheet::name($request->get('name'))->orderBy('id','DESC')->paginate(6);
     //se returna la vista con todos los registros
     return view('pacients.index',["pacientes"=>$pacientes]);
  }
  public function adddate($id)
  {
    $paciente = Pacient::find($id);
    $pacients = DB::table('pacients')
				->WhereNull('deleted_at')
                ->orderBy('created_at', 'asc')
                ->get();
    $doctors = DB::table('doctors')
                ->orderBy('apaterno', 'asc')
                ->get();
    return view('dates/create',compact('pacients','doctors','paciente'));
  }
  public function addsoap($id)
  {
    $cita        = Date::find($id);
    $id_cita     = $cita->id;
    $id_paciente = $cita->id_paciente;
    $paciente    = Pacient::find($id_paciente);

    $pacients = DB::table('pacients')
                ->orderBy('apaterno', 'asc')
                ->get();
    $doctors = DB::table('doctors')
                ->orderBy('apaterno', 'asc')
                ->get();
    $matches_array = array();
    $fila_matches = DB::select("select * FROM studymatches");

    foreach ($fila_matches as $fila) {
      $id_estudio      = $fila->id_estudio;
      $id_enfermedad   = $fila->id_enfermedad;
      $fila_estudio    = DB::select("select * FROM studies where id='$id_estudio'");
      $fila_enfermedad = DB::select("select * FROM diagnosticos where id='$id_enfermedad'");

      foreach ($fila_estudio as $estudios) {
        $estudio = $estudios->nombre;
      }
      foreach ($fila_enfermedad as $enfermedades) {
        $enfermedad = $enfermedades->nombre;
      }

      $matches_array[] = array(
      'id_estudio'    => $id_estudio,
      'estudio'       => $estudio,
      'id_enfermedad' => $id_enfermedad,
      'enfermedad'    => $enfermedad);
    }

    $collection4 =  Collection::make($matches_array);
    $collection4 -> toJson();
    $file4       = 'json/matches.json';
    file_put_contents($file4, $collection4);

    return view('soaps/create',compact('cita','pacients','doctors','paciente','id_cita'));
  }
  public function show_details(Request $request,$id){
    if ($request->ajax()) {
      $paciente          = Pacient::find($id);
      $id_paciente       = $paciente->id;
      $antecedentes_go   = " ";
      $fila_go           = DB::select("select * FROM antecedentesgo where id_paciente='$id_paciente'");
      foreach ($fila_go as $go) {
      $antecedentes_go   = $go;
      }
      $antecedentes_hf   = " ";
      $fila_hf           = DB::select("select * FROM antecedenteshf where id_paciente='$id_paciente'");
      foreach ($fila_hf as $hf) {
      $antecedentes_hf   = $hf;
      }
      $antecedentes_pnp  = " ";
      $fila_pnp          = DB::select("select * FROM antecedentespnp where id_paciente='$id_paciente'");
      foreach ($fila_pnp as $pnp) {
      $antecedentes_pnp  = $pnp;
      }
      $antecedentes_pp   = " ";
      $fila_pp           = DB::select("select * FROM antecedentespp where id_paciente='$id_paciente'");
      foreach ($fila_pp as $pp) {
      $antecedentes_pp   = $pp;
      }
      $info = array(
        'paciente'        => $paciente,
        'antecedentesgo'  => $antecedentes_go,
        'antecedenteshf'  => $antecedentes_hf,
        'antecedentespnp' => $antecedentes_pnp,
        'antecedentespp'  => $antecedentes_pp,
      );
      return response()->json($info);
    }
  }
  public function updatePaciente(Request $request,$id)
  {
    $paciente = Pacient::find($id);
    $paciente->fill($request->all());
    $paciente->save();
    return response()->json("paciente actualizado correctamente");
  }
}
