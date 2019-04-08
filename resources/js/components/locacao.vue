<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3 col-sm-3 col-md-3  p-0">
				<div class="card">
					  <div class="card-header">
					    <h4 class="card-title ">Alugue seu carro <b>agora</b>!</h4>
					  </div>
				  <div class="card-body">
            			<buscalocacao style="color: black !important;" :mycategorias='categorias'></buscalocacao>
				  </div>
				</div>
				<div class="card">
					  <div class="card-header">
					    <h4 class="card-title "><b>Acessorios</b>!</h4>
					  </div>
					<div class="card-body p-0 pl-5 pb-1">
						<span class="col">
							<acessorios @Click="setAcessorio" :rios="acessorio"></acessorios>
						</span>
					</div>
				</div>
			</div>
			<div class="col-9 col-sm-9 col-md-9 pl-5 pt-2 pb-2 pr-5" v-if="carros.length">
                <ul>
                    <li v-for="(item, id) in carros">
						          <cardcar :car="item" :user="usercpf" :id="id" :quant-dias="dias" :data-entrega="predados.datefim" :local-entrega="predados.locadoraentrega" :data-retirada="predados.dateinicio" :local-retirada="predados.locadoraretirada"></cardcar><br>
                    </li>
                </ul>
            </div>
            <h2 v-else> Nenhum carro com essas caracteristicas</h2>
		</div>
	</div>
</template>
<script>
import Classificacao from '../components/classificacao.vue';
import Locadora from '../components/locadora.vue';
import Acessorios from '../components/acessorios.vue';
import BuscaLocacao from '../components/buscaLocacao.vue';
import Cars from '../../assets/js/views/CardCar.vue'
export default {
	props:['cars', 'aces', 'predados', 'categorias', 'usercpf'],
	components: {
		acessorios: Acessorios,
		buscalocacao: BuscaLocacao, 
		cardcar : Cars
   	},
   	data() {
   		return{
   			carros: this.cars,
   			acessorio:null,
   			dias:null,
        datefim: this.predados.datefim,
        dateinicio: this.predados.dateinicio,
        lEntrega: this.predados.locadoraentrega,
        lRetirada: this.predados.locadoraretirada
   		}
   	},
   	created(){
   		this.acessorio= this.aces;
   		this.dias=new Date(this.predados.datefim) - new Date(this.predados.dateinicio);
   	},
   	methods:{
   		setAcessorio(acessorio){
   			this.teste=acessorio;
   			axios.post('api/getcarrosAcessorio/', {
   				predados : this.predados,
   				acessorio : acessorio
   			}).then(
   				 res => {
   				 	this.carros = res.data;
   				 },
   				 (error) => {
   				 	console.log(error);
   				 });
   		}
   	}
}
</script>