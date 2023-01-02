<script>
export default {
    methods: {
        goToRegister() {
            this.$inertia.get('/register');
        }
    }
}
</script>

<template>

    <body class="h-screen bg-gradient-to-r from-cyan-500 to-blue-500 items-center flex justify-center content-center">
        <div>
            <div>
                <form class="m-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div>
                        <h1 class="text-xl font-bold mb-5">Login</h1>
                        <input type="text" name="name" placeholder="E-mail"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" name="model" placeholder="Senha"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <button type="submit"
                        class="py-1 px-3 bg-sky-500 hover:bg-sky-700 rounded font-bold text-white">Entrar</button>
                    <button @click.prevent="goToRegister()" class="py-1 px-3 rounded font-bold text-gray-500">Não
                        é cadastrado?</button>
                </form>
            </div>
        </div>
    </body>

</template>