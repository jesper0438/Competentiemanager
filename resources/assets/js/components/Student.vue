<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddStudent()" class="btn btn-primary btn-xs pull-right">
                            + Student toevoegen
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
                                    Emailadres
                                </th>
                                 <th>
                                    Studiepunten
                                </th>
                                <th>
                                    Huidig project
                                </th>
                                <th>
                                    Huidige competenties
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            <tr v-for="(student, index) in students">
                                <td>{{ index + 1 }}</td>
                                <td>{{ student.name }}</td>
                                <td>{{ student.email }}</td>
                                <td>{{ student.amountec }}</td>
                                <td>
                                    {{ student.currentproject }}
                                </td>
                                <td>
                                    {{ student.currentcompetenties }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Bewerk</button>
                                    <button @click="detailsStudent(index)" class="btn btn-primary btn-xs">Bekijk details</button>
                                    <button @click="deleteStudent(index)" class="btn btn-danger btn-xs">Verwijderen</button>
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
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                                   v-model="student.email">
                        </div>
                        <div class="form-group">
                            <label for="amountec">Studiepunten:</label>
                            <input type="text" name="amountec" id="amountec" placeholder="Studiepunten" class="form-control"
                                   v-model="student.amountec">
                        </div>
                        <div class="form-group">
                            <label for="currentproject">Huidig project:</label>
                            <input type="text" name="currentproject" id="currentproject" placeholder="Huidig project" class="form-control"
                                   v-model="student.currentproject">
                        </div>
                        <div class="form-group">
                            <label for="currentcompetenties">Huidige competenties:</label>
                            <input type="text" name="currentcompetenties" id="currentcompetenties" placeholder="Huidige competenties" class="form-control"
                                   v-model="student.currentcompetenties">
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
                            <label>Email:</label>
                            <input type="text" placeholder="Email" class="form-control"
                                   v-model="update_student.email">
                        </div>
                         <div class="form-group">
                            <label>Studiepunten:</label>
                            <input type="text" placeholder="Studiepunten" class="form-control"
                                   v-model="update_student.amountec">
                        </div>
                         <div class="form-group">
                            <label>Huidig project:</label>
                            <input type="text" placeholder="Huidig project" class="form-control"
                                   v-model="update_student.currentproject">
                        </div>
                        <div class="form-group">
                            <label>Huidige competenties:</label>
                            <input type="text" placeholder="Huidige competenties" class="form-control"
                                   v-model="update_student.currentcompetenties">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateStudent" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--Details view -->
              <div class="modal fade" tabindex="-1" role="dialog" id="details_student_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Details</h4>
                    </div>
                    <div class="modal-body">

                        
                        <div class="form-group">
                            <label>Naam:</label>
                            <input type="text" placeholder="Naam" class="form-control"
                                   v-model="details_student.name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" placeholder="Email" class="form-control"
                                   v-model="details_student.email">
                        </div>
                        <div class="form-group">
                            <label>Studiepunten:</label>
                            <input type="text" placeholder="Studiepunten" class="form-control"
                                   v-model="details_student.amountec">
                        </div>
                        <div class="form-group">
                            <label>Huidig project:</label>
                            <input type="text" placeholder="Huidig project" class="form-control"
                                   v-model="details_student.currentproject">
                        </div>
                        <div class="form-group">
                            <label>Huidige competenties:</label>
                            <input type="text" placeholder="Huidig project" class="form-control"
                                   v-model="details_student.currentcompetenties">
                        </div>
                         <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
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
                    email: '',
                    amountec: '',
                    currentproject: '',
                    currentcompetenties: ''
                },
                errors: [],
                students: [],
                details_student: [],
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
                    email: this.student.email,
                    amountec: this.student.amountec,
                    currentproject: this.student.currentproject,
                    currentcompetenties: this.student.currentcompetenties,
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
                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.amountec) {
                            this.errors.push(error.response.data.errors.amountec[0]);
                        }
                        if (error.response.data.errors.currentproject) {
                            this.errors.push(error.response.data.errors.currentproject[0]);
                        }
                        if (error.response.data.errors.currentcompetenties) {
                            this.errors.push(error.response.data.errors.currentcompetenties[0]);
                        }
                    });
            },
            reset()
            {
                this.student.name = '';
                this.student.email = '';
                this.student.amountec = '';
                this.student.currentproject = '';
                this.student.currentcompetenties = '';
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
                    email: this.update_student.email,
                    amountec: this.update_student.amountec,
                    currentproject: this.update_student.currentproject,
                    currentcompetenties: this.update_student.currentcompetenties,
                })
                    .then(response => {

                        $("#update_student_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.amountec) {
                            this.errors.push(error.response.data.errors.amountec[0]);
                        }
                        if (error.response.data.errors.currentproject) {
                            this.errors.push(error.response.data.errors.currentproject[0]);
                        }
                        if (error.response.data.errors.currentcompetenties) {
                            this.errors.push(error.response.data.errors.currentcompetenties[0]);
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
            },
            //detailsoverzicht
             initShowStudent()
            {
                $("#details_student_model").modal("show");
            },
            showStudents()
            {
                axios.get('/student')
                    
            },
            detailsStudent(index)
            {
                
                $("#details_student_model").modal("show");
                this.details_student = this.students[index];
            },
        }
    }
</script>