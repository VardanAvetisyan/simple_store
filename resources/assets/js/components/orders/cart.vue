<template>
    <div>
        <div class="raw">
            <div class="col-md-12">
                <form  method="post" :action="$props.action">
                    <input type="hidden" name="_token" id="csrf_token" :value="$props.token" />
                    <input type="hidden" :name="'product['+index+']'" v-for="(product, index) in products" v-model="product.name"/>
                    <input type="hidden" :name="'id['+index+']'" v-for="(product, index) in products" v-model="product.id"/>
                    <input type="hidden" :name="'qty['+index+']'" v-for="(product, index) in products" v-model="product.qty"/>
                    <input type="submit" class="btn" :value="itemsInCard"/>
                </form>
            </div>
        </div>
        <h1>Store</h1>
        <table class="table">
            <thead>
            <tr>
                <th width="*">Product</th>
                <th width="10%">Price</th>
                <th width="10%">Qty</th>
                <th width="20%">Action</th>
            </tr>
            </thead>
                <tr v-for="item in productlist" :id="'product_'+item.id">
                    <td><span class="name">{{ item.name }}</span></td>
                    <td>${{ item.price }}</td>
                    <td>
                        <div class="form-group">
                            <input name="qty" value="1" class="form-control"/>
                        </div>
                    </td>
                    <td>
                        <input type="hidden" :value="item.id" name="id" />
                        <button class="btn btn-success" v-on:click="toCard">Order</button>
                    </td>
                </tr>
        </table>
    </div>
</template>
<script>
    export default {
        data(){
            return {
               userorderurl: '#',
               products: [],
               productlist: [],
               itemsInCard: 'Cart',
               userorderurl: ''
            };
        },
        mounted: function () {
          this.$nextTick(function () {
            console.log(this.props);
            axios.get('/product-list')
            .then(response => {
                this.productlist = response.data;
            });
          })
        },
        methods: {
            toCard(e) {
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
                  this.itemsInCard = 'Cart ('+ this.products.length + ")";

                  // this.$http.post('index.php/order', {
                  //     params: {...data, csrf_token}
                  // });
              }
        },
        props: ['action', 'token']
    }
</script>
