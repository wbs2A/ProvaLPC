<script>
    export default{
      data(){
         return {
                a: ''
            }
      },
        methods: {
            getCnpj(){
              var res = document.getElementById("cnpj").value.replace('.', "");
              res = res.replace('-', ""); 
              res =res.replace('.', "");
              res =res.replace('/', "");
                this.a= document.getElementById('register').action.replace('register','userInsert')+'/1'+'/'+res;
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                $.ajax({
                  url: this.a,
                  method: 'get',
                  success: function(result){
                        if(result['resposta']){
                          var te;
                          var te2;
                          te2=document.getElementById('fisica-cpf');
                          te2.parentNode.style.display='none';
                                te=document.getElementById('juridica-cnpj');
                                te.innerText=result['resposta'];
                                te.parentNode.style.display='block';
                                document.getElementsByTagName('button')[0].disabled=true;

                        }else{
                          var te;
                          var te2;
                          te2=document.getElementById('fisica-cpf');
                          te2.parentNode.style.display='none';
                                te=document.getElementById('juridica-cnpj');
                                te.parentNode.style.display='none';
                            document.getElementsByTagName('button')[0].disabled=false;                          
                        }           
                  }});
            }
        }
    }

</script>

<template>
    <div class="col mb-3">
        <label for="cnpj" class="col-form-label text-md-right">CNPJ</label>
        <input type="text" data-mask="00.000.000/0000-00" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="CNPJ"  @blur="getCnpj" value="">
    </div>
</template>

<style scoped=""></style>