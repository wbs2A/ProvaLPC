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
					<input type="date" id="dateinicio" name="dateinicio" v-model="dateNow1"  :min="minimo" @change="validaComOUm" required class="col-9">
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
					<input type="date" id="datefim" name="datefim" v-model="dateNow2" :min="minimo" @change="validaComOUm" required class="col-9">
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
import Classificacao from '../components/classificacao';
import Locadora from '../components/locadora';

export default {
	props:['mycategorias'],
	components: {
		classificacao: Classificacao,
		locadora: Locadora
   	},
   	created(){
   		var t = (new Date()).toJSON().length;
   		var q=t-14;
   		this.dateNow1= (new Date()).toJSON().substring(0,q);
   		this.dateNow2= (new Date()).toJSON().substring(0,q);
   		this.minimo= (new Date()).toJSON().substring(0,q);
   	},
   	data() {
   		return{
   			selectCategoria:'', 
   			data:null,
   			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
   			dateNow1: '',
   			dateNow2: '',
   			minimo: '',
   			formato: 'DD/MM/YYYY'
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
   		customFormatter(date) {
	      return moment(date).format('MMMM Do YYYY, h:mm:ss a');
	    },
	    validaComOUm(event){
	    	if (new Date(this.dateNow2) < new Date(this.dateNow1)) {
	    		this.dateNow2=this.dateNow1;
	    	}
	    	if (new Date(event.target.value) < new Date(this.minimo)) {
	    		event.target.value=this.minimo;
	    	}
	    }
   	}
}
</script>