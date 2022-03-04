<template>
    <div>
        <h1>ようこそ</h1>
        <P>{{name}}さん</P>
        <div>
            <button @click="logout">ログアウト</button>
        </div>

        <div>
            <button @click="getValue">ユーザーのデータを取得する</button>
        </div>
        

    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    export default defineComponent({
        components: {

        },
        data(){
            return {
                name: ""
            }
        },
        async mounted(){
            await axios.get(route('api.user'), {
                headers:{
                    Authorization: `Bearer ${localStorage.getItem('access_token')}`,
                    "Content-Type": "application/json",   
                }
            })
            .then( res => {
                console.log(res);
                this.name = res.data.name;
            })
            .catch( err => {
                console.log(err);
            })
        },
        methods: {
            async logout(){
                // post時はこの書き方でないと401エラーになる
                axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`;
                await axios.post(route('api.logout'), {
                    headers:{
                        "Content-Type": "application/json",                        
                    }
                })
                .then( res => {
                    console.log(res);
                    localStorage.removeItem('access_token');
                })
                .catch( err => {
                    console.log(err);
                })
            },
            async getValue(){
                axios.get(route('api.value'), {
                    headers:{
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`,
                        "Content-Type": "application/json",   
                    }
                })
                .then( res => {
                    console.log(res);
                })
                .catch( err => {
                    console.log(err);
                })
            }

        },
    })
</script>
