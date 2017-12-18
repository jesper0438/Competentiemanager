<template>
    <!--<ul id="example-1">
        <li v-for="item in resultaat">
           <td>{{ item.academie_naam }}</td>

        </li>
    </ul>-->
    <!--To perform GEt-requests to this public endpoint, you need a browser-plugin like CORS-Everywhere. The endpoint is protected for cors-request -->
    <div class="panel-body">
        <table class="table table-bordered table-condensed  table-responsive" v-if="resultaat.length > 0">
            <tbody>
            <tr class="info">
                <th>
                    ID
                </th>
                <th>
                    lijstnaam
                </th>
                <th>
                    Opties
                </th>
            </tr>
            <tr class="info" v-for="item in resultaat">
                <td>
                    {{ item.id }}
                </td>
                <td>
                    {{ item.lijstnaam }}
                </td>
                <td>
                    {{ item.academie_naam }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    /*import axios from "axios";*/

    export default {
        name: 'APIcall',
        data () {
            return {
                resultaat: []
            }
        },
        mounted() {
            this.$http.get("https://apps.hz.nl/Services/algemeen/v1/opleidingsvarianten").then(result => {
                this.resultaat = result.data;
                //Indien API-call succesvol is, retourneer de volgende melding
                console.log("API-Call succesvol");
                //In geval van error, retourneer onderstaande error
            }, error => {
                console.error(error);
            });
        },
    }
</script>