<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use SIAM\Http\Requests\DateCreateRequest;
use SIAM\Http\Requests;
use SIAM\Http\Controllers\Controller;
use SIAM\Pacient;
use SIAM\Date;
use SIAM\Doctor;
use Carbon\Carbon;
use Session;
use Redirect;
use DB;

class DateController extends Controller
{
  /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
    $dates = Date::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
		/*$pacients = Pacient::where('nombre',1)
						 ->orderBy('apaterno', 'ASC')->paginate(5);*/
		$pacients = DB::table('pacients')
								->WhereNull('deleted_at')
			 					->orderBy('created_at', 'asc')
			 					->paginate(6);
 		//se returna la vista con todos los registros
 		return view('dates/index',compact('dates','pacients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pacients = DB::table('pacients')
				->WhereNull('deleted_at')
                ->orderBy('created_at', 'asc')
                ->get();
		$doctors = DB::table('doctors')
                ->orderBy('apaterno', 'asc')
                ->get();;
		$medicaments = Medicament::all();
		return view('Citas/date_create',compact('pacients','doctors','medicaments'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DateCreateRequest $request)
	{
		//el método create() crea un nuevo registro, se deben asociar los datos del request
		//con las columnas de la tabla
		Date::create([
			'id_paciente' => $request['id_paciente'],
			'fecha' => $request['fecha'],
			'hora' => $request['hora'],
			'area' => 'Médica',
			'id_doctor' => $request['id_doctor']
		]);

		return redirect('date/')->with('message','Se ha agregado una nueva cita');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function show(Request $request)
	 	{
	 		$dates = Date::fecha($request->get('fecha1'))->orderBy('id','DESC')->paginate(6);
			/*$pacients = Pacient::where('nombre',1)
							 ->orderBy('apaterno', 'ASC')->paginate(5);*/
			$pacients = DB::table('pacients')
									->WhereNull('deleted_at')
				 					->orderBy('created_at', 'asc')
				 					->get();
	 		//se returna la vista con todos los registros
	 		return view('dates/show',compact('dates','pacients'));
	 	}
		public function show_date_pacient(Request $request)
 	 	{
 	 		$dates = Date::name($request->get('id_paciente'))->orderBy('id','DESC')->paginate(6);
			$pacients = DB::table('pacients')
									->WhereNull('deleted_at')
									->orderBy('created_at', 'asc')
									->get();
 	 		return view('dates/show',compact('dates','pacients'));
 	 	}
	 	/**
	 	 * Show the form for editing the specified resource.
	 	 *
	 	 * @param  int  $id_usuario
	 	 * @return Response
	 	 */
	 	 //muestra a todos los pacientes para elegir uno y actualizarlo
	 	 public function actualizar()
	  	{
	 			$dates = Date::paginate(7);
				$pacients = Pacient::all();
				$medicaments = Medicament::all();
	  		return view('Citas.date_update',compact('dates','medicaments','pacients'));
	  	}
	 	//ya que se ha eligido uno, se aparta para editarlo
   	public function edit($id)
	 	{
	 		//se encuentra el registro con el id que se busca, y se almacena en una variable
	 		$pacients = Pacient::all();
	 		$date = Date::find($id);
			$doctors = Doctor::all();
	 		//se returna la vista del formulario que contendrá los datos del elemento
	 		//a editar
	 		return view('dates.edit',['date'=>$date,'pacients'=>$pacients,'doctors'=>$doctors]);
	 	}
	 	/**
	 	 * Actualiza el registro en la base de datos
	 	 * Recibe como parámetro un Request, que es el formulario que contiene
	 	 * los datos que se van a actualizar y el id del registro a modificar
	 	 * @param  int  $id
	 	 * @return Response
	 	 */
	 	public function update(DateCreateRequest $request,$id)
	 	{
      //se encuentra el registro con el id que se busca, y se almacena en una variable
      $date = Date::find($id);
      //se llama a la función que llena el registro con los datos almacenados en
      //el request
      $date->fill($request->all());
      //Se guardan los cambios hechos
      $date->save();
      //se manda mensaje mensaje de confirmación
      Session::flash('message','Cita Actualizada Correctamente');
      //Se redirecciona a la vista que muestra los registros
      return Redirect::to('date/show');

	 	}
	 	 //Muestra todos las citas de la base de datos para elegir al que se quiere eliminar
/*
		 public function deleter()
	 	 {
	 		 $dates = Date::paginate(7);
			 $medicaments = Medicament::all();
			 $pacients = DB::table('pacients')
 									->orderBy('apaterno', 'asc')
 									->get();
	 		 return view('Citas.date_delete',compact('dates','medicaments','pacients'));
	 	 }
	 	 /**
	 		* Remueve el elemento de la base de datos, recibe como parámetro
	 		*el id del usuario que se va a eliminar
	 		* @param  int  $id
	 		* @return Response
	 		*/

	 	 public function destroy($id)
	 	 {
	 		 //se invoca a la función del modelo que elimina el paciente que tenga ese id
	 		 //Date::destroy($id);
			 $date = Date::find($id);
			 $date->delete();
	 		 //se manda mensaje mensaje de confirmación
	 		 Session::flash('message','Cita eliminada de la base de datos correctamente');
	 		 //Se redirecciona a la vista que muestra los registros
	 		 return Redirect::to('/date/show');
	 	 }
/*
		 //Muestra el hostial de pesos de los pacientes
		 public function historial_pesos(){
			//El método all() retorna todos los registros
			$dates = Date_action::All();
			foreach ($dates as $date) {
				$id_cita = $date->id_cita;
				$cita = Date::find($id_cita);
				$id_cliente = $cita->id_paciente;
				$paciente = Pacient::find($id_cliente);
				$nombre_paciente = $paciente->nombre.' '.$paciente->apaterno.' '.$paciente->amaterno;
				$pesos_array[] = array('id_paciente'=> $id_cliente, 'nombre'=> $nombre_paciente,
        'peso'=> $date->peso_actual);
			}
			//Se crea el archivo json, si existe, se sobreescribe
			$collection_2 = Collection::make($pesos_array);
			$collection_2->toJson();
			$file = 'json/pesos.json';
			file_put_contents($file, $collection_2);
		}
	 //Muestra el hostial de pesos de los pacientes
	 public function show_pacient(){
		//El método all() retorna todos los registros
		$dates = Date::All();
		foreach ($dates as $date) {
			$id_cita = $date->id_cita;
			$fecha_cita = $date->fecha;
			$id_cliente = $date->id_paciente;
			$paciente = Pacient::find($id_cliente);
			$nombre_paciente = $paciente->nombre.' '.$paciente->apaterno.' '.$paciente->amaterno;
			$doctor = $date->id_doctor;
			$fila_doc = Doctor::find($doctor);
			$doc = $fila_doc['nombre'].' '.$fila_doc['apaterno'].' '.$fila_doc['amaterno'];
			$pesos_array[] = array('id'=> $id_cita, 'paciente'=>$nombre_paciente,
			'fecha'=> $fecha_cita,'hora'=>$date->hora,'division'=>$date->division,
			'tipo_cita'=>$date->tipo_cita,'doctor'=>$doc);
		}
		//Se crea el archivo json, si existe, se sobreescribe
		$collection_2 = Collection::make($pesos_array);
		$collection_2->toJson();
		$file = 'json/citas.json';
		file_put_contents($file, $collection_2);
		return view('Citas/date_pacient');
	}*/
}
