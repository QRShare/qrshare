<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('QRShare - Build Customizable Pages with Ease') }}</title>

    <!-- Define a cor da barra superior no Chrome, Firefox e Edge -->
    <meta name="theme-color" content="rgba(0, 0, 0, 0)">

    <!-- Define a cor da barra superior no Safari iOS -->

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">


    <!-- Meta tags para SEO - Multilíngue (Inglês e Português) -->
    <meta name="description"
        content="{{ app()->getLocale() == 'pt' ? 'O QRShare permite aos usuários criar páginas dinâmicas e personalizáveis com facilidade. Gerencie texto, imagens, sliders e conteúdo rico com total controle. Disponível apenas para assinantes ativos, o QRShare oferece páginas personalizadas com funcionalidade de arrastar e soltar.' : 'QRShare allows users to create dynamic and customizable web pages with ease. Manage text, images, sliders, and rich content with full control. Accessible only to active subscribers, QRShare provides personalized pages with simple drag-and-drop functionality.' }}">

    <meta name="keywords"
        content="{{ app()->getLocale() == 'pt' ? 'QRShare, páginas personalizáveis, conteúdo dinâmico, construtor de páginas, páginas personalizadas, assinaturas, construtor de páginas, admin filament, Laravel' : 'QRShare, customizable pages, dynamic content, web builder, personalized web pages, subscriptions, page builder, filament admin, Laravel' }}">

    <meta name="author" content="{{ app()->getLocale() == 'pt' ? 'Equipe QRShare' : 'QRShare Team' }}">

    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="nositelinkssearchbox">
    <meta name="google" content="notranslate">
    <meta name="google" content="snippet">
    <meta name="google-site-verification" content="sua-verificação-do-google">

    <!-- Meta tags para redes sociais -->
    <meta property="og:title" content="{{ $title ?? __('QRShare - Build Customizable Pages with Ease') }}">

    <meta property="og:description"
        content="{{ app()->getLocale() == 'pt' ? 'Crie páginas dinâmicas e personalizadas com o QRShare. Gerencie texto, imagens, conteúdo rico e mais com funcionalidade de arrastar e soltar. Disponível apenas para assinantes ativos.' : 'Create dynamic and personalized web pages with QRShare. Manage text, images, rich content, and more with drag-and-drop functionality. Only available for active subscribers.' }}">

    <meta property="og:image" content="{{ asset('images/social-share-image.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __('QRShare - Customizable Pages') }}">

    <meta name="twitter:description"
        content="{{ app()->getLocale() == 'pt' ? 'Crie páginas personalizadas com facilidade usando o QRShare. Construtor de arrastar e soltar, campos totalmente personalizáveis e muito mais. Disponível apenas para assinantes.' : 'Create personalized web pages with ease using QRShare. Drag-and-drop builder, fully customizable fields, and more. Available only to subscribers.' }}">

    <meta name="twitter:image" content="{{ asset('images/twitter-share-image.png') }}">
    <!-- Fim das meta tags para SEO -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none
        }
    </style>

    <!-- Styles -->
    @livewireStyles
</head>

<body x-clock
    class="flex flex-col flex-grow h-full min-h-screen overflow-x-hidden bg-gradient-to-bl from-indigo-500 via-purple-500 to-pink-500">
    <livewire:components.header />

    <div class="flex-1 px-6">
        {{ $slot }}
    </div>

    <livewire:components.footer />

    @stack('modals')

    @livewireScripts
</body>

</html>