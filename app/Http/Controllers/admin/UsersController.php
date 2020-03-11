<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->mUser = new User;
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
        if ($request->ajax()) {
            return view('admin.user._form');
        }
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
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
