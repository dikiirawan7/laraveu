<template>
    <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="padding:0;">
        <ul class="navbar-nav">
            <li class="nav-item">
            <router-link to="/latihan" class="nav-link">Home</router-link>    
            </li>
            <li class="nav-item">
            <router-link to="/create" class="nav-link" >Create</router-link>
            </li>
            <li class="nav-item">
            <router-link to="/post" class="nav-link" >Post</router-link>
            </li>
        </ul>

    </nav>

        <transition name="fade">
            <router-view></router-view>
        </transition>
        
        <div class="okee">
        </div>
    </div>
           
</template>

<style>
.navbar-nav{
    padding:0 10px;
    
}
.nav-link{
    padding:20px 0;
    
}
 .active {
 background-color:antiquewhite;
 color:black !important;
 
}
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
       mounted(){
           $('.okee').text('ini jquery berhasil ditambahkan');
       }
    }
</script>