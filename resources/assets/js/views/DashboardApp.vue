<template>
    <div>
        <h1> Painel de usuário</h1>

        <p>
            <router-link :to="{name: 'home'}"> Inicio</router-link>
            <router-link :to="{name:'options'}"> Opções </router-link>
        </p>
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {}
</script>