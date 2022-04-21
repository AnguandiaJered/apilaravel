<template>
    <div class="container">
            <div class="form-group m-2">
                <router-link :to="{ name:'PeopleCreate'}" class="btn btn-primary">New</router-link>
            </div>
       <table class="table table-bordered table-striped mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Gander</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                   <tr v-for="(item,index) of peopleList">
                    <td>{{item.id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.phone}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.gander}}</td>
                    <td>
                        <router-link :to="{ name:'PeopleEdit',params:{peopleId:item.id}}" class="btn btn-primary">Edit</router-link>
                        
                         <a href="#" @click="deletePersonn(item.id)" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            </tbody>
       </table>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                peopleList:[]
            }
        },
        created(){
            this.getAll();
        },
        methods:{
            getAll(){
                this.axios.get('http://127.0.0.1:8000/api/personne').then(res =>{
                    this.peopleList= res.data;
                }).catch(error => {
                    console.log(error)
                });
            },
            deletePersonn(personId){
                  this.axios.delete(`http://127.0.0.1:8000/api/personne/${personId}`).then(res =>{
                    let i = this.peopleList.map(data => data.id).indexOf(personId);
                    this.peopleList.splice(i,1);
                })
            }
        }
    }
</script>
