<template>
    <div>
        <div v-if="server">
            <h2>Carros da locadora {{server }}</h2>
            <div v-if="cars.carros.length">
                <p>Seus carros são {{cars.carros}}</p>
            </div>
            <h2 v-else> Você ainda não inseriu nenhum carro </h2>
        </div>
        <h2 v-else>Você não selecionou nenhuma locadora.</h2>
    </div>
</template>

<script>
    import bus from '../../../js/dashboard';
    export default {
        name: "Cars",
        data() {
            return {
                server: 0,
                cars: null
            }
        },
        mounted(){
            this.server = bus.info;
            if(this.server){
                axios.get('/api/getCar/'+this.server).then(response=>{
                    this.cars = response.data;
                })
            }
        }
    }
</script>

<style scoped="">

</style>