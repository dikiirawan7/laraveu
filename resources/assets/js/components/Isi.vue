<template>
    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addPost">
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
                <button class="btn btn-primary" >Create</button>
            </div>
        </form>
    </div>
</template>
<script>
// import '../../../../node_modules/jquery/dist/jquery.min.js';
    export default{
       data(){
           return{
               post:{}
           }
       }
       //membuat validasi dengan jquery
        //mounted(){
        //    $('#tambah').on('click',function(){
        //  var judul = $('#title').val();
        //  if(judul==''){
        //      alert('isi Judul Terlebih dahulu');
        //      }
//
        //  });
       //}
       ,
       methods:{
           addPost(){
               var judul= this.post.title;
               var body= this.post.body;
               if(!judul){
                    this.$swal.fire({
                        type: 'error',
                        title: 'Title Kosong',
                        text: 'Title tidak boleh kosong!'
                        });
               }
               else if(!body){
                   this.$swal.fire({
                        type: 'error',
                        title: 'Body Kosong',
                        text: 'Body tidak boleh kosong!'
                        });
               }
               else{
               
               let uri='http://localhost:8000/api/post/create';
               this.axios.post(uri,this.post).then((response)=>{
                   
                   this.$swal.fire(
                    'Artikel Tersimpan!',
                    'You clicked the button!',
                    'success'
                    ).then(response=>{
                   this.$router.push({name:'posts'});
               });

                 //untuk reload location
               }).then(response=>{
                   
               });
               
               ;

               }
           }
       }
    }

</script>