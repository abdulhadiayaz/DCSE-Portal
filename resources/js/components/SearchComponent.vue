<template>
    <div>

        <input type="text" v-model="keyword" placeholder="What are you looking for?" v-on:keyup="searchJobs()" class="form-control">

        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a style="color: black" :href=" '/jobs/' + result.id + '/' + result.slug + '/' ">{{ result.title }}</a>
                    <br>
                    <small class="badge badge-primary">{{ result.position }}</small>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                keyword:'',
                results:[],
            }
        },
        methods:{
            searchJobs(){
                this.results = [];
                if (this.keyword.length > 1){
                    axios.post('/jobs/search', {params:{keyword: this.keyword}})
                        .then(response=>{this.results = response.data});
                }
            }
        }
    }
</script>
