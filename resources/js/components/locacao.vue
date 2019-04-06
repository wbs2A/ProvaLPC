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
					<div class="card-body p-0 pl-5 pb-1"  v-for="aces in aces">
						<acessorios @Click="setAcessorio" :rios="aces"></acessorios>
					</div>
				</div>
			</div>
			<div class="col-9 col-sm-9 col-md-9">
				<form class="form" role="form"  autocomplete="off" :action="'api/setCarLocacao'" method= "POST" >
					<input type="hidden" name="_token" :value="csrf">
					<span v-for="item in carros">{{item}}</span>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
import Classificacao from '../components/classificacao.vue';
import Locadora from '../components/locadora.vue';
import Acessorios from '../components/acessorios.vue';
import BuscaLocacao from '../components/buscaLocacao.vue';
import DatePicker from 'vue-date-picker';
export default {
	props:['cars', 'aces', 'predados', 'categorias'],
	components: {
		acessorios: Acessorios,
		buscalocacao: BuscaLocacao
   	},
   	data() {
   		return{
   			carros: this.cars,
   			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
   			picked:null
   		}
   	},
   	methods:{
   		setAcessorio(acessorio){
   			axios.post('api/getcarrosAcessorio/', {
   				predados : this.predados,
   				acessorio : acessorio
   			}).then(
   				 res => {
   				 	this.data = res.data;
   				 	console.log(this.data);
   				 },
   				 (error) => {
   				 	console.log(error);
   				 });
   		}
   	}
}
</script>