<template>
    <div class="hello">
        <h1>Your IP is {{ Academie_Id.hzopleiding_code }}</h1>
    </div>
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
            this.$http.get("https://apps.hz.nl/Services/algemeen/v1/crohos/34139/opleidingsvarianten").then(result => {
                this.Academie_Id = result.data[0];
                console.log(this.Academie_Id.hzopleiding_code);
            }, error => {
                console.error(error);
            });
        },
    }
</script>