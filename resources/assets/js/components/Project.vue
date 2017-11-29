<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddProject()" class="btn btn-primary btn-xs pull-right">
                            + Add New Project
                        </button>
                        My projects
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="projects.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Opdrachtgever
                                </th>
                                <th>
                                    Uitvoerlocatie
                                </th>
                                <th>
                                    Doel
                                </th>
                                <th>
                                    Competenties
                                </th>
                                <th>
                                    Maxleden
                                </th>
                            </tr>
                            <tr v-for="(project, index) in projects">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ project.opdrachtgever }}
                                </td>
                                <td>
                                    {{ project.uitvoerlocatie }}
                                </td>
                                <td>
                                    {{ project.doel }}
                                </td>
                                <td>
                                    {{ project.competenties }}
                                </td>
                                <td>
                                    {{ project.maxleden }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Edit</button>
                                    <button @click="deleteProject(index)" class="btn btn-danger btn-xs">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add_project_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Project</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="opdrachtgever">Opdrachtgever:</label>
                            <input type="text" name="opdrachtgever" id="opdrachtgever" placeholder="OF naam" class="form-control"
                                   v-model="project.opdrachtgever">
                        </div>
                        <div class="form-group">
                            <label for="uitvoerlocatie">Uitvoerlocatie:</label>
                            <input type="text" name="uitvoerlocatie" id="uitvoerlocatie" placeholder="uitvoerlocatie" class="form-control"
                                   v-model="project.uitvoerlocatie">
                        </div>
                        <div class="form-group">
                            <label for="doel">Doel:</label>
                            <input type="text" name="doel" id="doel" placeholder="Doel" class="form-control"
                                   v-model="project.doel">
                        </div>
                        <div class="form-group">
                            <label for="competenties">Competenties:</label>
                            <input type="text" name="competenties" id="competenties" placeholder="competenties" class="form-control"
                                   v-model="project.competenties">
                        </div>
                        <div class="form-group">
                            <label for="maxleden">Maxleden:</label>
                            <textarea name="maxleden" id="maxleden" cols="30" rows="5" class="form-control"
                                      placeholder="Max leden" v-model="project.maxleden"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createProject" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="update_project_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Project</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Opdrachtgever:</label>
                            <input type="text" placeholder="opdrachtgever" class="form-control"
                                   v-model="update_project.opdrachtgever">
                        </div>
                        <div class="form-group">
                            <label>Uitvoerlocatie:</label>
                            <input type="text" placeholder="uitvoerlocatie" class="form-control"
                                   v-model="update_project.uitvoerlocatie">
                        </div>
                        <div class="form-group">
                            <label>Doel:</label>
                            <input type="text" placeholder="doel" class="form-control"
                                   v-model="update_project.doel">
                        </div>
                        <div class="form-group">
                            <label>Competenties:</label>
                            <input type="text" placeholder="competenties" class="form-control"
                                   v-model="update_project.competenties">
                        </div>
                        <div class="form-group">
                            <label>Maxleden:</label>
                            <input type="text" placeholder="maxleden" class="form-control"
                                   v-model="update_project.maxleden">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateProject" class="btn btn-primary">Submit</button>
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
                project: {
                    opdrachtgever: '',
                    uitvoerlocatie: '',
                    doel: '',
                    competenties: '',
                    maxleden: '',
                },
                errors: [],
                projects: [],
                update_project: {}
            }
        },
        mounted()
        {
            this.readProjects();
        },
        methods: {
            initAddProject()
            {
                $("#add_project_model").modal("show");
            },
            createProject()
            {
                axios.post('/project', {
                    opdrachtgever: this.project.opdrachtgever,
                    uitvoerlocatie: this.project.uitvoerlocatie,
                    doel: this.project.doel,
                    competenties: this.project.competenties,
                    maxleden: this.project.maxleden,
                })
                    .then(response => {

                        this.reset();

                        this.projects.push(response.data.project);

                        $("#add_project_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.opdrachtgever) {
                            this.errors.push(error.response.data.errors.opdrachtgever[0]);
                        }
                        if (error.response.data.errors.uitvoerlocatie) {
                            this.errors.push(error.response.data.errors.uitvoerlocatie[0]);
                        }
                        if (error.response.data.errors.doel) {
                            this.errors.push(error.response.data.errors.doel[0]);
                        }
                        if (error.response.data.errors.competenties) {
                            this.errors.push(error.response.data.errors.competenties[0]);
                        }
                        if (error.response.data.errors.maxleden) {
                            this.errors.push(error.response.data.errors.maxleden[0]);
                        }
                    });
            },
            reset()
            {
                this.project.opdrachtgever = '';
                this.project.uitvoerlocatie = '';
                this.project.doel = '';
                this.project.competenties = '';
                this.project.maxleden = '';
            },
            readProjects()
            {
                axios.get('/project')
                    .then(response => {

                        this.projects = response.data.projects;

                    });
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_project_model").modal("show");
                this.update_project = this.projects[index];
            },
            updateProject()
            {
                axios.patch('/project/' + this.update_project.id, {
                    opdrachtgever: this.project.opdrachtgever,
                    uitvoerlocatie: this.project.uitvoerlocatie,
                    doel: this.project.doel,
                    competenties: this.project.competenties,
                    maxleden: this.project.maxleden,
                })
                    .then(response => {

                        $("#update_project_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.opdrachtgever) {
                            this.errors.push(error.response.data.errors.opdrachtgever[0]);
                        }
                        if (error.response.data.errors.uitvoerlocatie) {
                            this.errors.push(error.response.data.errors.uitvoerlocatie[0]);
                        }
                        if (error.response.data.errors.doel) {
                            this.errors.push(error.response.data.errors.doel[0]);
                        }
                        if (error.response.data.errors.competenties) {
                            this.errors.push(error.response.data.errors.competenties[0]);
                        }
                        if (error.response.data.errors.maxleden) {
                            this.errors.push(error.response.data.errors.maxleden[0]);
                        }
                    });
            },
                        deleteProject(index)
            {
                let conf = confirm("Do you ready want to delete this project?");
                if (conf === true) {

                    axios.delete('/project/' + this.projects[index].id)
                        .then(response => {

                            this.projects.splice(index, 1);

                        })
                        .catch(error => {

                        });
                }
            }
        }
    }
</script>