<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use UnexpectedValueException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'senha' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate($tipoLogin)
    {
        $this->ensureIsNotRateLimited();

        $usuario = User::where('email', $this->get('email'))->first();
        
        if (is_null($usuario)) {
            throw new UnexpectedValueException('E-mail não encontrado.', 400);
        }

        if($usuario->tipo === 0 && $tipoLogin === 'painel') {
            return redirect()->route('login_painel')->with('erro', 'Usuário inválido');
        } elseif (($usuario->tipo === 1 || $usuario->tipo === 2) && $tipoLogin === 'site') {
            return redirect()->route('login')->with('erro', 'Usuário inválido');
        }

        if (!Hash::check($this->get('senha'), $usuario->senha)) {
            RateLimiter::hit($this->throttleKey());

            throw new UnexpectedValueException('Senha incorreta.', 400);
        }

        Auth::login($usuario);

        RateLimiter::clear($this->throttleKey());

        return $usuario->tipo;
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
