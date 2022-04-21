<template>
    <div>
        <nav class="navbar bg-dark">
            <ul class="navbar">               
                 <router-link :to="{ name:'PeopleIndex'}" class="nav-link text-white">People Manager</router-link>
            </ul>
        </nav>
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default{

    }

</script>