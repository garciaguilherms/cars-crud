<script>
export default {
    props: {
        cars: Array,

    }
}

</script>

<template>

    <body class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400">
        <div class="flex justify-center items-center">
            <div class="bg-stone-50 w-full h-20 mb-5 flex justify-center items-center">
                <div>
                    <div>
                        <h1 class="font-bold">Histórico de Alterações</h1>
                    </div>
                </div>

            </div>

        </div>
        <div class="bg-white rounded-md shadow-md flex justify-center mx-8">
            <table class="table-auto">
                <div>
                    <thead>
                        <tr>
                            <th class="px-20">Nome</th>
                            <th class="px-20">Modelo</th>
                            <th class="px-20">Ano</th>
                            <th class="px-20">Cor</th>
                            <th class="px-20">Data</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-base" v-for="car in cars" :key="car.id">
                            <td class="px-20 py-2">{{ car.name }}</td>
                            <td class="px-20 py-2">{{ car.model }}</td>
                            <td class="px-20 py-2">{{ car.year }}</td>
                            <td class="px-20 py-2">{{ car.color }}</td>
                            <td class="px-20 py-2">{{ car.created_at }}</td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>
    </body>
</template>