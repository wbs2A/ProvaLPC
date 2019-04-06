<template>
    <div>

        <div class="loading center" v-if="loading" >
            <div class="hollow-dots-spinner">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <div v-if="error" class="error">
            <h3>{{ error }}</h3><br>
            Não foi possível carregar os carros
        </div>

        <div v-if="server">
            <div class="row"><h3 class="col" style="font-family: jediFont">locadora <i>{{name }}</i></h3> <div class="cars_panel offset-2"><button class="btn btn-success" style="float: right"> <i class="fas fa-plus"></i>Adicionar carros</button></div></div>
            <br>
            <div v-if="cars.length">
                <ul id="example-1">
                    <li v-for="(item, id) in cars">
                        <card-car :car="item" :id="id" :user="12345678911" :quant-dias="5" :data-entrega="'2019/04/08'" :local-entrega="1" :data-retirada="'2019/04/05'" :local-retirada="1"></card-car><br>
                    </li>
                </ul>
            </div>
            <h2 v-else> Você ainda não inseriu nenhum carro </h2>
        </div>
        <h2 v-else> Você não selecionou nenhuma locadora</h2>
    </div>
</template>

<script>
    import bus from '../../../js/dashboard';
    import CardCar from "./CardCar";

    export default {
        name: "Cars",
        components: {CardCar},
        data() {
            return {
                server: 0,
                cars: null,
                name: '',
                error: null,
                loading: true
            }
        },
        mounted(){
            this.server = bus.info;
            this.name = bus.name;
            if(this.server){
                axios.get('/api/getCar/'+this.server).then(response=>{
                    console.log(this.server);
                    this.cars = response.data;
                    this.loading = false;
                })
            }else{
                this.loading = false;
            }
        }
    }
//
</script>

<style scoped="">
.cars_panel{
    float: right;
}

@font-face {
    font-family: jediFont;
    src: url("../../fonts/Starjedi.ttf");

}

.hollow-dots-spinner, .hollow-dots-spinner * {
    box-sizing: border-box;
}

.hollow-dots-spinner {
    height: 15px;
    width: calc(30px * 3);
}

.hollow-dots-spinner .dot {
    width: 15px;
    height: 15px;
    margin: 0 calc(15px / 2);
    border: calc(15px / 5) solid rgba(0, 0, 0, 0.57);
    border-radius: 50%;
    float: left;
    transform: scale(0);
    animation: hollow-dots-spinner-animation 1000ms ease infinite 0ms;
}

.hollow-dots-spinner .dot:nth-child(1) {
    animation-delay: calc(300ms * 1);
}

.hollow-dots-spinner .dot:nth-child(2) {
    animation-delay: calc(300ms * 2);
}

.hollow-dots-spinner .dot:nth-child(3) {
    animation-delay: calc(300ms * 3);

}

@keyframes hollow-dots-spinner-animation {
    50% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
</style>