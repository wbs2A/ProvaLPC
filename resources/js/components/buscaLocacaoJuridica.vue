<template>
  <div class="col header-right ">
      <h4 class="text-white pb-30">Sua(s) locadora(s) <b>oferecem</b>!</h4>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" v-for="(item, id) in carros">
                    <li data-target="#carousel-example-generic" :data-slide-to="id" :class="{active: id==0}"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item align-self-center" v-for="(it, id) in carros" :class="{active: id==0}"  >
                        <img v-for="(img,idx) in it.imagens.slice(0,1)" v-if="it.imagens.length" :src="'../../../'+img.caminho" :alt="it.carro.nome" class="img-fluid mx-auto d-block col-7">
                        <div v-if="!it.imagens.length" class="col"  style="height: 200px;">
                            <h5>Este veículo não tem imagens</h5>
                        </div>
                        <div class="carousel-caption">
                            <h3 style="color: #fab700;">
                                {{it.carro.nome}}</h3>
                            <p style="color: #fab700;">
                                {{it.classificacao.tipo}}</p>
                        </div>
                    </div>
                    
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
  </div>
</template>

<style scoped="">
</style>
<script>
import Cars from '../../assets/js/views/CardCar'
export default {
	props:['cars'],
	components: {
		cardcar : Cars
   	},
   	data() {
   		return{
   			carros: this.cars
   		}
   	}
}
</script>