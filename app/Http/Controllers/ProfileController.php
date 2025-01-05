<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil user.
     */
    public function edit(Request $request): View
    {
        // MVC: Mengirim data user ke view 'profile.edit'
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui informasi profil user.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Chain of Responsibility: Validasi melalui ProfileUpdateRequest
        $request->user()->fill($request->validated());

        // Cek apakah email diubah, jika ya maka reset verifikasi email
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Menyimpan perubahan profil user
        $request->user()->save();

        // Mengarahkan kembali ke halaman edit profil
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Menghapus akun user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Chain of Responsibility: Validasi password sebelum penghapusan
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Logout user dan hapus akun
        $user = $request->user();
        Auth::logout();
        $user->delete();

        // Invalidate sesi dan redirect ke homepage
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
