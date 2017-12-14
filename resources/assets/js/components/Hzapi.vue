<template>
    <div class="hello">
        <h1>Your IP is {{ academie_id }}</h1>
    </div>
</template>

<script>
    /*import axios from "axios";*/

    export default {
        name: 'HelloWorld',
        data () {
            return {
                academie_id: []
            }
        },
        mounted() {
            this.$http.get("https://apps.hz.nl/Services/algemeen/v1/crohos/34139/opleidingsvarianten").then(result => {
                this.academie_id = result.data.origin;
                console.log(result.data);
            }, error => {
                console.error(error);
            });
        },
    }
</script>