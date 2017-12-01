<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddStudent()" class="btn btn-primary btn-xs pull-right">
                            + Add New Student
                        </button>
                        Studentenoverzicht
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="students.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th> Naam
                                </th>
                                <th>
                                    Huidig project
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            <tr v-for="(student, index) in students">
                                <td>{{ index + 1 }}</td>
                                <td>{{ student.name }}</td>
                                <td>
                                    {{ student.currentproject }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Edit</button>
                                    <button @click="deleteStudent(index)" class="btn btn-danger btn-xs">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add_student_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Student</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Naam:</label>
                            <input type="text" name="name" id="name" placeholder="Naam" class="form-control"
                                   v-model="student.name">
                        </div>
                        <div class="form-group">
                            <label for="currentproject">Huidig project:</label>
                            <input type="text" name="currentproject" id="currentproject" placeholder="Huidig project" class="form-control"
                                   v-model="student.currentproject">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createStudent" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="update_student_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Student</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Naam:</label>
                            <input type="text" placeholder="Naam" class="form-control"
                                   v-model="update_student.name">
                        </div>
                        <div class="form-group">
                            <label>Huidig project:</label>
                            <input type="text" placeholder="Huidig project" class="form-control"
                                   v-model="update_student.currentproject">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateStudent" class="btn btn-primary">Submit</button>
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
                student: {
                    name: '',
                    currentproject: '',
                },
                errors: [],
                students: [],
                update_student: {}
            }
        },
        mounted()
        {
            this.readStudents();
        },
        methods: {
            initAddStudent()
            {
                $("#add_student_model").modal("show");
            },
            createStudent()
            {
                axios.post('/student', {
                    name: this.student.name,
                    currentproject: this.student.currentproject,
                })
                    .then(response => {

                        this.reset();

                        this.students.push(response.data.student);

                        $("#add_student_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.currentproject) {
                            this.errors.push(error.response.data.errors.currentproject[0]);
                        }
                    });
            },
            reset()
            {
                this.student.name = '';
                this.student.currentproject = '';
            },
            readStudents()
            {
                axios.get('/student')
                    .then(response => {

                        this.students = response.data.students;

                    });
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_student_model").modal("show");
                this.update_student = this.students[index];
            },
            updateStudent()
            {
                axios.patch('/student/' + this.update_student.id, {
                    name: this.update_student.name,
                    currentproject: this.update_student.currentproject,
                })
                    .then(response => {

                        $("#update_student_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.currentproject) {
                            this.errors.push(error.response.data.errors.currentproject[0]);
                        }
                    });
            },
            deleteStudent(index)
            {
                let conf = confirm("Do you ready want to delete this student?");
                if (conf === true) {

                    axios.delete('/student/' + this.students[index].id)
                        .then(response => {

                            this.students.splice(index, 1);

                        })
                        .catch(error => {

                        });
                }
            }
        }
    }
</script>