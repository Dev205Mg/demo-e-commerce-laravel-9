<x-app-layout>
    <x-slot name="header">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Liste des produits') }}
            </h1>
    </x-slot>

    <section class="py-10 bg-gray-100">
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product )
                <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ route('products.show',['product' => $product->id] ) }}" title="Voir l'article">
                        <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img src="{{ Storage::url($product->image) }}" alt="Télephone" />
                        </div>
                    </a>
            
                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700">{{ $product->name }}</h2>
                        <p class="mt-1 text-sm text-slate-400">{{ $product->description }}</p>
            
                        <div class="mt-3 flex items-end justify-between">
                        <p>
                            <span class="text-lg font-bold text-blue-500">{{ $product->formatted_price }}</span>
                        </p>
                        <add-to-cart :product-id="{{ $product->id }}"></add-to-cart>
                    </div>
                </article>
            @endforeach
        </div>
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
    </section>
</x-app-layout>