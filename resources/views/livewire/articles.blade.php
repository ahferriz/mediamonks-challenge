<div>
    <script>
        window.addEventListener('swal',function(e){ 
            Swal.fire(e.detail);
        });
    </script>

    <section class="bg-gray-50 rounded-lg">
        <header class="space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Articles</h2>
                @can('crear articulo')
                    <button class="button hover:bg-green-500 bg-green-700 text-white font-bold mt-4 self-end justify-self-end" data-ripple-light="true" wire:click="create()">New</button>
                @endcan
            </div>
        </header>

        <div class="grid grid-cols-2 gap-4 p-4">
            @if(!count($articulos))
                <p class="space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">No se encontraron artículos.</p>
            @else
                @foreach ($articulos as $art)
                <div class="card">
                    <div class="card-body">
                    <a href="#">
                        <h3>{{ $art->title }}</h3>
                    </a>
                    <span class="font-bold text-blue-500">{{ Str::words($art->subtitle, 5, '...') }}</span>
                    <p class="mb-3 opacity-60">
                        {{ Str::words($art->content, 18, '...') }}
                    </p>
                    <p>por <span class="font-bold">{{ $art->author }}</span>, {{ $art->created_at->diffForHumans() }}</p>

                    @can('ver articulo')
                        <button class="button hover:bg-blue-500 bg-blue-700 text-white font-bold mt-4 self-end justify-self-end" data-ripple-light="true" wire:click="view({{ $art->id }})">View</button>
                    @endcan
                    @can('editar articulo')
                        <button class="button hover:bg-orange-400 bg-orange-600 text-white font-bold mt-4 self-end justify-self-end" data-ripple-light="true" wire:click="edit({{ $art->id }})">Edit</button>
                    @endcan
                    @can('borrar articulo')
                        <button class="button hover:bg-red-500 bg-red-700 text-white font-bold mt-4 self-end justify-self-end" data-ripple-light="true" wire:click="delete({{ $art->id }})">Delete</button>
                    @endcan
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>

    @can('restaurar articulo')
        <section class="mt-6 bg-gray-200 rounded-lg border-dashed border-4 border-gray-400">
            <header class="space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-slate-900">Artículos borrados</h2>
                </div>
            </header>

            <div class="grid grid-cols-2 gap-4 p-4">
                @if(!count($articulosBorrados))
                    <p class="space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">No se encontraron artículos borrados.</p>
                @else
                    @foreach ($articulosBorrados as $art)
                    <div class="card">
                        <div class="card-body">
                        <a href="#">
                            <h3>{{ $art->title }}</h3>
                        </a>
                        <span class="font-bold text-blue-500">{{ Str::words($art->subtitle, 5, '...') }}</span>
                        <p class="mb-3 opacity-60">
                            {{ Str::words($art->content, 18, '...') }}
                        </p>
                        <p>por <span class="font-bold">{{ $art->author }}</span>, {{ $art->created_at->diffForHumans() }}</p>

                        @can('restaurar articulo')
                            <button class="button hover:bg-green-500 bg-green-700 text-white font-bold mt-4 self-end justify-self-end" data-ripple-light="true" wire:click="restore({{ $art->id }})">Restaurar artículo</button>
                        @endcan
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>
    @endcan

    @if($viewModal)
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity"><div class="absolute inset-0 bg-gray-500 opacity-75"></div></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-blue-700 dark:text-blue-700 leading-7 text-lg font-semibold uppercase">{{ $articulo->title }}</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-0 mb-6 text-gray-800 dark:text-gray-200 text-sm font-semibold">
                                by <span class="font-bold italic">{{ $articulo->author }}</span>, {{ $articulo->created_at->diffForHumans() }}
                            </div>
                            <div class="mt-3 text-gray-800 dark:text-gray-200 text-md font-semibold">
                                {{ $articulo->subtitle }}
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                {{ $articulo->content }}
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closeViewModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Close
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($editModal)
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity"><div class="absolute inset-0 bg-gray-500 opacity-75"></div></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <form  wire:submit.prevent="save">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="articulo.title">

                                    @error('articulo.title') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="articulo.author">

                                    @error('articulo.author') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="articulo.subtitle">

                                    @error('articulo.subtitle') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="articulo.content" rows="15"></textarea>

                                    @error('articulo.content') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="save()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                            </span>

                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closeEditModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                            </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
