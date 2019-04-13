<template xmlns:br="http://www.w3.org/1999/html">
    <div>
        <div class="card">
            <div class="card-header row"><a class="card-title h4 col-11">{{car.carro.nome}} </a> <a class="text-right">{{car.classificacao.tipo}}</a> </div>
            <div class="card-body row">
                <div v-if="car.imagens.length" :id="'slide'+id" class="carousel slide myslide col-6 align-middle" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li v-for="(img,idx) in car.imagens" :data-target="'#slide'+id" :data-slide-to="idx" :class="{ active: idx==0 }"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item" v-for="(img,idx) in car.imagens" :class="{ active: idx==0 }">
                            <img :src="'/storage/'+img.filename" alt="" class="img-fluid">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" :href="'#slide'+id" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" :href="'#slide'+id" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
                <div v-else class="col">
                    <h5>Este veículo não tem imagens</h5>
                    <button class="btn btn-success" v-if="!user" data-toggle="modal" :data-target="'#insertImg'+car.carro.idcarro"> <i class="fas fa-plus"></i> Inserir imagem</button>
                </div>
                <div id="acessorios" class="col offset-2">
                    <h5>Neste veículo você encontra:</h5>
                    <ul>
                        <li v-for="item in car.acessorios">
                            <div class="text-left"><span>{{item.nome}}</span></div>
                        </li>
                    </ul>
                </div>
                <div v-if="user" class="col">
                    <div class="row locate align-middle">
                        <span class="col">
                            Alugue agora!<br>
                            <b v-if="quantDias">{{car.carro.valor*quantDias}}</b>
                            <b v-else>{{car.carro.valor}}</b>
                            <br>
                            <i>{{car.carro.valor}}/dia
                            <br>
                            Pagamento no destino em R$</i>
                        </span>
                        <div class="col" style="padding-top:20px;">
                            <form action="/api/efetuarReserva/" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="user" :value="user">
                                <input type="hidden" name="carro" :value="car.carro.idcarro">
                                <input type="hidden" name="valor" :value="car.carro.valor*quantDias">
                                <input type="hidden" name="quantdias" :value="quantDias">
                                <input type="hidden" name="imagens" :value="car.imagens">
                                <input type="hidden" name="dataentrega" :value="dataEntrega">
                                <input type="hidden" name="dataretirada" :value="dataRetirada">
                                <input type="hidden" name="localentrega" :value="localEntrega">
                                <input type="hidden" name="localretirada" :value="localRetirada">

                                <button class="btn btn-dark" style="width: 130px; height: 50px" type="submit">Reserve aqui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" v-if="!user">
                <button class="btn btn-primary"  data-toggle="modal" :data-target="'#updateCar'+id"><i class="fas fa-edit"></i>Editar</button> <a class="btn btn-danger text-white" @click="confirmDelete($event, car.carro.nome, car.carro.idcarro)"><i class="fas fa-times"></i>&nbsp Excluir</a>
            </div>
        </div>



             <div class="modal fade" :id="'updateCar'+id" tabindex="-1" role="dialog" aria-labelledby="contaLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                             <div class="modal-header">
                             <h5 class="modal-title" id="contaLabel">Atualizar dados do Carro</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                         <div class="modal-body">
                             <form method="post" :action="'/api/updateCarro/'+car.carro.idcarro" id="editCar">
                                 <input type="hidden" name="_token" :value="csrf"/>
                                     <div class="form-group">
                                         <label for="nomeCarro">Nome do carro</label>
                                         <input type="text" class="form-control" id="nomeCarro" name="nome" v-model="car.carro.nome">
                                     </div>
                                     <div class="form-group">
                                         <label for="placa">Placa</label>
                                         <input type="text" class="form-control" id="placa" name="placa" v-model="car.carro.placa">
                                     </div>
                                     <div class="form-group">
                                         <label for="modelo">Modelo</label>
                                         <input type="text" class="form-control" id="modelo" name="modelo" v-model="car.carro.modelo">
                                     </div>
                                     <div class="form-group">
                                         <label for="valor">Valor</label>
                                         <input type="text" class="form-control" id="valor" name="valor" v-model="car.carro.valor">
                                     </div>
                                     <div class="form-group">
                                         <label for="consumo">Consumo</label>
                                         <input type="text" class="form-control" id="consumo" name="consumo" v-model="car.carro.consumo">
                                     </div>
                                     <div class="form-group">
                                         <label for="marca">Marca</label>
                                         <input type="text" class="form-control" id="marca" name="marca" v-model="car.carro.marca">
                                     </div>
                                     <div class="row">
                                         <div class="col form-group">
                                             <label for="direcao">Tipo de direção</label>
                                             <select class="form-control" id="direcao" name="direcao">
                                                 <option :selected="car.carro.direcao === 'Hidráulica'">Hidráulica</option>
                                                 <option :selected="car.carro.direcao === 'Elétrica'">Elétrica</option>
                                                 <option :selected="car.carro.direcao === 'Mecânica'" >Mecânica</option>
                                             </select>
                                         </div>
                                         <div class="col form-group">
                                             <label for="cambio">Tipo de câmbio</label>
                                             <select class="form-control" id="cambio" name="cambio">
                                                 <option :selected="car.carro.cambio === 'Manual'">Manual</option>
                                                 <option :selected="car.carro.cambio === 'Automático'">Automático</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="passageiros">Nº de Passageiros</label>
                                         <input type="text" class="form-control" id="passageiros" name="passageiros" v-model="car.carro.passageiros">
                                     </div>
                                     <div class="form-group">
                                         <label for="classificacao">Classificação</label>
                                         <select class="form-control" name="classificacao" id="classificacao">
                                             <option v-for="item in this.classificacao" :value="item.idclassificacao" :selected="car.classificacao.idclassificacao === item.idclassificacao">
                                                 {{ item.tipo}}
                                             </option>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label>Itens deste Carro</label>
                                         <div id='example-3'>
                                             <div v-for="(item, id) in acessorios">
                                                 <input type="checkbox" name="acessorios[]" v-bind:checked="checkAcessorio(item.nome, id)" :id="car.carro.idcarro+'_'+id" :value="item.idacessorio">
                                                 <label :for="id">{{item.nome}}</label>
                                             </div>
                                         </div>
                                     </div>
                                    <div class="form-group">
                                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <button class="btn btn-success" type="submit"> Enviar </button>

                                    </div>
                                 </form>
                         </div>
                     </div>
                 </div>
             </div>

        <div class="modal fade" :id="'insertImg'+car.carro.idcarro" tabindex="-1" role="dialog" aria-labelledby="dadosLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dadosLabel">Adicionar Imagens</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <UploadFiles :car_id="car.carro.idcarro" :post_url="'files/upload-file'"></UploadFiles>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import UploadFiles from '../../../js/components/UploadFiles'
    export default {
        name: "CardCar",
        components: {
            'UploadFiles': UploadFiles
        },
        props: ['car','user', 'id', 'quantDias', 'dataEntrega', 'dataRetirada', 'localRetirada', 'localEntrega'],
        mounted(){
                axios.get('/api/getClassificacaoAcess/').then(response=>{
                this.classificacao = response.data.classificacao;
                this.acessorios = response.data.acessorios;
            });
        },
        data: function(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                classificacao: '',
                acessorios: '',
                selectedAcess: [],
            }
        },
        methods:{
            doReserva(evt, user, quantDias, dataEntrega, dataRetirada, localRetirada, localEntrega){
                evt.preventDefault();
                var v = 1;
                if(quantDias){
                    v = quantDias;
                }

                axios({
                    method: 'post', // verbo http
                    url: '/api/efetuarReserva', // url
                    data: {
                        usuario: user,
                        valor: this.car.carro.valor*v,
                        carro: this.car.carro,
                        dataentrega: dataEntrega,
                        dataretirada: dataRetirada,
                        localR: localRetirada,
                        localE: localEntrega
                    }
                })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            confirmDelete(event, car, id){
                if(confirm("Você tem certeza que deseja excluir o "+car)){
                    axios.get('/api/deleteCar/'+id).then(
                        (response)=>{
                            if(response.data){
                                window.location='/perfil'
                            }
                        }
                    )
                }
            },
            //acessorio a
            checkAcessorio: function(a, id){
                for(var i=0; i< this.car.acessorios.length; i++){
                    if(this.car.acessorios[i].nome === a) {
                        return true
                        //document.getElementById((this.car.carro.idcarro + '_' + id)).checked = true;
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .carousel-inner{
        width:100%;
        max-height: 200px !important;
    }
    .myslide{
        max-width: 200px !important;
        width: 200px
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 100px;
        width: 100px;
        background-size: 100%, 100%;
        background-image: none;
    }

    .carousel-control-next-icon:after
    {
        content: '>';
        font-size: 55px;
        color: black;
    }

    .carousel-control-prev-icon:after {
        content: '<';
        font-size: 55px;
        color: black;
    }

    .locate{
        border: #0b0b0b;
        border-style: solid;
        border-width: 2px;
    }

</style>