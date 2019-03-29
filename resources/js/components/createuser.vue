<script>
    export default{
        data(){
            return {
                selected: ''
            }
        }, 
        methods: {
                escolheu(){
                    if (this.selected == 'Fisica') {
                        $(".fisica").each(function(){
                            $(this).css('display','block');
                            $(this).attr('required',true);
                        });
                        $(".juridica").each(function(){
                            $(this).css('display','none');
                            $(this).attr('required',false);
                        });
                    }else if (this.selected == 'Jurídica') {
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
        }

    }

</script>

<template>
        <div class="col-2  mb-3">                            
            <label for="tipo" class="col-form-label text-md-right">Tipo de conta</label>
            <select v-model="selected" id="tipo" type="tipo" class="form-control" name="tipo" value="" @change="escolheu" required>
                <option>Fisica</option>
                <option>Jurídica</option>
            </select>
        </div>


</template>

<style scoped=""></style>