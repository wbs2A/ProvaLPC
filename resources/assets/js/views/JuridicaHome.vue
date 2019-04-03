
<style scoped>
    .center {
        margin: auto;
        width: 50%;
        padding: 100px;
        padding-left: 20%;
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

    </div>
    {{user}}
</div>
</template>

<script>
    export default {
        name: "JuridicaHome",
        data(){
            return {
                loading: true,
                user: null,
                error: null,
                cnpj: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        created() {
            this.fetchData();
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
            }
        }
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
</script>