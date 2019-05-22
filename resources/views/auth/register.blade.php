@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8" style="margin: auto; float:none">
            <div class="card" style="padding: 5px 20px;">
                <h5>{{ __('Register') }}</h5>
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="name" type="text" class="validate form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    <label for="name">{{ __('Name') }}</label>
                                    @if ($errors->has('email'))
                                        <span class="helper-text" data-error="{{ $errors->first('name') }}" data-success="right"></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field">
                                    <input placeholder="Placeholder" id="email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    @if ($errors->has('email'))
                                        <span class="helper-text" data-error="{{ $errors->first ('email') }}" data-success="right"></span>
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
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="password-confirm" type="password" name="password_confirmation" required>
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="profile_id" type="number" name="profile_id" required>
                                    <label for="profile_id">{{ __('Profile') }}</label>
                                </div>
                            </div>
                            <div class="right-align col m12" style="margin-top: 30px">
                                <button type="submit" class="btn btn-large waves-effect waves-light">
                                    {{ __('Register') }}
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
