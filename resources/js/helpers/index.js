export const formatPrice = (price) => {
    return new Intl.NumberFormat('mg-MG', { style: 'currency', currency: 'MGA' }).format(price);
}