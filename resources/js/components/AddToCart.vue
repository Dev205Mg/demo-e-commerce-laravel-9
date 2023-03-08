<template>
    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
        <button class="text-sm" v-on:click.prevent="addToCart">
            Au Panier
        </button>
    </div>
</template>

<script setup>
    import { inject } from 'vue';
    import useProduct from '../composables/products';
    import emitter from 'tiny-emitter/instance';

    const { add } = useProduct();
    const productId = defineProps(['productId']);
    const toast = inject('toast');

    const addToCart = async () => {
        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')
            .then(async(res) =>{
                let cartCount = await add(productId);
                emitter.emit('refreshCartCount', cartCount);
                toast.success('produit ajouté au panier.');
            })
            .catch(()=> {
                toast.error('Connectez-vous pour ajouter un produit.');
            });
    }
</script>