<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/assets/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite + React</title>
</head>

<body>
    <div id="root"></div>
    <x-alert-component type="test" message="$message">
        asdas
        <x-slot name="test">test</x-slot>
    </x-alert-component>
    @yield("test")
    @include(App::getPath() . "/res/inc.blade.php")
    @vite("main.jsx")
</body>

</html>