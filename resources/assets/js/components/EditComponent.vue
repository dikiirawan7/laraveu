<template>
    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="updatePost">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Post Title :</label>
                        <input type="text"  class="form-control" v-model="post.title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Post Body:</label>
                        <textarea  rows="5" class="form-control" v-model="post.body"></textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            post:{}
        }
    },
    created(){
        let uri =   `http://localhost:8000/api/post/edit/${this.$route.params.id}`;
        axios.get(uri).then((response)=>{
            this.post   =   response.data;
        });
    },
    methods:{
        updatePost(){
            let uri =   `http://localhost:8000/api/post/update/${this.$route.params.id}`;
           
            axios.post(uri,this.post).then((response)=>{
                   this.$router.push({name:'posts'});//untuk reload location
            });
        }
    }
}
</script>
