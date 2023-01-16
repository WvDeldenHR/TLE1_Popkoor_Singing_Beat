@extends('layouts.layout')

@section('content')
    <section class="py-7">
        <div class="hm-content-1 even-column-r-auto container | d-grid align-items-center w-100">
            <div class="m-auto">
                <img alt="Leden van het koor in de duinen op een trap" class="hm-img" src="img/popkoor_singing_beat_001.jpg">
             </div>
            <div class="hm-header-content">
                <h1 class="hm-header">Zingen maakt blij</h1>
                <p class="hm-lg-txt">
                    zingen is vrijheid, zingen is gezellig,
                    <br></br>
                    zingen is samenwerking, zingen is los van alles,
                    <br></br>
                    zingen is gewoon leuk, dat vinden wij nou ook!
                </p>
                <div class="d-flex justify-content-end">
                    <a href="https://www.facebook.com/popkoorsingingbeat" target="_blank" aria-label="facebook">
                        <img class="hm-icon | px-1" aria-hidden="true" src="img/icon/icon_socials_facebook_001_5F3F6D_32x32.svg" alt="Facebook"></a>
                    <a href="https://www.instagram.com/explore/tags/popkoorsingingbeat/" target="_blank" aria-label="instagram">
                        <img class="hm-icon | px-1" aria-hidden="true" src="img/icon/icon_socials_instagram_001_5F3F6D_32x32.svg" alt="Instagram"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="d-flex justify-content-center pb-4">
            <h2 class="fs-800 fw-extra-bold">Events</h2>
        </div>
        <div class="hm-content-2 even-column-3 container | d-grid gap-5">
            <div class="content-box | py-5 px-5 w-100 mw-100">
                <h3 class="py-4 fs-700 fw-semi-bold text-start">Lorum Ipsum</h3>
                <p class="hm-sm-txt | pt-3 fs-300 fw-light">8 November 2022</p>
                <p class="hm-txt | mb-4 py-4 fs-500 fw-regular">
                    Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua.
                    At consectetur lorem donec
                    massa sapien. Sit amet purus
                    gravida quis blandit turpis.
                    Ipsum nunc aliquet bibendum enim.
                </p>
                <div class="d-flex justify-content-end mb-4">
                    <button class="hm-btn button-primary">Lees Verder</button>
                </div>
            </div>
            <div class="content-box | py-5 px-5 w-100 mw-100">
                <h3 class="py-4 fs-700 fw-semi-bold text-start">Lorum Ipsum</h3>
                <p class="hm-sm-txt | pt-3 fs-300 fw-light">8 November 2022</p>
                <p class="hm-txt | mb-4 py-4 fs-500 fw-regular">
                    Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua.
                    At consectetur lorem donec
                    massa sapien. Sit amet purus
                    gravida quis blandit turpis.
                    Ipsum nunc aliquet bibendum enim.
                </p>
                <div class="d-flex justify-content-end mb-4">
                    <button class="hm-btn button-primary">Lees Verder</button>
                </div>
            </div>
            <div class="content-box | py-5 px-5 w-100 mw-100">
                <h3 class="py-4 fs-700 fw-semi-bold text-start">Lorum Ipsum</h3>
                <p class="hm-sm-txt | pt-3 fs-300 fw-light">8 November 2022</p>
                <p class="hm-txt | mb-4 py-4 fs-500 fw-regular">
                    Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua.
                    At consectetur lorem donec
                    massa sapien. Sit amet purus
                    gravida quis blandit turpis.
                    Ipsum nunc aliquet bibendum enim.
                </p>
                <div class="d-flex justify-content-end mb-4">
                    <button class="hm-btn button-primary">Lees Verder</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="d-flex justify-content-center pb-4">
            <h2 class="fs-800 fw-extra-bold">Over ons</h2>
        </div>
        <div class="hm-content-3 even-column-2 container | d-grid">
            <div class="hm-box content-box even-column-l-auto | d-grid">
                <div>
                    <span class="hm-circle"></span>
                </div>
                <div>
                    <h3 class="mb-3 fs-500 fw-semi-bold">Ons Popkoor</h3>
                    <p class="fs-500 fw-regular">
                        Popkoor Singing Beat bestaat sinds maart
                        2001 en telt inmiddels zo'n 70 enthousiaste
                        zangliefhebbers, maar we hebben zeker
                        nog plaats voor Hoge en Lage stempartijen.
                    </p>
                </div>
            </div>
            <div class="hm-box content-box even-column-l-auto | d-grid">
                <div>
                    <span class="hm-circle"></span>
                </div>
                <div>
                    <h3 class="mb-3 fs-500 fw-semi-bold">Wie kan lid worden?</h3>
                    <p class="fs-500 fw-regular">
                    Iedereen die van zingen houdt: JONG
                    (vanaf 18 jaar) OF OUD, MAN OF VROUW.
                    Dus lees verder en misschien wel TOT ZIENS!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel https://webdesign.tutsplus.com/tutorials/how-to-build-a-simple-carousel-with-vanilla-javascript--cms-41734 -->


    <section class="slider-wrapper">
        <ul class="hm-slides-container | even-column-3 container gap-3" id="hm-slides-container">

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Suzanne</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Mijn naam is Suzanne de Jonge en ik ben geboren op
                    30 november 1987 te Rotterdam en vanaf augustus 2017
                    mag ik mijzelf de songcoach van Singing Beat noemen,
                    waar ik met enorm veel plezier mee aan de slag ga!
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Diny</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Een groot aantal jaren geleden riep ik nog "Ik kan niet zingen".
                    En nu zing ik al een groot aantal jaren bij het leukste koor
                    van Spijkenisse. Ik kan hier wel zingen, we zingen vanuit
                    plezier en de liedjes zijn de liedjes die je hoort op de radio.
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Nathalie</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Ik ben Nathalie Bos. Naast mijn functie als secretaris ben ik
                    de oprichtster van Singing Beat. Samen met Corina Versloot
                    heb ik Singing Beat in 2001 opgericht. Inmiddels bestaat
                    het koor uit ca. 70 leden waar ik natuurlijk erg trots op ben.
                    t is en blijft iedere week weer een feestje om te mogen zingen!
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Jacques</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Sinds 2007 ben ik lid van het koor en had het eigenlijk veel
                    eerder moeten doen. Wat is er leuker dan zingen en dan nog met
                    elkaar. Dus als u dit leest en als u van zingen houdt, meldt
                    u aan! Oh, ja, mijn naam is Jacques de Jonge en ben tevens
                    penningmeester van ons koor.
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Sheila</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Hallo Allemaal, Mijn naam is Sheila Schols. Ik ben mama van
                    Yenna en Nova, vrouw van Patrick, dochter, schoondochter,
                    vriendin en juf op een basisschool.
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

            <li class="hm-slide content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">

                <h3 class="mb-3 fs-500 fw-semi-bold">Gerda</h3>
                <p class="mb-3 fs-500 fw-regular">
                    Hallo iedereen, mijn naam is Gerda en met veel plezier zing ik
                    alweer enkele jaren in het aller gezelligste koor van Spijkenisse!
                    Elke dinsdagavond is het weer een feest. Met veel enthousiasme
                    ben ik sinds kort algemeen bestuurslid en draag ik graag mijn
                    steentje bij aan Singing Beat!
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>

            </li>

        </ul>
    </section>
    <!-- End Carousel -->
{{--    <section class="py-6">--}}
{{--        <div class="d-flex justify-content-center pb-4">--}}
{{--            <h3 class="fs-800 fw-extra-bold">Even Voorstellen</h3>--}}
{{--        </div>--}}
{{--        <div class="psb-carousel hm-content-4 even-column-3 container | d-grid gap-5">--}}
{{--            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">--}}
{{--                <h4 class="mb-3 fs-500 fw-semi-bold">Suzanne</h4>--}}
{{--                <p class="mb-3 fs-500 fw-regular text-center">--}}
{{--                    Mijn naam is Suzanne de Jonge en ik ben geboren op--}}
{{--                    30 november 1987 te Rotterdam en vanaf augustus 2017--}}
{{--                    mag ik mijzelf de songcoach van Singing Beat noemen,--}}
{{--                    waar ik met enorm veel plezier mee aan de slag ga!--}}
{{--                </p>--}}
{{--                <button class="hm-btn button-primary">Lees Verder</button>--}}
{{--            </div>--}}
{{--            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">--}}
{{--                <h4 class="mb-3 fs-500 fw-semi-bold">Diny</h4>--}}
{{--                <p class="mb-3 fs-500 fw-regular text-center">--}}
{{--                    Een groot aantal jaren geleden riep ik nog "Ik kan niet zingen".--}}
{{--                    En nu zing ik al een groot aantal jaren bij het leukste koor--}}
{{--                    van Spijkenisse. Ik kan hier wel zingen, we zingen vanuit--}}
{{--                    plezier en de liedjes zijn de liedjes die je hoort op de radio.--}}
{{--                </p>--}}
{{--                <button class="hm-btn button-primary">Lees Verder</button>--}}
{{--            </div>--}}
{{--            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">--}}
{{--                <h4 class="mb-3 fs-500 fw-semi-bold">Nathalie</h4>--}}
{{--                <p class="mb-3 fs-500 fw-regular text-center">--}}
{{--                    Ik ben Nathalie Bos. Naast mijn functie als secretaris ben ik--}}
{{--                    de oprichtster van Singing Beat. Samen met Corina Versloot--}}
{{--                    heb ik Singing Beat in 2001 opgericht. Inmiddels bestaat--}}
{{--                    het koor uit ca. 70 leden waar ik natuurlijk erg trots op ben.--}}
{{--                    't is en blijft iedere week weer een feestje om te mogen zingen!--}}
{{--                </p>--}}
{{--                <button class="hm-btn button-primary">Lees Verder</button>--}}
{{--            </div>--}}
            <!-- Content for the carousel -->
            <!--
            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">
                <h3 class="mb-3 fs-500 fw-semi-bold">Jacques</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Sinds 2007 ben ik lid van het koor en had het eigenlijk veel
                    eerder moeten doen. Wat is er leuker dan zingen en dan nog met
                    elkaar. Dus als u dit leest en als u van zingen houdt, meldt
                    u aan! Oh, ja, mijn naam is Jacques de Jonge en ben tevens
                    penningmeester van ons koor.
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>
            </div>
            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">
                <h3 class="mb-3 fs-500 fw-semi-bold">Sheila</h3>
                <p class="mb-3 fs-500 fw-regular text-center">
                    Hallo Allemaal, Mijn naam is Sheila Schols. Ik ben mama van
                    Yenna en Nova, vrouw van Patrick, dochter, schoondochter,
                    vriendin en juf op een basisschool.
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>
            </div>
            <div class="content-box | d-flex flex-column align-items-center justify-content-center pt-5 pb-4 px-4">
                <h3 class="mb-3 fs-500 fw-semi-bold">Gerda</h3>
                <p class="mb-3 fs-500 fw-regular">
                    Hallo iedereen, mijn naam is Gerda en met veel plezier zing ik
                    alweer enkele jaren in het aller gezelligste koor van Spijkenisse!
                    Elke dinsdagavond is het weer een feest. Met veel enthousiasme
                    ben ik sinds kort algemeen bestuurslid en draag ik graag mijn
                    steentje bij aan Singing Beat!
                </p>
                <button class="hm-btn button-primary">Lees Verder</button>
            </div>
             -->
{{--        </div>--}}
    </section>

    <section>
        <div class="container">
        </div>
    </section>
@endsection
