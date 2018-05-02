<template>
        <div class ="container">
            <div class="row">
                <p class="text-center" v-if="loading">
                    Loading...
                </p>
                
                <p class="text-center" v-if="!loading">
                    <button class="btn btn-success" v-if="status == 0">Add Friend</button>
                    <button class="btn btn-success" v-if="status == 'pending'">Accept Friend</button>
                    <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
                    <span class="text-success" v-if="status == 'friends'">Friends</span>
                </p> 
            </div>   
        </div> 
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/check_relationship_status/' + this.profile_id )
               .then((response) =>
               {
                console.log(response)
                this.status = response.body.status
                this.loading=false
               })
        },
        props: ['profile_id'],


         data() {
            return {
                status: '',
                loading: true
            }
        },






    }
</script>
