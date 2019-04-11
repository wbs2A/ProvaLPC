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
import Classificacao from '../components/classificacao';
import Locadora from '../components/locadora';
import Acessorios from '../components/acessorios';
import BuscaLocacao from '../components/buscaLocacao';
import Cars from '../../assets/js/views/CardCar'
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
      var dt1   = parseInt(this.predados.datefim.substring(0,2));
      var mon1  = parseInt(this.predados.datefim.substring(3,5));
      var yr1   = parseInt(this.predados.datefim.substring(6,10));
      var dt2   = parseInt(this.predados.dateinicio.substring(0,2));
      var mon2  = parseInt(this.predados.dateinicio.substring(3,5));
      var yr2   = parseInt(this.predados.dateinicio.substring(6,10));
      var umDiaMilissegundos = 1000*60*60*24;
      var diferenca = new Date(yr1, mon1, dt1) - new Date(yr2, mon2, dt2);
      var dia = diferenca/umDiaMilissegundos;
   		this.dias= parseInt(dia);
      if(this.dias == 0){
        this.dias=1;
      }
      console.log(this.dias);
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