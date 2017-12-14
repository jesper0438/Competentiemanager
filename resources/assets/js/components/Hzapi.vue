<template>
    <ul id="example-1">
        <li v-for="item in resultaat">
            {{ item.academie_naam }}

        </li>
    </ul>
</template>

<script>
    /*import axios from "axios";*/

    export default {
        name: 'HelloWorld',
        data () {
            return {
                resultaat: []
            }
        },
        mounted() {
            this.$http.get("https://apps.hz.nl/Services/algemeen/v1/opleidingsvarianten").then(result => {
                this.resultaat = result.data;
                console.log(this.resultaat);
            }, error => {
                console.error(error);
            });
        },
    }
</script>