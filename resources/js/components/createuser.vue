<script>
    import buscacpf from '../components/buscacpf';
    export default{
        props:['old'],
        components:{
            buscacpf
        },
        data(){
            return{
                escolhe:''
            }
        },
        methods: {
                escolheu(){
                    console.log(this.escolhe);
                    if(this.old){
                        this.escolhe=this.old;
                    }
                    if (this.escolhe == 'Fisica') {
                        $(".fisica").each(function(){
                            $(this).css('display','block');
                            $(this).attr('required',true);
                        });
                        $(".juridica").each(function(){
                            $(this).css('display','none');
                            $(this).attr('required',false);
                        });
                    }else if (this.escolhe == 'Jurídica') {
                        $(".fisica").each(function(){
                            $(this).css('display','none');
                            $(this).attr('required',false);
                        });
                        $(".juridica").each(function(){
                            $(this).css('display','block');
                            $(this).attr('required',true);
                        });
                    }
                }
        },
        created:function(){
            console.log(this.old);
            if(this.old){
                this.escolhe=this.old;
            }

        }
    }

</script>

<template>
        <div class="col-2  mb-3">                            
            <label for="tipo" class="col-form-label text-md-right">Tipo de conta  {{ old }} </label>
            <select id="tipo" type="tipo" class="form-control" name="tipo"  v-model="escolhe" @change="escolheu" required>
                <option>Fisica</option>
                <option>Jurídica</option>
            </select>
        </div>


</template>

<style scoped=""></style>