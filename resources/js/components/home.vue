<template>
    <div class="container">
    <title>exportDATA | Web to Excel</title>
    <div class="mt-4">
            <div class="jumbotron bg-dark col-md-10 offset-md-1">
                    <div class="card card-body bg-dark" v-for="(user,index) in users" :key="index">
                            <h5>
                            <span class="badge badge-success mb-3 float-left">Data {{index+1}}</span>
                            <span style="cursor:pointer" class="float-right badge badge-danger mb-3" @click="deleteData(index)">X</span>
                            </h5>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="email" class="text-white">Username:</label>
                                    <input type="text" class="form-control" id="username" v-model="user.username" name="username">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pwd" class="text-white">Password:</label>
                                    <input type="password" class="form-control" id="password" v-model="user.password" name="password">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pwd" class="text-white">Phone Number:</label>
                                    <input type="text" class="form-control" id="phone" v-model="user.phone" name="phone">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pwd" class="text-white">Email</label>
                                    <input type="email" class="form-control" id="email" v-model="user.email" name="email">
                                </div>
                            </div>
                    </div> 
                 <br>
                    <button class="btn btn-secondary w-25 float-left mb-3"  @click="addMoreData()" title="Click to add row"><span class="fa fa-plus-square"></span> &nbsp;Add more data</button>
                    <button class="btn btn-primary w-25 float-right" @click="submitData()" title="Click to add row">Submit</button>
            </div>

            <div class="jumbotron bg-dark col-md-10 offset-md-1 table-responsive">
                <table class="table table-dark table-bordered">
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="(data,index) in datas" v-bind:key="index">
                        <td>{{index+1}}</td>
                        <td>{{data.username}}</td>
                        <td>{{data.password}}</td>
                        <td>{{data.email}}</td>
                        <td>{{data.phone}}</td>
                        <td class="text-center"><a style="color:red;cursor:pointer" @click="deleteSingleData(data.username)"><i class="fa fa-trash fa-sm"></i></a></td>
                    </tr>
                </tbody>
                </table>
                <button class="btn btn-success col-md-6 offset-md-3 p-3 mt-2" @click="exportExcel()"><span class="fa fa-plus-square"></span> &nbsp;Export to Microsoft Excel</button>
            </div> 
    </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{  
                users: [{
                    username:'',
                    password:'',
                    phone:'',
                    email:''
                }],
                datas:[]
          }
        },
        methods:{
            deleteSingleData($data){
                swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this data",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => { 
                        if (result.value){
                            this.$Progress.start();
                            axios.post('/api/data/deleteSingleData/'+$data).then(()=>{
                            this.$Progress.finish();
                            swal.fire('Success!','Your data has been deleted.','success').then(function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                } else {
                                    //if no clicked => do something else
                                }
                                })
                        }).catch(()=>{
                            swal.fire("Failed!","There was something wrong","warning");

                        });
                        }
                        else if (result.dismiss === swal.DismissReason.cancel){
                            
                        }
                })             
            },
            getAllData(){
                axios.get('/api/data/getAllData').then(response => this.datas = response.data.data);
            },
            exportExcel(){
                axios({
                url: '/api/data/exportExcel',
                method: 'GET',
                responseType: 'blob', // important
                }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'file.xls ');
                document.body.appendChild(link);
                link.click();
                });
            },
            addMoreData(){
                this.users.push({
                    username: '', 
                    password: '' , 
                    email: '',
                    phone:''
                    });
            },
            deleteData(index){
                this.users.splice(index,1)  
            },
            submitData(){
              swal.fire({
              title: 'Are you sure?',
              text: "Make sure your data are correct!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
              }).then((result) => { 
                 if (result.value){
                    this.$Progress.start();
                    axios.post('/api/data', this.users).then(()=>{
                    this.$Progress.finish();
                    swal.fire('Success!','Your data has been saved.','success').then(function(isConfirm) {
                        if (isConfirm) {
                            location.reload();
                        } else {
                            //if no clicked => do something else
                        }
                        })
                  }).catch(()=>{
                    swal.fire("Failed!","There was something wrong","warning");

                  });
                 }
                 else if (result.dismiss === swal.DismissReason.cancel){
                    
                  }
              }) 
          }
        },
        mounted() {
            this.getAllData();
            console.log('Component mounted.')
        }
    }
</script>