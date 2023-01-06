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
                                    <th class="px-20">Nome</th>
                                    <th class="px-20">Modelo</th>
                                    <th class="px-20">Ano</th>
                                    <th class="px-20">Cor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-base">
                                    <td class="px-20 py-2">{{ car.name }}</td>
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
                                    <td class="px-20 py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                        laoreet, enim vitae elementum porta, enim tortor ultrices magna, laoreet
                                        sollicitudin massa lorem sed nulla. Aenean placerat eros eget libero volutpat
                                        sagittis. Duis metus lacus, pulvinar eu justo vel, vehicula ultrices nisi.
                                        Vivamus lacinia ultricies dui non dignissim. Nunc ut turpis aliquet, tempus eros
                                        quis, varius metus. Morbi ac ornare odio. Duis laoreet tempus sem at dignissim.
                                        Quisque eu felis ante. Sed pretium nibh id dapibus placerat. Interdum et
                                        malesuada fames ac ante ipsum primis in faucibus.

                                        Donec euismod risus sit amet lorem lobortis iaculis. Curabitur orci sem,
                                        condimentum vitae mi eget, condimentum efficitur purus. Integer placerat
                                        pellentesque urna. Curabitur et lacus est. Nulla ullamcorper sodales diam vitae
                                        tristique. Nunc elementum elit vel nunc tincidunt, vel lacinia purus consequat.
                                        Duis fringilla, augue condimentum aliquam tincidunt, ligula diam tristique
                                        lacus, non ultrices tortor ex vel neque. Suspendisse tempor convallis interdum.
                                        Nulla tempus elit et leo sagittis blandit. Nulla congue dignissim eros, id
                                        lobortis ipsum pellentesque vel. Duis non lacus a ipsum laoreet sodales.
                                        Phasellus rutrum volutpat facilisis.</td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </body>
</template>