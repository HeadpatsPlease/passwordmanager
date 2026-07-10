<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\savedAccount;

class passwordmanagerController extends Controller
{
    public function addAccount(Request $request){
        $incomingFields = $request->validate([
            'siteName' => ['required','min:5','max:255'],
            'savedEmail' => ['required','min:5','max:255'],
            'savedPassword' => ['required','min:8','max:255'],
        ]);

        savedAccount::create([
            'siteName' => $incomingFields['siteName'],
            'email' => $incomingFields['savedEmail'],
            'password' => $incomingFields['savedPassword'],
            'user_id' => Auth::id(),
        ]);

        return redirect('dashboard');
    }
    public function updateAccount(Request $request){
        $updatingFields = $request->validate([
            'siteName' => ['required','min:5','max:255'],
            'email' => ['required','min:5','max:255'],
            'password' => ['required','min:8','max:255'],
            'save_id' => ['required']
        ]);

        savedAccount::updateOrInsert([
                                        'id' => $updatingFields['save_id'
                                    ]],
                                    [
                                        'email' => $updatingFields['email'],
                                        'password' => $updatingFields['password'],
                                        'siteName' => $updatingFields['siteName']
                                    ]);

        return redirect('dashboard');
    }

    public function getAccounts(Request $request)
{
    $search = $request->input('search');
    $id = Auth::id();

    $query = savedAccount::where('user_id', $id);

    if ($search) {
        $query->where('siteName', 'like', "%{$search}%");
    }

    $accounts = $query->get();
    $totalAccounts = $accounts->count();

    return view('dashboard', [
        'totalAccounts' => $totalAccounts,
        'accounts' => $accounts,
    ]);
}

    public function deleteAccounts(Request $request){
        $deleteFields = $request->validate([
            'delete' => ['required'],
        ]);
        savedAccount::where('id','=',$deleteFields['delete'])->delete();
        return redirect('dashboard');
    }
}
