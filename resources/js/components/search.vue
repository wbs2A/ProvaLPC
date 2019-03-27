<script>
    import datepicker from 'vue-date-picker';

    export default{
        components:{
            datepicker
        }
    }

</script>

<template>
    <div class="col-lg-5 col-md-6 header-right form-row">
        <h4 class="text-white pb-30">Alugue seu carro <b>agora</b>!</h4>
            <form class="form" role="form" autocomplete="off">
                <div class="form-group col-auto">
                    <label for="categoria" class="mr-sm-2">Selecione a categoria do seu carro</label>
                    <select class="custom-select" id="categoria" name="categoria">
                        <option value="" disabled selected hidden>...</option>
                        <option value="1">BMW</option>
                        <option value="1">Farrari</option>
                        <option value="1">Toyota</option>
                    </select>
                </div>

        <div class="form-group row">
            <div class="col-md-6 wrap-left">
                <label class="mr-sm-2" for="saa">Local de retirada</label>
                <select class="custom-select" id="saa">
                    <option value="">Drop off</option>
                    <option value="1">Drop off One</option>
                    <option value="1">Drop off Two</option>
                    <option value="1">Drop off Three</option>
                    <option value="1">Drop off Four</option>
                </select>
            </div>
        <div class="col-md-6 wrap-right">
            <div class="input-group dates-wrap">
                <label class="mr-sm-2" for="dateinicio">Data de início</label>
                <datepicker :readonly="true" format="DD/MM/YYYY" id="dateinicio" name="dateinicio"></datepicker>
            </div>
        </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 wrap-left">
                    <label class="mr-sm-2" for="sa">Local de entrega</label>
                    <select class="custom-select" id="sa">
                    <option value="">Drop off</option>
                    <option value="1">Drop off One</option>
                    <option value="1">Drop off Two</option>
                    <option value="1">Drop off Three</option>
                    <option value="1">Drop off Four</option>
                </select>
        </div>
        <div class="col-md-6 wrap-right">
            <div class="input-group dates-wrap">
                <label class="mr-sm-2" for="datefim">Data de entrega</label>
                <datepicker :readonly="true" format="DD/MM/YYYY" id="datefim" name="datefim"></datepicker>
            </div>
        </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Pesquisar</button>
            </div>
        </div>
        </form>
    </div>
</template>

<style scoped=""></style>