<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Mail\Welcome;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->sendNewUserNotification($user);

        Mail::to($user->email)->send(new Welcome($user));

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    protected function sendNewUserNotification(User $user)
    {
        Log::info('Отправка уведомления в Telegram для пользователя: ' . $user->name);

        try {
            $telegram = new Api(env('TELEGRAM_BOT_API_KEY'));

            $response = $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID'),
                'parse_mode' => 'html',
                'text' => "Новый пользователь зарегистрирован: \n<b>Имя:</b> {$user->name} \n<b>Email:</b> {$user->email}",
            ]);

            Log::info('Уведомление отправлено успешно: ' . json_encode($response));
        } catch (\Exception $e) {
            Log::error('Ошибка при отправке уведомления в Telegram: ' . $e->getMessage());
        }
    }
}
