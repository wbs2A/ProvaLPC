<template>
    <div>
        <div class="center" v-if="loading">
            <div class="orbit-spinner">
                <div class="orbit"></div>
                <div class="orbit"></div>
                <div class="orbit"></div>
            </div>
        </div>
        <div class="text-center" v-if="erro===401">
            <h4> A conta já existe em nosso sistema.</h4>
            <i class="fas fa-exclamation-triangle" style="color:yellow;"></i>
        </div>
        <div class="text-center" v-else-if="erro===500">
            <h4>Não foi possível inserir seus dados. Entre em contato para mais informações.</h4>
            <p class="lead">Informe o erro #330266</p>
            <i class="fas fa-times" style="color:red;"></i>
        </div>
        <div class="text-center" v-if="success">
            <h4>Conta inserida com Sucesso</h4>
            <i class="fas fa-check-circle"></i>
        </div>
        <div v-if="formDados">
            <h4>Você deseja efetuar o pagamento agora?</h4>
            <select v-model="opt">
                <option>Sim</option>
                <option>Não</option>
            </select>
            <br>
            <div v-if="opt === 'Sim'">
                <h4> Insira seus dados bancários</h4>
                <br>
                <form id="formdata" @submit="checkForm" method="post">
                    <div class="form-group">
                        <label for="nome">Nome no Cartão</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome como consta no cartão" v-model="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cartao">Nº do Cartão</label>
                        <input type="text" class="form-control" id="cartao" name="cartao" placeholder="insira o nº de seu cartão" v-model="nc" required>
                    </div>
                    <div class="form-group">
                        <label for="vcc">VCC</label>
                        <input type="text" class="form-control" id="vcc" placeholder="VCC" name="vcc" v-model="vcc" required>
                    </div>
                    <div class="form-group">
                        <label for="formapagamento">Selecione a forma de pagamento</label>
                        <select id="formapagamento" name="formapagamento" v-model="forma" required>
                            <option> Crédito </option>
                            <option> Débito  </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="datav">Data de validade</label>
                        <input type="month" class="form-control" name="datav" id="datav" v-model="data" required>
                    </div>
                    <button type="submit" class="btn btn-success"> Validar </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "confirmReserv",
        data: function () {
            return {
                opt: '...',
                formDados: true,
                loading: false,
                nc:    '',
                data:  '',
                nome:  '',
                vcc:   '',
                forma: '',
                success: false,
                erro: false,
            }
        },
        methods:{
            checkForm: function (e) {
                e.preventDefault();
                this.errors = [];
                this.loading = true;
                this.formDados = false;
                axios
                    .post('/api/setconta',{

                    }).then(
                        (response)=>{
                            this.loading = false;
                            this.success = true;
                            this.formDados = false;
                        },(error)=>{
                            this.loading = false;
                            this.erro = error.response.status;
                            this.formDados = false;
                            console.log(JSON.stringify(error));
                    }).catch((error)=>{
                        console.log('aqui no catch: '+error);
                        this.loading = false;
                        this.erro = error.response.status;
                        this.formDados = false;
                });
            }
        }
    }
</script>

<style scoped>
    .center {
        margin: auto;
        width: 100%;
        padding: 200px;
        padding-left: 20%;
    }
    .orbit-spinner, .orbit-spinner * {
        box-sizing: border-box;
    }

    .orbit-spinner {
        height: 155px;
        width: 155px;
        border-radius: 50%;
        perspective: 800px;
    }

    .orbit-spinner .orbit {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .orbit-spinner .orbit:nth-child(1) {
        left: 0%;
        top: 0%;
        animation: orbit-spinner-orbit-one-animation 1200ms linear infinite;
        border-bottom: 3px solid #000;
    }

    .orbit-spinner .orbit:nth-child(2) {
        right: 0%;
        top: 0%;
        animation: orbit-spinner-orbit-two-animation 1200ms linear infinite;
        border-right: 3px solid #000;
    }

    .orbit-spinner .orbit:nth-child(3) {
        right: 0%;
        bottom: 0%;
        animation: orbit-spinner-orbit-three-animation 1200ms linear infinite;
        border-top: 3px solid #000;
    }

    @keyframes orbit-spinner-orbit-one-animation {
        0% {
            transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
        }
        100% {
            transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
        }
    }

    @keyframes orbit-spinner-orbit-two-animation {
        0% {
            transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
        }
        100% {
            transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
        }
    }

    @keyframes orbit-spinner-orbit-three-animation {
        0% {
            transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
        }
        100% {
            transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
        }
    }
</style>