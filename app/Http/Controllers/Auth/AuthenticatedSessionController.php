<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = $request->user();

        if ($user->role === 'admin' && $user->pending) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'tungu di konfirmasi sama superadmin');
        }

        $request->session()->regenerate();

        if($user->role === 'admin') {
            return redirect('admin/petugasmanager');
        }
        else if($user->role === 'superadmin') {
            return redirect('superadmin/pending');
        }
        
        return redirect('petugas/listbarang');
    }

  
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
