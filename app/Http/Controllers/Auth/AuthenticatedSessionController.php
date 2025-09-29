<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar login.
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()) {
            $user = Auth::user();

            if ($user->role === 'ti') {
                return redirect()->route('panelti.index');
            } elseif ($user->role === 'rh') {
                return redirect()->route('panelrh.index');
            }
        }

        return view('auth.login');
    }

    /**
     * Manejar login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'ti') {
            return redirect()->route('panelti.index');
        } elseif ($user->role === 'rh') {
            return redirect()->route('panelrh.index');
        } elseif ($user->role === 'empleado') {
            return redirect()->route('panelempleados.index');
        }

        return redirect()->route('login');
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
