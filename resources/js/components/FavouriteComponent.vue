<template>
    <div>
        <button v-if="show" @click.prevent="unsave()" class="btn btn-sm btn-dark btn-block"><i class="icon-heart" aria-hidden="true"></i> Unsave</button>
        <button v-else @click.prevent="save()" class="btn btn-sm btn-outline-primary btn-block"><i class="icon-heart-o" aria-hidden="true"></i> Save</button>
    </div>
</template>

<script>
    export default {
        props:[
            'jobid',
            'favourited'
        ],
        mounted() {
            this.show = this.jobFavourited ? true : false;
        },
        data(){
            return{
                'show':true
            }
        },
        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
        methods:{
            save(){
                axios.get('/save/'+ this.jobid)
                .then(response=>{this.show=true})
                .catch(error=>alert('error'))
            },
            unsave(){
                axios.get('/unsave/'+ this.jobid)
                .then((response)=>{this.show=false})
            }
        }

    }
</script>
