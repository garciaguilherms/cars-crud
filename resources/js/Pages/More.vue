<script>
export default {
    props: {
        car: Array,
    }
}
</script>

<template>

    <body class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400">
        <div class="flex justify-between items-center">
            <div class="bg-stone-50 w-full h-20 mb-5 flex justify-between items-center">

                <div>
                    <button @click.prevent="$inertia.get('/cars')"
                        class="py-1 px-4 ml-5 mr-5 bg-indigo-400 hover:bg-indigo-600 rounded font-bold text-white">Voltar</button>
                </div>
                <div>
                    <h1 class="font-bold mr-28">Informações</h1>
                </div>
                <div>

                </div>


            </div>

        </div>
        <div class="flex justify-center">
            <div class="block mx-8">
                <div class="flex justify-center">
                    <table class="table-auto divide-y">
                        <div class="bg-white bg-white rounded-md shadow-md divide-y">
                            <thead>
                                <tr>
                                    <th class="px-20">Marca</th>
                                    <th class="px-20">Modelo</th>
                                    <th class="px-20">Ano</th>
                                    <th class="px-20">Cor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-20 py-2">{{ car.brand.name }}</td>
                                    <td class="px-20 py-2">{{ car.model }}</td>
                                    <td class="px-20 py-2">{{ car.year }}</td>
                                    <td class="px-20 py-2">{{ car.color }}</td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>
                <div class="flex justify-center mt-5">
                    <table class="justify-center">
                        <div class="bg-white bg-white rounded-md shadow-md divide-y">
                            <thead>
                                <tr>
                                    <th class="px-20">Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-base">
                                    <td class="px-20 py-2">{{ car.description }}</td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </body>
</template>