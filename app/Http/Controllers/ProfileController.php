<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile picture
     */
    public function updateProfilePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Adjust max size as needed
        ]);

        $user = $request->user();

        // Handle the uploaded file
        if ($request->hasFile('profile_picture')) {
            // Store the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            // Optionally delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Update the user's profile picture path
            $user->profile_picture = $path;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-picture-updated');
    }

    /**
 * Update the user's address information.
 */
public function updateAddress(Request $request): RedirectResponse
{
    $request->validate([
        'province' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'barangay' => 'required|string|max:255',
    ]);

    $user = $request->user();
    
    // Update address fields
    $user->province = $request->input('province');
    $user->city = $request->input('city');
    $user->barangay = $request->input('barangay');

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'address-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}