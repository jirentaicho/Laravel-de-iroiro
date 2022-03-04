<template>
    <div>
        <h1>ログインページ(WEB)</h1>

        <form @submit.prevent="login" class="mt-5">
            <div>
                <jet-label value="Email" />
                <jet-input id="email" type="text" v-model="params.email" />
            </div>

            <div>
                <jet-label value="PassWord" />
                <jet-input id="password" type="password" v-model="params.password" />
            </div>

            <jet-button>
                ログイン
            </jet-button>
        </form>


    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetLabel from '@/Jetstream/Label.vue'

    export default defineComponent({
        components: {
            JetInput,
            JetButton,
            JetLabel,
        },
        data(){
            return {
                params: {
                    email: "",
                    password: "",
                }
            }
        },
        methods: {
            login(){
                axios.post(route('api.login',this.params))
                    .then(res => {
                        // 取得したトークンをローカルストレージに保存する
                        localStorage.setItem('access_token', res.data.access_token);
                        location.href = route('web.mypage');
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
        }
    })
</script>
