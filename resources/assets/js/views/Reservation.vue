<style>

</style>

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
            Não foi possível carregar suas reservas
        </div>

        <div v-if="reservas">
            <div class="panel-group" id="accordion">

                <div v-for="(item,key) in reservas" class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" :href="'#collapse'+key">{{item.carro.nome}}</a>
                        </h4>
                    </div>
                    <div :id="'collapse'+key" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Carro</th>
                                    <th>Retirado em</th>
                                    <th>Entregue em</th>
                                    <th>Valor total</th>
                                    <th>Data de entrega</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{item.carro.marca}} {{item.carro.nome}}<br>
                                            valor p/ dia: {{item.carro.valor}}
                                        </td>
                                        <td>
                                            {{item.retiradoEm.nome}}<br>
                                            CNPJ: {{item.retiradoEm.pessoaJuridica_idPJ}}
                                        </td>
                                        <td>
                                            {{item.entregueEm.nome}}<br>
                                            CNPJ: {{item.entregueEm.pessoaJuridica_idPJ}}
                                        </td>
                                        <td>
                                            {{item.valorTotal}}
                                        </td>
                                        <td>{{item.dataEntrega}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div v-else>
            <h3>Você ainda não efetuou nenhuma reserva!</h3>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Reservation",
        data() {
            return {
                reservas: null,
                name: '',
                error: null,
                loading: true
            }
        },
        mounted(){
            axios.get('/api/getReservas/').then(response=>{
                this.reservas = response.data;
                this.loading = false;
            },(error)=>{
                this.loading = false;
                this.error = error
            });
        }
    }
    $('#myCollapsible').collapse({
        toggle: false
    });
</script>