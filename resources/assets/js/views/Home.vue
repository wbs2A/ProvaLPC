<style scoped="">
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
    .swapping-squares-spinner, .swapping-squares-spinner * {
    box-sizing: border-box;
}

.swapping-squares-spinner {
    height: 65px;
    width: 65px;
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.swapping-squares-spinner .square {
    height: calc(150px * 0.25 / 1.3);
    width:  calc(150px * 0.25 / 1.3);
    animation-duration: 1000ms;
    border: calc(65px * 0.04 / 1.3) solid #000000;
    margin-right: auto;
    margin-left: auto;
    position: absolute;
    animation-iteration-count: infinite;
}

.swapping-squares-spinner .square:nth-child(1) {
    animation-name: swapping-squares-animation-child-1;
    animation-delay: 500ms;
}

.swapping-squares-spinner .square:nth-child(2) {
    animation-name: swapping-squares-animation-child-2;
    animation-delay: 0ms;
}

.swapping-squares-spinner .square:nth-child(3) {
    animation-name: swapping-squares-animation-child-3;
    animation-delay: 500ms;
}

.swapping-squares-spinner .square:nth-child(4) {
    animation-name: swapping-squares-animation-child-4;
    animation-delay: 0ms;
}

@keyframes swapping-squares-animation-child-1 {
    50% {
        transform: translate(150%,150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-2 {
    50% {
        transform: translate(-150%,150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-3 {
    50% {
        transform: translate(-150%,-150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-4 {
    50% {
        transform: translate(150%,-150%) scale(2,2);
    }
}
</style>

<template>
    <div>
        <div class="loading center" v-if="loading" >
            <div class="swapping-squares-spinner">
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
            </div>
        </div>

        <div v-if="error" class="error">
            <h1>{{ error }}</h1>
        </div>
        <div v-if="user">
            <div class="row">
                <div class="card col">
                    <div class="card-header">Dados Pessoais <a class="edit" href="#"> <i class="fas fa-edit"></i> Editar dados</a></div>
                    <div class="card-body">
                        <ul>
                            <li>nome: {{user['user_info']['name']}}</li>
                            <li>sexo: {{user['pf_info']['sexo']}}</li>
                            <li>telefone: {{user['user_info']['telefone']}}</li>
                            <li>RG: {{user['pf_info']['rg']}}</li>
                            <li>Data de Nascimento: {{user['pf_info']['dataNascimento']}}</li>
                        </ul>
                    </div>
                </div>
                <div class="card col">
                    <div class="card-header">Endereço <a class="edit" href="#"><i class="fas fa-edit"></i> Editar dados</a></div>
                    <div class="card-body">
                        <ul>
                            <li>Rua: {{user['endereco_info']['rua']}}</li>
                            <li>Bairro: {{user['endereco_info']['bairro']}}</li>
                            <li>Número: {{user['endereco_info']['numero']}}</li>
                            <li>CEP: {{user['endereco_info']['cep']}}</li>
                            <li>Cidade: {{user['cidade_info']['nome']}}</li>
                            <li>Estado: {{user['estado_info']['nome']}}</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="card col">
                <div class="card-header">Dados de acesso à conta <a class="edit"  href="#"><i class="fas fa-edit"></i> Editar dados</a></div>
                <div class="card-body">
                    <ul>
                        <li>e-mail: {{user['user_info']['email']}}</li>
                        <li>Senha: *********</li>
                    </ul>
                </div>
            </div>
    </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                user: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.user = null;
                this.loading = true;
                axios
                 .get('/api/getPFisica/').then(res=> {
                    axios.get('/api/pfisica/' + res.data)
                        .then(
                            response => {
                                this.loading = false;
                                this.user = response.data;
                            },
                            (error) => {
                                console.log(error);
                                this.error = error;
                                this.loading = false;
                            }
                        );
                },
                    (error) => {
                        console.log(error);
                        this.error = error;
                        this.loading = false;
                    })
            }
        }
    }
</script>