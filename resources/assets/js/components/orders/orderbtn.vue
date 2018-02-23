<template>
    <button class="btn btn-success" v-on:click="toCard">Order</button>
</template>
<script>
    export default {
        data(){
            return {
               products: [],
               itemsInCard: 0,
               userorderurl: ''
            };
        },
        methods:  {
          toCard(e) {
              var element = e.target.parentNode.querySelector('input[name="id"]');
              var row = document.querySelector('#product_' + element.value);
              var productName = row.querySelector('.name').innerText;
              var qty = row.querySelector('input[name=qty]').value;
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

    }
</script>