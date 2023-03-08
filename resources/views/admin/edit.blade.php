<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le produit numero # '.$product->id) }}
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Modifier un produit') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Tous les champs sont obligatoires sauf image, laisser ce champ libre si vous ne change pas l\'image !!') }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('admin.update',['product' =>$product->id]) }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Nom de produit')" />
                                <x-text-input id="name" name="name" type="text"  class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->errorsUpdate->get('name')" class="mt-2" />
                            </div>
                
                            <div>
                                <x-input-label for="description" :value="__('Description du produit')" />
                                <x-text-input id="description" name="description" type="text"  class="mt-1 block w-full" :value="old('description', $product->description)" required autofocus autocomplete="description" />
                                <x-input-error :messages="$errors->errorsUpdate->get('description')" class="mt-2" />
                            </div>
                
                            <div>
                                <x-input-label for="price" :value="__('Prix (Ar)')" />
                                <x-text-input id="price" name="price" type="number" min="0"  class="mt-1 block w-full" :value="old('price', $product->price)" required autofocus autocomplete="price" />
                                <x-input-error :messages="$errors->errorsUpdate->get('price')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Image (Taille < 2 Mo)')" />
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" accept="image/png, image/jpeg, image/jpg" autofocus autocomplete="image" />
                                <x-input-error :messages="$errors->errorsUpdate->get('image')" class="mt-2" />
                            </div>
                
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                                <a href="{{ route('admin.index') }}">
                                    <x-secondary-button>
                                        {{ __(' Annuler') }}
                                    </x-secondary-button>
                                </a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>