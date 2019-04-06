<template>
	<form class="form" id="search" role="form"  autocomplete="off" :action="'api/locacao'" method= "POST" >
		<input type="hidden" name="_token" :value="csrf">
		<div class="form-group row">
			<classificacao @Select="getCategoria" :categorias="mycategorias"></classificacao>
		</div>			
		<div class="form-group row">
			<div class="col-6 wrap-left">
				<locadora :locadoras="data" :localDe="'retirada'"></locadora>
			</div>
			<div class="col-6 wrap-right">
				<div class="input-group dates-wrap mb-3">
					<label class="col-form-label text-md-right mb-1" for="dateinicio">Data de início</label>
					<datepicker v-bind:disabled-date="disabledDate" v-bind:input-class="{'col-7': true}" :value="dateNow1"  :readonly="true" format="DD/MM/YYYY" id="dateinicio" name="dateinicio" required></datepicker>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-6 wrap-left">
				<locadora :locadoras="data" :localDe="'entrega'"></locadora>
			</div>
			<div class="col-6 wrap-right mb-3">
				<div class="input-group dates-wrap">
					<label class="col-form-label text-md-right mb-1" for="datefim">Data de entrega</label>
					<datepicker v-bind:input-class="{'col-7': true}" :value="dateNow2" :readonly="true" format="DD/MM/YYYY" id="datefim" name="datefim" required></datepicker>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-12">
				<button type="submit" class="btn btn-warning btn-default btn-lg btn-block text-center text-uppercase">Pesquisar</button>
			</div>
		</div>
	</form>
</template>

<style scoped="">
	.btn-warning{
		background-color: #fab700;
	}
</style>
<script>
import Classificacao from '../components/classificacao.vue';
import Locadora from '../components/locadora.vue';
import DatePicker from 'vue-date-picker';
export default {
	props:['mycategorias'],
	components: {
		classificacao: Classificacao,
		locadora: Locadora,
		datepicker: DatePicker
   	},
   	data() {
   		return{
   			selectCategoria:'', 
   			data:null,
   			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
   			dateNow1: new Date().toLocaleDateString(),
   			dateNow2: new Date().toLocaleDateString()
		}
   	},
   	methods:{
   		getLocadora(){
   			axios.get('api/getLocadora/'+this.selectCategoria).then(
   				 res => {
   				 	this.data = res.data;
   				 	console.log(this.data);
   				 },
   				 (error) => {
   				 	console.log(error);
   				 });
   		},
   		getCategoria(mycategoria){
   			this.selectCategoria=mycategoria;
   			this.getLocadora();
   		},
   		disabledDate (date) {
   			console.log(date.getTime());
	      	return date.getTime() < Date.now()
	    }
   	}, 
   	created(){
   		console.log(this.mycategorias);
   	}
}
</script>