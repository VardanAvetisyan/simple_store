// Vue.use('vue-resource');

var product = new Vue({
    el: '#app',
    data: {
        products: [],
        itemsInCard: 0
    },
    methods: {
        toCard: function(e) {
            var element = e.target.parentNode.querySelector('input[name="id"]');
            var row = document.querySelector('#product_' + element.value);
            var productName = row.querySelector('.name').innerText;
            var qty = row.querySelector('input[name=qty]').value;
            var csrf_token = document.querySelector('#csrf_token').value;
            var data = {
                name: productName,
                qty: qty,
                id: element.value
            };

            this.products.push(data);
            this.itemsInCard = this.products.length;

            // this.$http.post('index.php/order', {
            //     params: {...data, csrf_token}
            // });
        }
    }
});
