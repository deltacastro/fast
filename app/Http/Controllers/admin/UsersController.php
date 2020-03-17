<?php

namespace App\Http\Controllers\admin;

use App\Cargo;
use App\Departamento;
use App\Empleado;
use App\Empleado_Departamento;
use App\Estado_Civil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\People;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->mUser = new User;
        $this->mPeople = new People;
        $this->mEmpleado = new Empleado;
        $this->mCargo =  new Cargo;
        $this->mDepartamento =  new Departamento;
        $this->mEstadoCivil =  new Estado_Civil;
        $this->mEmpleadoDepartamento = new Empleado_Departamento;
    }

    public function index(Request $request)
    {
        $users = $this->mUser;
        $qr = $request->input('query', null);
        $users = $users->buscar($qr)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create(Request $request)
    {
        $cargos = $this->mCargo->select('id', 'nombre', 'descripcion')->get();
        $departamentos = $this->mDepartamento->select('id', 'nombre', 'descripcion')->get();
        $estadosCiviles = $this->mEstadoCivil->select('id', 'nombre')->get();
        if ($request->ajax()) {
            return view('admin.user._form', compact('cargos', 'departamentos', 'estadosCiviles'));
        }
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
        $peopleCreated = $this->mPeople->guardar($request->people);
        $request->merge(['people_id' => $peopleCreated->id]);
        $empleadoData = array_merge($request->empleado, ['people_id' => $peopleCreated->id]);
        $request->merge(['empleado' => $empleadoData]);
        $empleadoCreated = $this->mEmpleado->guardar($request->empleado);
        foreach ($request->empleado_cargo as $row) {
            $this->mEmpleadoDepartamento->firstOrCreate([
                'empleado_id' => $empleadoCreated->id,
                'cargo_id' => $row->cargo_id,
                'departamento_id' => $row->departamento_id,
            ]);
        }
        $this->mUser->guardar($request->all());
        if ($request->ajax()) {
            return response()->json([
                    'status' => 200,
                    'msg' => 'Se guardaron los datos correctamente.'
                ]);
        }
        return 200;
    }

    public function edit(User $user, Request $request)
    {
        if ($request->ajax()) {
            return view('admin.user._form', compact('user'));
        }
        return view('admin.user.create', compact('user'));
    }

    public function update(User $user,UpdateRequest $request)
    {
        $this->mUser->actualizar($request->all(), $user);
        if ($request->ajax()) {
            return response()->json([
                    'status' => 200,
                    'msg' => 'Se actualiaron los datos correctamente.'
                ]);
        }
        return 200;
    }

    public function list(Request $request)
    {
        $users = $this->mUser->withTrashed();
        $qr = $request->input('query', null);
        $users = $users->buscar($qr)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.user._list', compact('users'));
    }

    public function destroy(User $user, Request $request)
    {
        // dd('llega');
        $user->delete();
        if ($request->ajax()) {
            return response()->json([
                    'status' => 200,
                    'msg' => 'Usuario desactivado.'
                ]);
        }
    }

    public function restore($user, Request $request)
    {

    }

}
