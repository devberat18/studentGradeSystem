@extends('admin.layouts.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Giriş Yap
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Mail Adresi</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="example@example.com"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Şifre</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="*********"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="container d-flex align-items-center justify-content-center">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-header text-center">Giriş Yap</div>--}}
    {{--            <div class="card-body">--}}
    {{--                <form method="POST" action="{{ route('login') }}">--}}

    {{--                    <div class="form-outline mb-4">--}}
    {{--                        <label class="form-label" for="email">Mail Adresi</label>--}}
    {{--                        <input type="email" id="email" name="email" placeholder="Mail Adresi" class="form-control  @error('email') is-invalid @enderror"/>--}}
    {{--                        @error('email')--}}
    {{--                        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}

    {{--                    <div class="form-outline mb-4">--}}
    {{--                        <label class="form-label" for="password">Şifre</label>--}}
    {{--                        <input type="password" id="password" name="password" placeholder="******"--}}
    {{--                               class="form-control @error('password') is-invalid @enderror"/>--}}
    {{--                        @error('password')--}}
    {{--                        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}

    {{--                    <button type="submit" class="btn btn-primary btn-block mb-4">Giriş Yap</button>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
