<template>
    <ul id="example-1">
        <li v-for="item in Academie_Id">
            {{ item.hzopleiding_code }}
        </li>
    </ul>
</template>

<script>
    /*import axios from "axios";*/

    export default {
        name: 'HelloWorld',
        data () {
            return {
                Academie_Id: []
            }
        },
        mounted() {
            this.$http.get("https://apps.hz.nl/Services/algemeen/v1/opleidingsvarianten").then(result => {
                this.Academie_Id = result.data;
                console.log(this.Academie_Id.hzopleiding_code);
            }, error => {
                console.error(error);
            });
        },
    }
</script>