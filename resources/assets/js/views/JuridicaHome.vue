
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
                <!--#TODO-->
                <i class="fas fa-edit"></i> Editar dados
            </button></div>
            <div class="card-body cardbody">
                <ul>
                    <li><b>e-mail:</b> {{user['user_info']['email']}}</li>
                    <li><b>Senha:</b> *********</li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="updateDados" tabindex="-1" role="dialog" aria-labelledby="dadosLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dadosLabel">Atualizar dados pessoais</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" :action="'api/updateDadosPessoaisPessoaJuridica/'+cnpj" id="formDados">
                                <input type="hidden" name="_token" :value="csrf">
                                <div class="form-group row">
                                    <div class="form-group col">
                                        <label for="nome"> Nome</label>
                                        <input type="text" class="form-control text-body" id="nome" name="nome" v-model="user.user_info.name" required/>
                                    </div>
                                </div>
                                    <div class="form-group col">
                                        <label for="telefone"> Telefone</label>
                                        <input type="text" class="form-control text-body" id="telefone" name="telefone" v-model="user.user_info.telefone" required/>
                                    </div>
                                <div class="form-group col">
                                    <label for="razaoSocial" class="form-control text-body" >Razão Social</label>
                                    <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="" v-model="user.p_info.razaoSocial">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-success" @click="submitItem($event, 'formDados')">Atualizar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateEndereco" tabindex="-1" role="dialog" aria-labelledby="enderecoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="enderecoLabel">Atualizar Endereço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" :action="'api/updateDadosPessoaisEndereco/'+user.endereco_info.idEndereco" id="formDadosEndereco">
                                <input type="hidden" name="_token" :value="csrf">
                                <div class="form-group row">
                                    <buscacep :cep="user.endereco_info.cep"></buscacep>
                                  <div class="col mb-3">
                                    <label for="numero" class="col-form-label text-md-right">Numero</label>
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="" v-model="user.endereco_info.numero">
                                    <small id="numroHelp" class="form-text text-muted">Por favor, insira apenas numeros.</small>
                                  </div>
                                  </div>

                                  <div class="form-group row">
                                  <div class="col-4 mb-3">
                                    <label for="bairro" class="col-form-label text-md-right">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" v-model="user.endereco_info.bairro">
                                  </div>
                                  <div class="col-4 mb-3">
                                    <label for="rua" class="col-form-label text-md-right">Rua</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="" v-model="user.endereco_info.rua">
                                  </div>
                                    
                                  </div>
                                  
                                  <div class="form-group row">
                                  <div class="col-6 mb-3">
                                    <label for="estado" class="col-form-label text-md-right">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="" v-model="user.estado_info.nome">
                                    <small id="estadoHelp" class="form-text text-muted">Por favor, insira o nome completo.</small>
                                  </div>
                                  <div class="col-6 mb-3">
                                    <label for="cidade" class="col-form-label text-md-right">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" v-model="user.cidade_info.nome">
                                    <small id="cidadeHelp" class="form-text text-muted">Por favor, insira o nome completo.</small>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-success" @click="submitItem($event, 'formDadosEndereco')">Atualizar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateConta" tabindex="-1" role="dialog" aria-labelledby="contaLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contaLabel">Atualizar dados da Conta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" :action="'api/updateDadosPessoaisUser/'+user.user_info.iduser" id="formUser">
                                <input type="hidden" name="_token" :value="csrf">
                                <div class="form-group input-group">
                                    <div class="col">
                                        <label for="email"> E-mail</label>
                                        <input type="email" class="form-control text-body" id="email" name="email" v-model="user.user_info.email" required/>
                                    </div>

                                    <div class="input-fields row">
                                        <div class="form-group col">
                                            <label for="senha"> Senha</label>
                                            <input type="password" v-validate="'required'" class="form-control" id="senha" ref="password" name="password" required placeholder="Insira sua nova senha"/>
                                        </div>
                                        <div class="form-group col">
                                            <label for="confirmarsenha">Confirmar Senha</label>
                                            <input type="password"  v-validate="'required|confirmed:password'" class="form-control" id="confirmarsenha" name="password_confirmation" data-vv-as="password"  placeholder="Insira a senha novamente"  required/>
                                        </div>
                                    </div>
                                    <!-- ERRORS -->
                                    <div class="alert alert-danger" v-show="errors.any()">
                                        <div class="col" v-if="errors.has('password')">
                                            O campo de senha é obrigatório!
                                        </div>
                                        <div class="col" v-if="errors.has('password_confirmation')">
                                            As senhas não coincidem.
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-success" @click="submitItem($event, 'formUser')">Atualizar</button>
                        </div>
                    </div>
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
                                <!--#TODO-->
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
    import BuscaCep from '../../../js/components/buscacep.vue';

    export default {
        name: "JuridicaHome",
        components:{
            buscacep : BuscaCep,

        },
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