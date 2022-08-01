<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Media.Monks Challenge - Trapa</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto my-4 sm:px-6 lg:px-8 text-gray-700 dark:text-gray-400">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 text-lg mb-4">
                    Welcome to the &nbsp;
                    <div style="margin-top:-0.12rem;">
                        <svg width="150" viewBox="0 0 146 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 19.874V11.04h3.586l.087 1.13c.785-.925 1.882-1.387 3.291-1.387.786 0 1.45.126 1.993.377.554.25.999.627 1.334 1.13a3.976 3.976 0 0 1 1.524-1.113c.612-.263 1.305-.394 2.08-.394.761 0 1.443.126 2.043.377.601.25 1.069.627 1.404 1.13.346.49.52 1.084.52 1.78v5.803H14.05V14.6c0-.433-.138-.77-.416-1.01-.265-.24-.606-.359-1.022-.359a1.88 1.88 0 0 0-.9.223 1.658 1.658 0 0 0-.659.633c-.15.262-.225.565-.225.907v4.879H7.016V14.6c0-.25-.063-.479-.19-.684a1.19 1.19 0 0 0-.485-.497 1.347 1.347 0 0 0-.71-.188 1.95 1.95 0 0 0-.936.223 1.7 1.7 0 0 0-.658.616 1.83 1.83 0 0 0-.226.924v4.879H0zm25.19.308c-1.189 0-2.257-.183-3.204-.548-.936-.377-1.675-.919-2.218-1.626-.531-.708-.797-1.558-.797-2.55 0-.96.266-1.792.797-2.5.543-.707 1.27-1.25 2.183-1.626.924-.377 1.94-.565 3.049-.565 1.178 0 2.23.205 3.153.616.924.4 1.646.982 2.166 1.746.53.753.797 1.644.797 2.67v.446h-8.35c.092.593.34 1.044.744 1.352.404.308.959.462 1.663.462.485 0 .89-.074 1.213-.222.323-.16.583-.4.78-.72l3.655.189c-.416.97-1.126 1.695-2.13 2.174-1.006.468-2.172.702-3.5.702zm1.993-5.7c-.093-.537-.318-.936-.676-1.199-.358-.274-.854-.41-1.49-.41-1.27 0-2.015.536-2.235 1.609h4.4zm13.414-6.796h3.812v12.188h-3.5l-.104-1.147c-.785 1.004-1.986 1.506-3.603 1.506-1.04 0-1.946-.188-2.72-.565a4.186 4.186 0 0 1-1.767-1.66c-.416-.72-.624-1.57-.624-2.55 0-1.005.225-1.86.676-2.568a4.41 4.41 0 0 1 1.836-1.627 5.852 5.852 0 0 1 2.53-.547c1.466 0 2.621.393 3.464 1.18v-4.21zm-2.356 9.98c.763 0 1.357-.189 1.785-.566.438-.388.658-.952.658-1.694s-.22-1.307-.658-1.695c-.44-.4-1.028-.599-1.768-.599-.427 0-.814.08-1.16.24a1.87 1.87 0 0 0-.85.736c-.207.342-.31.782-.31 1.318 0 .799.213 1.375.64 1.729.439.353.993.53 1.663.53zm9.553-7.516a1.97 1.97 0 0 1-.97-.239 1.843 1.843 0 0 1-.693-.667 2.04 2.04 0 0 1-.243-.993c0-.354.08-.668.243-.942.173-.285.404-.508.693-.667.288-.16.612-.24.97-.24s.681.08.97.24c.289.16.514.382.676.667.173.274.26.588.26.942 0 .365-.087.696-.26.993a1.717 1.717 0 0 1-.676.667 1.97 1.97 0 0 1-.97.24zm1.906 9.724h-3.812V11.04H49.7v8.833zm9.244 0a5.68 5.68 0 0 1-.242-.84c-.428.4-.96.697-1.594.89-.636.206-1.392.31-2.27.31-1.374 0-2.39-.224-3.049-.669-.647-.456-.97-1.146-.97-2.07 0-.549.11-1.01.33-1.387.218-.377.6-.685 1.142-.925.555-.25 1.317-.422 2.287-.513l2.807-.274c.335-.034.577-.069.727-.103.162-.045.266-.097.312-.154a.45.45 0 0 0 .07-.257v-.154c0-.388-.133-.667-.399-.838-.254-.183-.687-.274-1.3-.274-.565 0-1.004.102-1.316.308-.312.194-.49.542-.537 1.044l-3.638-.137c.092-.696.335-1.272.728-1.729.404-.456.999-.799 1.784-1.027.785-.228 1.808-.342 3.066-.342 1.329 0 2.391.131 3.188.393.797.263 1.369.645 1.715 1.147.347.491.52 1.113.52 1.866v3.51c0 .98.139 1.723.416 2.225h-3.777zM55.86 18.23c.508 0 .97-.074 1.386-.222.416-.149.745-.36.988-.634.242-.273.364-.599.364-.975v-.548c-.058.023-.11.04-.156.051h-.104l-2.148.257c-.44.046-.78.12-1.023.223-.242.09-.41.21-.502.36a.93.93 0 0 0-.139.53c0 .32.11.559.33.719.219.16.554.24 1.004.24zm9.906 1.883c-.37 0-.71-.085-1.023-.257a2.13 2.13 0 0 1-.745-.719 2.025 2.025 0 0 1-.26-1.01c0-.353.087-.684.26-.992a2.08 2.08 0 0 1 .745-.736 1.987 1.987 0 0 1 1.023-.274c.37 0 .71.091 1.022.274.312.182.56.428.745.736.184.308.277.639.277.993 0 .353-.093.684-.277.992a2.08 2.08 0 0 1-.745.736 2.089 2.089 0 0 1-1.022.257zm30.454 3.116L82.604 31l-13.582-7.771V7.72L82.603 0l13.618 7.72v15.509zm-24.08-1.764 10.463 5.974 10.482-5.974V9.517L82.604 3.543 72.138 9.517v11.948zm1.299-1.591v-8.97h3.69l.104 1.095c.785-.913 1.882-1.369 3.292-1.369 1.674 0 2.852.514 3.534 1.54.797-1.026 2.01-1.54 3.638-1.54.831 0 1.553.126 2.165.377.624.25 1.104.627 1.438 1.13.347.49.52 1.1.52 1.831v5.906h-3.915v-5.375c0-.423-.133-.754-.399-.993-.265-.251-.63-.377-1.091-.377-.555 0-1 .154-1.334.462-.324.309-.485.742-.485 1.301v4.982h-3.95v-5.375c0-.411-.127-.742-.381-.993s-.6-.377-1.04-.377c-.6 0-1.062.16-1.386.48-.323.308-.485.736-.485 1.283v4.982H73.44zm29.978.325c-1.12 0-2.148-.183-3.084-.548-.935-.377-1.68-.919-2.235-1.626-.554-.708-.831-1.546-.831-2.516 0-.993.277-1.85.831-2.568.555-.719 1.3-1.261 2.235-1.626.936-.377 1.964-.565 3.084-.565 1.132 0 2.166.188 3.101.565.936.376 1.675.924 2.218 1.643.554.719.831 1.57.831 2.55 0 .96-.283 1.798-.849 2.517-.554.707-1.299 1.25-2.235 1.626-.935.365-1.957.548-3.066.548zm-.017-2.448c.415 0 .802-.103 1.16-.308.358-.206.641-.48.849-.822a2.224 2.224 0 0 0 0-2.276 2.29 2.29 0 0 0-.849-.84 2.293 2.293 0 0 0-1.16-.307c-.416 0-.803.102-1.161.308a2.328 2.328 0 0 0-.832.839 2.234 2.234 0 0 0-.294 1.13c0 .41.098.792.294 1.146a2.298 2.298 0 0 0 1.993 1.13zm7.311 2.123V11.04h3.568l.139 1.215c.785-.97 1.929-1.455 3.43-1.455.774 0 1.461.126 2.062.377.612.24 1.091.605 1.438 1.095.358.48.537 1.062.537 1.746v5.855h-3.812V14.72c0-.434-.138-.776-.415-1.027-.277-.251-.659-.377-1.144-.377-.381 0-.722.075-1.022.223-.3.148-.537.36-.71.633-.173.274-.26.605-.26.993v4.708h-3.811zm24.45-8.834-4.366 3.561 4.747 5.273h-4.643l-1.871-2.38-.814-1.061-.919.685v2.756h-3.811V7.686h3.811v4.467l-.034 1.866 1.576-1.472 1.733-1.506h4.591z" fill="#2D2D2D"></path><path d="M140.456 20.233c-3.349 0-5.157-1.004-5.422-3.013l3.62-.085c.081.365.266.639.555.821.3.172.774.257 1.42.257.624 0 1.086-.068 1.386-.205.301-.149.451-.36.451-.634a.552.552 0 0 0-.312-.513c-.196-.126-.497-.206-.901-.24l-2.044-.188c-1.34-.126-2.327-.41-2.963-.856-.623-.456-.935-1.078-.935-1.866 0-.936.421-1.666 1.264-2.19.855-.537 2.137-.805 3.847-.805 1.582 0 2.806.234 3.672.701.878.457 1.398 1.136 1.56 2.037l-3.535.086a.943.943 0 0 0-.519-.685c-.266-.137-.705-.205-1.317-.205-.497 0-.889.063-1.178.188-.277.114-.416.286-.416.514 0 .217.104.382.312.496.208.103.537.177.987.223l1.993.17c2.679.23 4.019 1.153 4.019 2.774 0 1.107-.474 1.923-1.421 2.448-.947.513-2.321.77-4.123.77z" fill="#2D2D2D"></path></svg>
                    </div>
                    &nbsp; challenge!
                </div>

                <p>You can login with the following users: 
                    <a href="{{ route('login') }}?email=admin@trapa.com&pass=secret" class="text-blue-500">admin@trapa.com</a>, 
                    <a href="{{ route('login') }}?email=editor@trapa.com&pass=secret" class="text-blue-500">editor@trapa.com</a>, 
                    <a href="{{ route('login') }}?email=usuario@trapa.com&pass=secret" class="text-blue-500">usuario@trapa.com</a>.
                    All of them have "<strong class="font-bold">secret</strong>" as a password and each of them belongs to a role in the app that gives them different permissions to the model <strong class="font-bold">Article</strong>. </p>

                <p class="mt-4">The following is an example of the <strong class="font-bold">Article</strong> model:</p>

                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1">
                    @if($article)
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-blue-700 dark:text-blue-700 leading-7 text-lg font-semibold uppercase">{{ $article->title }}</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-0 mb-6 text-gray-800 dark:text-gray-200 text-sm font-semibold">
                                    by <span class="font-bold italic">{{ $article->author }}</span>, {{ $article->created_at->diffForHumans() }}
                                </div>
                                <div class="mt-3 text-gray-800 dark:text-gray-200 text-md font-semibold">
                                    {{ $article->subtitle }}
                                </div>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {{ $article->content }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-gray-400 dark:text-gray-200 leading-7 text-lg font-semibold uppercase">No articles found</div>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
