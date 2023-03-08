<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit numero #' . $product->id ) }}
        </h1>
    </x-slot>
    <section class="py-10 bg-gray-100">
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
            <article class="rounded-xl bg-white p-3 shadow-lg">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="{{ Storage::url($product->image) }}" alt="Télephone" />
                </div>
        
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700">{{ $product->name }}</h2>
                    <p class="mt-1 text-sm text-slate-400">{{ $product->description }}</p>
        
                    <div class="mt-3 flex items-end justify-between">
                        <p>
                            <span class="text-lg font-bold text-blue-500">{{ $product->formatted_price }}</span>
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </section>

</x-app-layout>