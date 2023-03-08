<template>
    <div>
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Produits</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                <span class="hidden lg:inline">Quantité</span>
                                </th>
                                <th class="hidden text-right md:table-cell">Prix unitaire</th>
                                <th class="text-right">Prix total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="product in products" v-bind:key="product.id">
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <img :src="'http://findaynaka.mg/storage/'+ product.associatedModel.image" class="w-20 rounded" alt="Thumbnail">
                                    </td>
                                    <td>
                                        <p class="mb-2 md:ml-4" v-text="product.name"></p>
                                        <form action="" method="POST">
                                        <button type="submit" class="text-gray-700 md:ml-4 hover:scale-110 rounded-sm">
                                            <small v-on:click.prevent="destroy(product.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#FF0000" viewBox="0 96 960 960" width="20">
                                                    <path d="m399 715 82-82 82 82 33-33-82-82 82-82-33-33-82 82-82-82-33 33 82 82-82 82 33 33Zm-59 177q-33.425 0-55.713-22.287Q262 847.425 262 814V356h-48v-46h168v-44h198v44h168v46h-48v457.566q0 34.159-22.287 56.296Q655.425 892 622 892H340Zm314-536H308v458q0 12 10 22t22 10h282q12 0 22-10t10-22V356Zm-346 0v490-490Z"/>
                                                </svg>
                                            </small>
                                        </button>
                                        </form>
                                    </td>
                                    <td class="justify-center md:justify-end md:flex mt-6">
                                        <div class="w-20 h-10">
                                            <div class="relative flex w-full h-8 space-x-5">
                                                <button v-on:click.prevent="decrease(product.id)" class="hover:scale-110">-                                                
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 96 960 960" width="15">
                                                        <path d="M298 598h364v-46H298v46Zm182.45 342q-75.09 0-141.488-28.411-66.399-28.412-116.234-78.188-49.836-49.777-78.282-116.053Q116 651.071 116 575.716q0-75.612 28.47-141.736 28.471-66.123 78.348-116.126 49.878-50.002 116.052-77.928Q405.045 212 480.284 212q75.602 0 141.718 27.891 66.115 27.892 116.13 77.848 50.016 49.957 77.942 116.243Q844 500.268 844 575.634q0 75.366-27.891 141.424-27.892 66.059-77.835 115.996-49.943 49.936-116.211 78.441Q555.795 940 480.45 940Zm-.45-46q132.513 0 225.256-92.744Q798 708.513 798 576t-92.744-225.256Q612.513 258 480 258t-225.256 92.744Q162 443.487 162 576t92.744 225.256Q347.487 894 480 894Zm0-318Z"/>
                                                    </svg> -->
                                                </button>
                                                <input
                                                    readonly
                                                    type="input"
                                                    :value="product.quantity"
                                                    class="w-full m-0 font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                                <button v-on:click.prevent="increase(product.id)" class="hover:scale-110">+                                                  
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 96 960 960" width="15">
                                                        <path d="M458 758h46V600h158v-46H504V394h-46v160H298v46h160v158Zm22.45 182q-75.09 0-141.488-28.411-66.399-28.412-116.234-78.188-49.836-49.777-78.282-116.053Q116 651.071 116 575.716q0-75.612 28.47-141.736 28.471-66.123 78.348-116.126 49.878-50.002 116.052-77.928Q405.045 212 480.284 212q75.602 0 141.718 27.891 66.115 27.892 116.13 77.848 50.016 49.957 77.942 116.243Q844 500.268 844 575.634q0 75.366-27.891 141.424-27.892 66.059-77.835 115.996-49.943 49.936-116.211 78.441Q555.795 940 480.45 940Zm-.45-46q132.513 0 225.256-92.744Q798 708.513 798 576t-92.744-225.256Q612.513 258 480 258t-225.256 92.744Q162 443.487 162 576t92.744 225.256Q347.487 894 480 894Zm0-318Z"/>
                                                    </svg> -->
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium" v-text="formatPrice(product.price)"></span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-sm lg:text-base font-medium" v-text="formatPrice(product.price * product.quantity)"></span>
                                    </td>
                                </tr> 
                            </template>
                        </tbody>
                    </table>
                    <hr class="pb-6 mt-6">
                    <div class="my-4 mt-6 -mx-2 lg:flex justify-end">
                        <div class="lg:px-2 lg:w-1/2">
                            <div class="p-4 bg-gray-100 rounded-full">
                                <h1 class="ml-2 font-bold uppercase">Détails de la commande</h1>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between pt-4 border-b">
                                    <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Total
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ cartTotal }}
                                    </div>
                                </div>
                                <a href="/checkout">
                                    <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                                    <span class="ml-2 mt-5px">Passer à la caisse</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import emitter from 'tiny-emitter/instance';
import { onMounted, computed } from 'vue';
import useProduct from '../composables/products';
import { formatPrice } from '@/helpers';

    const cartTotal = computed(()=>{
        let price = Object.values(products.value).reduce((acc, product) => acc += product.price * product.quantity, 0);
        
        return formatPrice(price);
    })

    const {
        products,
        getProducts,
        increaseQuantity,
        decreaseQuantity,
        destroyProduct,
        cartCount
    } = useProduct();

    const increase = async(id) =>{
        await increaseQuantity(id);
        await getProducts();
        emitter.emit('refreshCartCount', cartCount.value);
    }
    const decrease = async(id) =>{
        await decreaseQuantity(id);
        await getProducts();
        emitter.emit('refreshCartCount', cartCount.value);
    }
    
    const destroy = async(id) =>{
        await destroyProduct(id);
        await getProducts();
        emitter.emit('refreshCartCount', cartCount.value);
    }

 onMounted( async () => {
    await getProducts();
 })
</script>