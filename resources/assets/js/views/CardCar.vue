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
                            <img :src="'../../../'+img.caminho" alt="" class="img-fluid">
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
                    <button class="btn btn-success" v-if="!user"> <i class="fas fa-plus"></i> Inserir imagem</button>
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
                            <button class="btn btn-dark" style="width: 130px; height: 50px">Reserve aqui</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" v-if="!user">
                <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i>Editar</a>
            </div>
        </div>

    </div>
</template>


<script>
    export default {
        name: "CardCar",
        props: ['car','user', 'id', 'quantDias'],
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