<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddVakexpert()" class="btn btn-primary btn-xs pull-right">
                            + Add New Vakexpert
                        </button>
                        My Vakexperts
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="vakexperts.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Competentie
                                </th>
                                <th>
                                    Action
                                </th>
                                <th>
                                    Description
                                </th>
                            </tr>
                            <tr v-for="(vakexpert, index) in vakexperts">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ vakexpert.name }}
                                </td>
                                <td>
                                    {{ vakexpert.competentie }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Edit</button>
                                    <button class="btn btn-danger btn-xs">Delete</button>
                                </td>
                                <th>
                                    {{ vakexpert.description }}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add_vakexpert_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Vakexpert</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Vakexpert Name" class="form-control"
                                   v-model="vakexpert.name">
                        </div>
                        <div class="form-group">
                            <label for="competentie">Competentie:</label>
                            <textarea name="competentie" id="competentie" cols="30" rows="5" class="form-control"
                                      placeholder="Vakexpert Competentie" v-model="vakexpert.competentie"></textarea>
                        </div>
                    </div>
                     <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                                      placeholder="Vakexpert Description" v-model="vakexpert.description"></textarea>
                        </div>
                         <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createVakexpert" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="update_vakexpert_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Vakexpert</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" placeholder="Vakexpert Name" class="form-control"
                                   v-model="update_vakexpert.name">
                        </div>
                        <div class="form-group">
                            <label for="competentie">Competentie:</label>
                            <textarea cols="30" rows="5" class="form-control"
                                      placeholder="Vakexpert Competentie" v-model="update_vakexpert.competentie"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateVakexpert" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea cols="30" rows="5" class="form-control"
                                      placeholder="Vakexpert Description" v-model="update_vakexpert.description"></textarea>
                        </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</template>

<script>
    export default {
        data(){
            return {
                vakexpert: {
                    name: '',
                    competentie: '',
                    description: '',
                },
                errors: [],
                vakexperts: [],
                update_vakexpert: {}
            }
        },
        mounted()
        {
            this.readVakexperts();
        },
        methods: {
            initAddVakexpert()
            {
                $("#add_vakexpert_model").modal("show");
            },
            createVakexpert()
            {
                axios.post('/vakexpert', {
                    name: this.vakexpert.name,
                    competentie: this.vakexpert.competentie,
                    description: this.vakexpert.description,
                })
                    .then(response => {

                        this.reset();

                        this.vakexperts.push(response.data.vakexpert);

                        $("#add_vakexpert_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.competentie) {
                            this.errors.push(error.response.data.errors.competentie[0]);
                        }

                        if (error.response.data.errors.description) {
                            this.errors.push(error.response.data.errors.description[0]);
                        }
                    });
            },
            reset()
            {
                this.vakexpert.name = '';
                this.vakexpert.competentie = '';
                this.vakexpert.description = '';
            },
            readVakexperts()
            {
                axios.get('/vakexpert')
                    .then(response => {

                        this.vakexperts = response.data.vakexperts;

                    });
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_vakexpert_model").modal("show");
                this.update_vakexpert = this.vakexperts[index];
            },
            updateVakexpert()
            {
                axios.patch('/vakexpert/' + this.update_vakexpert.id, {
                    name: this.update_vakexpert.name,
                    competentie: this.update_vakexpert.competentie,
                    description: this.update_vakexpert.description,
                })
                    .then(response => {

                        $("#update_vakexpert_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.competentie) {
                            this.errors.push(error.response.data.errors.competentie[0]);
                        }

                        if (error.response.data.errors.description) {
                            this.errors.push(error.response.data.errors.description[0]);
                        }
                    });
            }
        },
                    deleteVakexpert(index)
            {
                let conf = confirm("Do you ready want to delete this vakexpert?");
                if (conf === true) {

                    axios.delete('/vakexpert/' + this.vakexperts[index].id)
                        .then(response => {

                            this.vakexperts.splice(index, 1);

                        })
                        .catch(error => {

                        });
                }
            }
    }
</script>