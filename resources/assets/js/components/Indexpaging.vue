<template>
    <div>
        <h1>Posts</h1>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <router-link :to="{name:'create'}" class="btn btn-primary">Create Post</router-link>
                </div>
            </div>
            <br/>
            <h2>Jumlah: {{posts.length}}</h2>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody v-for="(post,oke) in posts" :key="post.id" >
                    
                    <tr >
                        <td v-on:click="gb(oke) ">{{oke+1}}</td>
                        <td v-on:click="gb(oke) ">{{post.title}}</td>
                        <td v-on:click="gb(oke) ">{{post.body}}</td>
                        <td><router-link :to="{name:'edit',params:{id:post.id}}" class="btn btn-primary">Edit</router-link>
                        <button @click.prevent="deletePost(post.id,oke)" class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr v-show="post.tampil">
                        <td colspan="4">
                            <div >
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">{{post.title}}</div>

                                                <div class="card-body">
                                                    {{post.body}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
                
                
            </table>

            <pagination 
                        :meta_data="meta_data"
                        v-on:next="fetchUsers">
                    </pagination>
                    {{lain.terserah}}
 
        <p style="display:none">{{salah.text}}</p>
    </div>
    

</template>


<script>
import NProgress from 'nprogress';
import '../../../../node_modules/nprogress/nprogress.css';
import Pagination from './pagination.vue';
export default {
    components: {
       Pagination
    },
    
    
        data(){
            return{
                posts:[],
                salah:{
                    text:false
                },
                meta_data:{
                    last_page:null,
                    current_page:1,
                    prev_page_url:null
                },
                lain:{
                    terserah:"oke"
                }

            }
        },
        mounted(){
            this.fetchUsers();
        },
        methods:{
            fetchUsers(page=1){
                axios.get('http://localhost:8000/api/post/paging/',{
                    params:{
                        page
                    }
                }).then(response=>{
                this.posts = response.data.data;
                this.lain.terserah= response.data.meta.last_page;
                this.meta_data.last_page = response.data.meta.last_page;
                this.meta_data.current_page = response.data.meta.current_page;
                this.meta_data.prev_page_url = response.data.meta.prev_page_url;

            });
            },
           gb:function(idx){
               
               var ko=this.posts[idx];           
               var l=!this.salah.text;
               ko.tampil=!ko.tampil;
               this.salah.text=l;
               if(ko.tampil==true){
                   ko.tampil=true;
               }
               else{
                   ko.tampil=false;
               }

               //alert(ko.title);
               //alert(id);
               //alert(l);

               
           },
           deletePost(id,oke){
               let uri = `http://localhost:8000/api/post/delete/${id}`;
               this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.axios.delete(uri).then(response=>{
                                NProgress.start();
                            //ini untuk menghapus data di front end   this.posts.splice(oke,1);
                            this.$swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                ).then(response=>{
                                   this.$delete(this.posts, oke);
                                    });

                            }).then(response => { 
                                NProgress.done();
                                });
                        }
                    })
               
           }
        }
    
}
</script>
