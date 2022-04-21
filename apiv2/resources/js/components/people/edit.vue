<template>
    <div class="container">
    <div class="form-group m-2">
        <router-link :to="{ name:'PeopleIndex'}" class="btn btn-primary">Back</router-link>
    </div>
       <form>
            <div class="form-group">
                <label>Name</label>
                <input type='text' class="form-control" v-model='person.name'/>
            </div>
              <div class="form-group">
                <label>Phone number</label>
                <input type='tel' class="form-control" v-model='person.phone'/>
            </div>
              <div class="form-group">
                <label>Email</label>
                <input type='email' class="form-control" v-model='person.email'/>
            </div>
              <div class="form-group">
                <label>Gander</label>
                <input text='' class="form-control" v-model='person.gander'/>
            </div>
             <div class="form-group">               
                <button class="btn btn-primary mt-2" @click="updatePerson()">Modifier</button>
            </div>
       </form>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                person:{}
            }
        },
       mounted(){
             this.axios.get(`http://127.0.0.1:8000/api/personne/${this.$route.params.peopleId}`,this.person).then(res =>{
                    this.person= res.data;
                }).catch(error => {
                    console.log(error)
                });
       },
        methods:{
            updatePerson(){
                this.axios.put(`http://127.0.0.1:8000/api/personne/update/${this.$route.params.peopleId}`,this.person).then(res =>{
                    this.$router.push({ name:'PeopleIndex'});
                }).catch(error => {
                    console.log(error)
                });
            }
        }
    }

</script>