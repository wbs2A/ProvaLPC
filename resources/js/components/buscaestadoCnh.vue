<script>
    export default{
      props: {
          estadoCNH: String
      },
        methods: {
            getEstadoCNH(){
              var res = document.getElementById("estadoCNH").value;
              axios.get('api/getEstadoExist/'+res).then(
                 res => {
                  var te;
                  if (res.data) {
                    var s=res.data['resposta'];
                    if(s.indexOf("não") != -1){
                      te=document.getElementById('fisica-estadoCNH');
                      te.innerText=s;
                      te.parentNode.style.display='block';
                      document.getElementsByTagName('button')[0].disabled=true;

                    }else{
                      te=document.getElementById('fisica-estadoCNH');
                      te.innerText=s;
                      te.parentNode.style.display='none';
                      document.getElementsByTagName('button')[0].disabled=false;                      
                    }

                  }
                 },
                 (error) => {
                  console.log(error);
                 });
            }
        }
    }

</script>

<template>
    <div class="col mb-3">
        <label for="estadoCNH" class="col-form-label text-md-right">Estado da CNH</label>
        <input type="text" class="form-control" name="estadoCNH" id="estadoCNH" placeholder="" v-bind:value="estadoCNH" @blur="getEstadoCNH">
    </div>
</template>

<style scoped="">
  input[name="estadoCNH"]:first-letter { 
    text-transform: capitalize; 
  }
</style>