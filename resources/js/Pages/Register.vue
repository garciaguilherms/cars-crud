<script>
export default {
    data() {
        return {
            registerForm: this.$inertia.form({
                name: '',
                email: '',
                password: '',
            })
        }
    },

    methods: {
        goToLogin() {
            this.$inertia.get('/login');
        },

        registerUser() {
            this.registerForm.post('/register/store', this.registerForm, {
                onSuccess: () => {
                    this.$inertia.get('/login');
                }
            });
        }
    }
}
</script>

<template>

    <body class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400 items-center flex justify-center content-center">
        <div>
            <div>
                <form @submit.prevent="registerUser()" class="m-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div>
                        <h1 class="text-xl font-bold mb-5">Cadastro</h1>
                        <input type="text" v-model="registerForm.name" name="name" placeholder="Nome"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="registerForm.email" name="email" placeholder="E-mail"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="registerForm.password" name="password" placeholder="Senha"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <button type="submit"
                        class="py-1 px-3 bg-indigo-400 hover:bg-indigo-600 rounded font-bold text-white">Cadastrar-se</button>
                    <button @click.prevent="goToLogin()" class="py-1 px-3 rounded font-bold text-gray-500">Já
                        é cadastrado?</button>
                </form>

            </div>
        </div>
    </body>

</template>