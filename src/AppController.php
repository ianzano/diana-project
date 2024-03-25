<?php
use Diana\Rendering\Renderer;
use Diana\Routing\Attributes\Get;
use Diana\Support\Debug;
use Diana\Support\View;

class AppController
{
    #[Get("/twig")]
    public function twig(Renderer $renderer)
    {
        $render = $renderer->render("index");

        foreach (array_diff(scandir(App::getPath() . "/cache/blade"), [".", ".."]) as $file)
            unlink(App::getPath() . "/cache/blade/" . $file);

        return $render;
    }

    #[Get("/")]
    public function main()
    {
        $vite_host = 'http://localhost:3000';

        // function isDev(string $entry): bool
        // {
        //     static $exists = null;
        //     if ($exists !== null) {
        //         return $exists;
        //     }
        //     $handle = curl_init($vite_host . '/' . $entry);
        //     curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($handle, CURLOPT_NOBODY, true);

        //     curl_exec($handle);
        //     $error = curl_errno($handle);
        //     curl_close($handle);

        //     return $exists = !$error;
        // }


        $env = "prod";
        $entry = "main.jsx";

        if ($env == "dev") {
            $script =
                '<script type="module">
                    import RefreshRuntime from "' . $vite_host . '/@react-refresh"
                    RefreshRuntime.injectIntoGlobalHook(window)
                    window.$RefreshReg$ = () => {}
                    window.$RefreshSig$ = () => (type) => type
                    window.__vite_plugin_react_preamble_installed__ = true
                </script>
                <script type="module" src="' . $vite_host . '/@vite/client"></script>
                <script type="module" src="' . $vite_host . '/' . $entry . '"></script>';
        } else {
            $content = file_get_contents(App::getPath() . '/dist/.vite/manifest.json');
            $manifest = json_decode($content, true);
            $script = isset ($manifest[$entry]) ? "<script type=\"module\" src=\"" . $manifest[$entry]['file'] . "\"></script>" : "";

            $res = '';
            if (!empty ($manifest[$entry]['imports']))
                foreach ($manifest[$entry]['imports'] as $imports)
                    $res .= '<link rel="modulepreload" href="/' . $manifest[$imports]['file'] . '">';

            $script .= "\n" . $res;

            $tags = '';
            if (!empty ($manifest[$entry]['css']))
                foreach ($manifest[$entry]['css'] as $file)
                    $tags .= '<link rel="stylesheet" href="/' . $file . '">';

            $script .= "\n" . $tags;
        }

        return
            '<!doctype html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <link rel="icon" type="image/svg+xml" href="/assets/vite.svg" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Vite + React</title>
        </head>

        <body>
            <div id="root"></div>
            ' . $script . '
        </body>

        </html>';
    }

}