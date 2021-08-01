<template>
    <div>
        <form @submit="submit">
            <button v-if="show" type="submit" class="btn btn-sm btn-primary btn-block"><i class="icon-check" aria-hidden="true"></i> Apply</button>

            <div v-else class="alert alert-success">
                <i class="fa fa-check-circle"></i> Application sent Successfully!
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        },
        methods:{
            submit(e){
                e.preventDefault();
                axios.get('/applications/'+ this.jobid)
                    .then((response)=>{this.show=false});
            }
        }
    }
</script>
