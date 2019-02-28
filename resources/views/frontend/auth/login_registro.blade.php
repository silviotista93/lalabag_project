@extends('frontend.layout')
@section('content')
    <div class="main-content-wrapper">
        <div class="page-content-inner pt--75 pb--80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-sm--50">
                        <div class="login-box">
                            <h3 class="heading__tertiary mb--30">Iniciar sesión</h3>
                            <form method="POST" class="form form--login" action="{{ route('login') }}">
                                @csrf
                                <div class="form__group mb--20 {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <label class="form__label form__label--2" for="username_email">Direccion de correo electrónico <span class="required">*</span></label>
                                    <input type="email" class="form__input form__input--2" id="username_email" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form__group mb--20 {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <label class="form__label form__label--2" for="login_password">Contraseña <span class="required">*</span></label>
                                    <input type="password" class="form__input form__input--2" id="login_password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="d-flex align-items-center mb--20">
                                    <div class="form__group mr--30">
                                        <input type="submit" value="Iniciar sesión" class="btn-submit">
                                    </div>
                                    <div class="form__group">
                                        <label class="form__label checkbox-label" for="store_session">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="">
                                            <span>Recordame</span>
                                        </label>
                                    </div>
                                </div>
                                <a class="forgot-pass" href="#">Olvidaste tu contraseña?</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="register-box">
                            <h4 class="heading__tertiary mb--30">Registraste</h4>
                            <form method="POST" action="{{ route('register') }}" class="form form--login">
                                @csrf
                                <div class="form__group mb--20">
                                    <label class="form__label form__label--2" >Nombre <span class="required">*</span></label>
                                    <input type="text" class="form__input form__input--2 {{ $errors->has('name') ? ' is-invalid' : '' }}" id="" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form__group mb--20">
                                    <label class="form__label form__label--2" for="email">Email <span class="required">*</span></label>
                                    <input type="email" class="form__input form__input--2 {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form__group mb--20">
                                    <label class="form__label form__label--2" for="register_password">Contraseña <span class="required">*</span></label>
                                    <input type="password" class="form__input form__input--2 {{ $errors->has('password') ? ' is-invalid' : '' }}" id="register_password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form__group mb--20">
                                    <label class="form__label form__label--2" for="register_password">Confirmar Contraseña <span class="required">*</span></label>
                                    <input type="password" class="form__input form__input--2" id="register_password" name="password_confirmation">
                                </div>
                                <p class="privacy-text mb--20">Sus datos personales se utilizarán para respaldar su experiencia en este sitio web, para administrar el acceso a su cuenta y para otros fines descritos en nuestra política de privacidad.</p>
                                <div class="form__group">
                                    <input type="submit" value="Registrar" class="btn btn-submit btn-style-1">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop