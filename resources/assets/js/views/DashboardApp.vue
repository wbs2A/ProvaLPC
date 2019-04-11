<template>
    <div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <router-link :to="{name: 'home'}" class="nav-link active" id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-home" aria-selected="true"> Minha Conta</router-link>
            </li>
<!--            <li class="nav-item">
                <router-link :to="{name:'comments'}" class="nav-link" id="pills-comments-tab" data-toggle="pill"  role="tab" aria-controls="pills-comments" aria-selected="true"> Minhas Avaliações </router-link>
            </li>-->
            <li class="nav-item">
                <router-link :to="{name:'reservations'}" class="nav-link" id="pills-reserv-tab" data-toggle="pill" role="tab" aria-controls="pills-reserv" aria-selected="true"> Minhas Reservas </router-link>
            </li>
        </ul>
        <div class="tab-pane tab-content" id="pills-tabContent">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {}
</script>