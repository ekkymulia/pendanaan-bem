<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Ormawa;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

             // Get the authenticated user
            $user = Auth::user();

            $role = Role::findOrFail($user->role_id);

            $request->session()->forget(['user_id', 'user_name']); 
            $request->session()->regenerate();

            $ormawaId = null;
            $departemenId = null;
        
            if ($role->id == 2) {
                $ormawa = Ormawa::where('user_id', $user->id)->first();
                if ($ormawa) {
                    $ormawaId = $ormawa->id;
                }
            } 
            if ($role->id == 3) {
                $departemen = Departemen::where('user_id', $user->id)->first();
                if ($departemen) {
                    $departemenId = $departemen->id;
                    $ormawaId = $departemen->ormawa_id;
                }
            }
        
            $request->session()->put('u_data', (object) [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role_id,
                'role_name' => $role->name,
                'ormawa_id' => $ormawaId,
                'departemen_id' => $departemenId,
            ]);
        
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('login'); // Redirect to the login page
    }
}
