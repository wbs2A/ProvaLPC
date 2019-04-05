
<style scoped>
    .center {
        margin: auto;
        width: 50%;
        padding: 100px;
        padding-left: 20%;
    }

    .edit{
        position: relative;
        float: right;
    }

    button{
        color: #eee;
    }
    .head{
        font-size: 25px;
    }
    .cardbody{
        font-size: 17px;

    }
    b{
        color: #0b0b0b;
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
        <h1>{{ error }}</h1>
    </div>

    <div v-if="user">
        <br>
        <div class="row">
            <div class="card col">
                <div class="card-header head ">Dados Pessoais <button type="button" class="btn btn-info edit" data-toggle="modal" data-target="#updateDados" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-edit"></i> Editar dados
                </button></div>
                <div class="card-body cardbody">
                    <ul>
                        <li><b>Razão Social:</b>  {{user.p_info.razaoSocial}}</li>
                        <li><b>Nome Fantasia:</b>  {{user.user_info.name}}</li>
                        <li><b>telefone:</b>{{user.user_info.telefone | formatTelefone}}</li>
                    </ul>
                </div>
            </div>
            <div class="card col">
                <div class="card-header head">Endereço <button type="button" class="btn btn-info edit" data-toggle="modal" data-target="#updateEndereco">
                    <i class="fas fa-edit"></i> Editar dados
                </button></div>
                <div class="card-body cardbody">
                    <ul>
                        <li><b>Rua: </b>{{user['endereco_info']['rua'] | capitalize}}</li>
                        <li><b>Bairro: </b>{{user['endereco_info']['bairro'] | capitalize}}</li>
                        <li><b>Número: </b>{{user['endereco_info']['numero']}}</li>
                        <li><b>CEP: </b>{{user['endereco_info']['cep']}}</li>
                        <li><b>Cidade: </b>{{user['cidade_info']['nome']}}</li>
                        <li><b>Estado: </b>{{user['estado_info']['nome']}}</li>
                    </ul>

                </div>
            </div>
        </div><br>
        <div class="card col">
            <div class="card-header head">Dados de acesso à conta <button type="button" class="btn btn-info edit" data-toggle="modal" data-target="#updateConta">
                <i class="fas fa-edit"></i> Editar dados
            </button></div>
            <div class="card-body cardbody">
                <ul>
                    <li><b>e-mail:</b> {{user['user_info']['email']}}</li>
                    <li><b>Senha:</b> *********</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="card col">
            <div class="card-header head">Minhas Locadoras<button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#updateConta">
                <i class="fas fa-plus"></i> Adicionar Locadora
            </button></div>
            <div class="card-body cardbody">
                <h4 v-if="!user.locadoras.length">Você ainda não inseriu nenhuma locadora!</h4>
                <div v-else>
                    <table id="v-for-object" class="table table-bordered table-stripped">
                        <thead>
                            <th><i> selecionado</i></th>
                            <th>Nome</th>
                            <th>Tipo de proteção</th>
                            <th>Idade média da frota</th>
                            <th>Horário de Atendimento</th>
                            <th>Ações</th>
                        </thead>
                        <tbody >
                        <tr v-for="value in user.locadoras">
                            <td> <input type="radio" v-model="locadora" v-bind:value="value.idLocadora" v-on:click.stop="hasChange(value.idLocadora,value.nome)"></td>
                            <td>{{value.nome}}</td>
                            <td> {{value.tipoProtecao}}</td>
                            <td>{{value.idadeMediaFrota}}</td>
                            <td>{{value.horarioAtendimento}}</td>
                            <td><button class="btn btn-info"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-danger">Remover</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import bus from '../../../js/dashboard';

    export default {
        name: "JuridicaHome",
        data(){
            return {
                loading: true,
                user: null,
                error: null,
                cnpj: '',
                locadora: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        created() {
            this.fetchData();
            this.locadora = bus.info;
        },
        methods: {
            fetchData() {
                this.error = this.user = null;
                this.loading = true;
                //Retorna o CNPJ caso o usuário seja pessoa jurídica
                axios
                    .get('api/getPJuridica/').then(
                    response => {
                        this.cnpj = response.data;
                        axios.get('api/getpjuridica/' + response.data).then(
                            res => {
                                this.loading = false;
                                this.user = res.data;
                            },
                            (error) => {
                                console.log(error);
                                this.error = error;
                                this.loading = false;
                            });
                    },
                    (error) => {
                        this.error = error;
                        this.loading = false;
                    });
            },
            submitItem(evt, formid){
                evt.preventDefault();
                document.getElementById(formid).submit();
            },
            formatDate(data, formato) {
                if (formato == 'pt-br') {
                    return (data.substr(0, 10).split('-').reverse().join('/'));
                } else {
                    return (data.substr(0, 10).split('/').reverse().join('-'));
                }
            },
            hasChange(v,n) {
                bus.info = v;
                bus.name = n;
            }
        }
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
</script>