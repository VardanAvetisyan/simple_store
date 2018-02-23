Vue.use('vue-resource');

var app = new Vue({
    el: '#app',
    data: {
        showProductList: 0
    },
    methods: {
        deleteProductFromList: function(e) {
            var form = e.target.parentNode;
            var action = form.action;
            var elems = form.elements;

            this.$http.post(action, {
                params: {
                    id: elems['id'].value,
                    _token: elems['_token'].value
                }
            })
        }
    }

})