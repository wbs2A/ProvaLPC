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
            <div class="row"><h3 class="col" style="font-family: jediFont">locadora <i>{{name }}</i></h3> <div class="cars_panel offset-2"><button class="btn btn-success" data-toggle="modal" data-target="#insertCarro" style="float: right"> <i class="fas fa-plus"></i>Adicionar carros</button></div></div>
            <br>
            <div v-if="cars.length">
                <ul id="example-1">
                    <li v-for="(item, id) in cars">
                        <card-car :car="item" :id="id"></card-car><br>
                    </li>
                </ul>
            </div>
            <h2 v-else> Você ainda não inseriu nenhum carro</h2>
        </div>
        <h2 v-else> Você não selecionou nenhuma locadora</h2>

        <div class="modal fade" id="insertCarro" tabindex="-1" role="dialog" aria-labelledby="dadosLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dadosLabel">Inserir um novo carro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formInsertCarro" action="/api/insertCarro/" method="post">
                            <input type="hidden" :value="this.server" name="locadoraid"/>
                            <input type="hidden" :value="csrf" name="_token"/>
                            <div class="form-group">
                                <label for="nomeCarro">Nome do carro</label>
                                <input type="text" class="form-control" id="nomeCarro" name="nome" placeholder="nome...">
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa">
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo">
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor">
                            </div>
                            <div class="form-group">
                                <label for="locadora">Locadora</label>
                                <input type="text" class="form-control" id="locadora" name="locadora" :value="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="consumo">Consumo</label>
                                <input type="text" class="form-control" id="consumo" name="consumo">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca">
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="direcao">Tipo de direção</label>
                                    <select class="form-control" id="direcao" name="direcao">
                                        <option>Hidráulica</option>
                                        <option>Elétrica</option>
                                        <option>Mecânica</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="cambio">Tipo de câmbio</label>
                                    <select class="form-control" id="cambio" name="cambio">
                                        <option>Manual</option>
                                        <option>Automático</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passageiros">Nº de Passageiros</label>
                                <input type="text" class="form-control" id="passageiros" name="passageiros">
                            </div>
                            <div class="form-group">
                                <label for="classificacao">Classificação</label>
                                <select class="form-control" name="classificacao" id="classificacao">
                                    <option v-for="item in this.classificacao" v-bind:value="item.idclassificacao">
                                        {{ item.tipo}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Itens deste Carro</label>
                                <div id='example-3'>
                                    <div v-for="(item, id) in acessorios">
                                        <input type="checkbox" name="acessorios[]" :id="id" :value="item.idacessorio" v-model="selectedAcess">
                                        <label :for="id">{{item.nome}}</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="align-content-center">
                            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-success" @click="sendForm($event, 'formInsertCarro')">Inserir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                loading: true,
                classificacao: '',
                acessorios: '',
                selectedAcess: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                });
                axios.get('/api/getClassificacaoAcess/').then(response=>{
                    this.classificacao = response.data.classificacao;
                    this.acessorios = response.data.acessorios;
                });
            }else{
                this.loading = false;
            }
        },
        methods:{
            sendForm(evt, formid){
                evt.preventDefault();
                document.getElementById(formid).submit();
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

    /*:user="12345678911" :quant-dias="5" :data-entrega="'2019/04/08'" :local-entrega="1" :data-retirada="'2019/04/05'" :local-retirada="1"*/
</style>