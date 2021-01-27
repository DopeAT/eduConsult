<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function me()
    {
        $user = Auth::user();

        return view('profile', [
            'user' => $user->load('address')
        ]);
    }

    public function update(Request $request, User $user)
    {
        $address1 = '';
        $address2 = '';

        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required'
        ]);

        if ($request->address) {
            $addressExploded = explode(',', $request->address);

            $address2 = array_pop($addressExploded);
            $address1 = implode(',', $addressExploded);
        }

        $user->update([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'phone'     => $request->phone,
        ]);

        Address::where('user_id', $user->id)->update([
            'address1' => $address1,
            'address2' => $address2,
            'city'     => $request->city,
            'county'   => $request->county,
            'postcode' => $request->postcode,
        ]);

        session()->flash('success', 'Profile Updated Successfully');
        return redirect('/profile');
    }

}
