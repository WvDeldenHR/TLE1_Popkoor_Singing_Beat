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

    <body class="bg-gradient-primary">
        <main>
            <section>
                <div class="login-content | d-flex h-100">
                    <div class="login-box content-box | py-3 px-5">
                        <div class="d-flex justify-content-center pt-4 pb-5">
                            <a class="" href="{{ route('home')}}"><img src="/img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat"></a>
                        </div>
                        <div>
                            <form class="d-grid" method="POST" action="{{ route('login') }}">
                                @csrf
                                <label class="pb-2 fs-500 fw-semi-bold" for="email">E-mailadres</label>
                                    <input class="login-input @error('email') is-invalid @enderror | mb-2 fs-400" id="email" type="email" 
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback | pb-2 fs-400" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label class="pb-2 fs-500 fw-semi-bold" for="password">Wachtwoord</label>
                                    <input class="login-input @error('password') is-invalid @enderror | mb-2 fs-400" id="password" type="password" 
                                            name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback | pb-2 fs-400" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                <div class="d-flex justify-content-end form-check mb-2">
                                    <input class="login-input-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="login-input-check | py-2 ps-1 fs-400" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                <div class="d-flex flex-column align-items-center pb-3">
                                    <button class="login-button button-primary | mb-2 w-100" type="submit">Aanmelden</button>
                                    @if (Route::has('password.request'))
                                        <a class="login-txt | fs-500 mt-1" href="{{ route('password.request') }}">Wachtwoord Vergeten?</a>
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