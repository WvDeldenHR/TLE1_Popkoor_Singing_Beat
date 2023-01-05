<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name = “theme-color” content = “#5f3f6d”>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Popkoor Singing Beat</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body class="lr-bg">
        <main>
            <section>
                <div class="lg-box | d-flex align-items-center justify-content-center">
                    <div class="content-box lg-content | d-flex flex-column px-5 py-3">
                        <div class="d-flex justify-content-center pb-5 pt-4">
                            <a class="" href="{{ route('home')}}">
                                <img src="/img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat">
                            </a>
                        </div>
                        <div>
                            <form class="d-flex flex-column" method="POST" action="{{ route('login') }}">
                            @csrf
                                <label class="pb-2 fs-500 fw-semi-bold" for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="lr-input mb-2 form-control @error('email') is-invalid @enderror" name="email" 
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label class="pb-2 fs-500 fw-semi-bold" for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="lr-input mb-2 form-control @error('password') is-invalid @enderror" name="password" 
                                            required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <div class="d-flex justify-content-end form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="ps-1 form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                        <div class="d-flex flex-column align-items-center pb-3">
                            <button type="submit" class="lr-btn button-primary | mb-2 w-100">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="lr-forget" href="{{ route('password.request') }}">
                                   Wachtwoord Vergeten?
                                </a>
                            @endif
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>