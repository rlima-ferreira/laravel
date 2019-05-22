@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8" style="margin: auto; float:none">
            <div class="card" style="padding: 5px 20px;">
                <h5>{{ __('Login') }}</h5>
                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    <input placeholder="Placeholder" id="email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    @if ($errors->has('email'))
                                        <span class="helper-text" data-error="{{ $errors->first('email') }}" data-success="right"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="password" type="password" class="validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                                    <label for="password">{{ __('Password') }}</label>
                                    @if ($errors->has('password'))
                                        <span class="helper-text" data-error="{{ $errors->first('password') }}" data-success="right"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col m8 offset-m4" style="margin-top: 20px">
                                <div class="form-check">
                                    <p>
                                        <label>
                                            <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                                            <span>{{ __('Remember Me') }}</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="right-align col m12" style="margin-top: 30px">
                                @if (Route::has('password.request'))
                                    <a class="waves-effect waves-teal btn-flat" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn waves-effect waves-light">
                                    {{ __('Login') }}
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
