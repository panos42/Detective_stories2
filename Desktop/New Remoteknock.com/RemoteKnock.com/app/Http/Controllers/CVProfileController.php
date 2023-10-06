<?php

// app/Http/Controllers/CVProfileController.php

namespace App\Http\Controllers;

use App\Models\CVProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CVProfileController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $CVProfile = $user->cvProfile; // Assuming you have a relationship set up
    
        return view('cv.cv_sidemenu', compact('CVProfile'));
    }
    


    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'Job_Experience' => 'required|string',
            'Education' => 'required|string',
            'Skills' => 'required|string',
            'Languages' => 'required|string',
            'Objective' => 'required|string',
            // Add validation rules for other fields
        ]);

        $cvProfile = CVProfile::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'Job_Experience' => $data['Job_Experience'],
            'Education' => $data['Education'],
            'Skills' => $data['Skills'],
            'Languages' => $data['Languages'],
            'Objective' => $data['Objective'],
            // Set other fields here
        ]);

        return redirect()->route('cv.show', $cvProfile->id);
    }

    public function show(CVProfile $cvProfile)
    {
        return view('cv.show', compact('cvProfile'));
    }

    // Implement edit, update, and delete methods as needed
}
