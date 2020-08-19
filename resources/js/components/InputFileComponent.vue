<template>
    <div class="card-body" id="divFiles">
        
        <div class="row" v-for="item in itens">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="file"> Insira seu arquivo</label>
                    <input type="file" name="file[]" class="form-group" enctype="multipart/form-data">
                 </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <button type="button" v-on:click="add">Adicionar outro arquivo</button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                itens: [0]
            }
        },
        methods: {
            add() {
                this.itens.push(1);
            }
        }
    }

</script>