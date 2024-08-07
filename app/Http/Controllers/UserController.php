<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ChangePasswordRequest;
use App\Notifications\PushNotification;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            $user = User::create($request->all());
            $user->update(['password' => Hash::make($request->password)]);
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index')->with('success', 'Nuevo usuario creado con éxito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el usuario');
        }
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        if (is_array($user->sales) || is_object($user->sales)) {
            foreach ($user->sales as $key =>  $sale) {

                $total_purchases += $sale->total;
            }
        }
        $total_amount_sold = 0;
        if (is_array($user->purchases) || is_object($user->purchases)) {
            foreach ($user->purchases as $key =>  $purchase) {
                $total_amount_sold += $purchase->total;
            }
        }


        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        try {
            if ($user->id == 1) {
                return redirect()->route('users.index');
            } else {
                $user->update($request->all());
                $user->roles()->sync($request->get('roles'));
                return redirect()->route('users.index')->with('success', 'Usuario modificado');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el usuario');
        }
    }
    public function destroy(User $user)
    {
        try {
            if ($user->id == 1) {
                return back()->with('error', 'No se puede eliminar este usuario');
            } else {
                $user->delete();
                return back()->with('success', 'Usuario eliminado');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Ocurrió un error al eliminar el usuario');
        }
    }

    public function sendPushNotification()
    {
        $user = User::find(1); // Reemplaza esto con el usuario al que deseas enviar la notificación
        $notification = new PushNotification();
        $user->notify($notification);
        return back()->with('success', 'Notificacion enviada');
    }

    public function update_client(Request $request, User $user){
        $user->update_client($request);
        return back();
    }
    public function update_password(ChangePasswordRequest $request, User $user){
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back();
    }
}
