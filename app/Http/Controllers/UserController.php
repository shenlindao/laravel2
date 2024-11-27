<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function get($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('user', ['user' => $user]);
        }

        return response()->json(['message' => 'Пользователь не найден'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email', 'regex:/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,6}$/'],
        ]);

        $user = User::create($validated);

        return redirect()->route('user.get', ['id' => $user->id]);
    }
}
