<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsuariosCreate extends Component
{
    public $roles = [];
    public $rol_seleccionado_id;
    public $name, $email;

    public function mount(){
        $this->roles = Role::all();
        $this->rol_seleccionado_id = Role::first()->id;
    }

    public function submit()
    {
        $validated_data = $this->validate([
            'name' => 'required|unique:Users',
            'email' => 'required|email|unique:Users',
        ]);

        if(!isset($this->rol_seleccionado_id)) {
            $this->addError('key', 'El Rol del usuario es requerido');
        }

        $user = new User();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = Hash::make($validated_data['email']);
        $user->email_verified_at = now(); # en produccion no iria esto

        $role = Role::find($this->rol_seleccionado_id);

        if(isset($role)) {
            $user->assignRole($role);
        } else {
            $this->addError('key', 'No se encontró el rol: ' . $this->rol_seleccionado_id);
            return;
        }

        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function store(){
        return redirect()->route('usuarios.index');
    }

    public function render()
    {
        return view('livewire.usuarios-create');
    }
}
