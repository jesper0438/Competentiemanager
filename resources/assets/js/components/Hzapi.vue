<template>
    <!--<ul id="example-1">
        <li v-for="item in resultaat">
           <td>{{ item.academie_naam }}</td>

        </li>
    </ul>-->
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
                console.log(this.resultaat);
            }, error => {
                console.error(error);
            });
        },
    }
</script>