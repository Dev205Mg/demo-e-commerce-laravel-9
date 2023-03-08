<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord professionnel') }}
        </h1>
        @if (session('status') === 'Produit-stocker')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-200 bg-green-600"
                >{{ __('Produit enregistré avec succes.') }}</p>
                @elseif (session('status') === 'Produit-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-200 bg-green-600"
                >{{ __('Produit modifié avec succes.') }}</p>
                @elseif (session('status') === 'Product-deleted')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-200 bg-red-600"
                >{{ __('Produit supprimé avec succes.') }}</p>
        @endif

    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="m-auto w-60">
            <a href="{{ route("admin.create") }}" class="rounde mr-3 hidden bg-blue-700 py-1.5 px-6 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 md:mr-0 md:inline-block rounded-lg">
                Ajouter un nouveau produit
            </a>
        </div>
    </div>
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" flex justify-center my-6 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-full">
            <table class="text-sm lg:text-base bg-white rounded">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell">image</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">descriptions</th>
                        <th class="hidden text-center md:table-cell">Prix</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light mt-5">
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <img src="{{ Storage::url($product->image) }}" alt="image" class=" w-20 rounded">
                            </td>
                            <td class="mb-2 md:ml-4">
                                <span>{{ $product->name }}</span>
                            </td>
                            <td class="mb-2 md:ml-4">
                                <span>{{ $product->description }}</span>
                            </td>
                            <td class="px-6 text-left w-32">
                                <span class="bg-purple-200 text-purple-600 py-1  px-3 rounded-full text-xs">{{ $product->formatted_price }}</span>
                            </td>
                            <td class="px-6 text-left">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:scale-110">
                                        <a href="{{ route('products.show',['product' => $product->id] ) }}" title="Voir le produit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{ route('admin.edit', ["product" => $product->id]) }}" title="Modifier le produit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-gray-500 hover:scale-110">
                                        <form action="{{ route('admin.destroy', ["product" => $product->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="transition ease-in-out duration-150" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FF0000">
                                                    <path d="M0 0h24v24H0V0z" fill="none"/>
                                                    <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Pagination lien-->
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>