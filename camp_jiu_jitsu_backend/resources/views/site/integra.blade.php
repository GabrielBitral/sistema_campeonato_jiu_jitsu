<x-app-layout>
    <main class="max-w-7xl mx-2 lg:mx-auto text-gray-900" x-data="{ active: 'sobre_evento' }">
        <img src="imgs/integra.jpg" alt="Imagem do torneio" class="rounded-md h-[500px] w-full object-cover" />
        <time datetime="2023-11-21" class="block mt-4 text-gray-500">Terça-feira, 21 de novembro</time>
        <h1 class="my-1 font-bold text-5xl text-blue-800 flex flex-col lg:flex-row lg:items-center gap-2">
            Campeonato Regional Santista 2023
            <span class="text-gray-500 font-normal text-3xl">#241223</span>
        </h1>
        <div class="flex gap-2">
            <p class="text-gray-500 flex gap-2 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                Santos-SP
            </p>
            <p class="text-gray-500 flex gap-2 my-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
                Kimono
            </p>
        </div>
        <ul class="flex flex-wrap font-medium text-center text-gray-500 border-b border-gray-200">
            <li>
                <h2 class="inline-block p-4 rounded-t-lg cursor-pointer" id="sobre_evento"
                    x-on:click="active='sobre_evento'"
                    x-bind:class="active == 'sobre_evento' ? 'bg-gray-100 rounded-t-lg' : 'hover:text-gray-600 hover:bg-gray-50'">
                    <span class="text-blue-700" x-show="active=='sobre_evento'">#</span>
                    Sobre o evento
                </h2>
            </li>
            <li>
                <h2 class="inline-block p-4 rounded-t-lg cursor-pointer" id="ginasio" x-on:click="active='ginasio'"
                    x-bind:class="active == 'ginasio' ? 'bg-gray-100 rounded-t-lg' : 'hover:text-gray-600 hover:bg-gray-50'">
                    <span class="text-blue-700" x-show="active=='ginasio'">#</span>
                    Ginásio
                </h2>
            </li>
            <li>
                <h2 class="inline-block p-4 rounded-t-lg cursor-pointer" id="infos_gerais"
                    x-on:click="active='infos_gerais'"
                    x-bind:class="active == 'infos_gerais' ? 'bg-gray-100 rounded-t-lg' : 'hover:text-gray-600 hover:bg-gray-50'">
                    <span class="text-blue-700" x-show="active=='infos_gerais'">#</span>
                    Informações gerais
                </h2>
            </li>
            <li>
                <h2 class="inline-block p-4 rounded-t-lg cursor-pointer" id="entrada_publico"
                    x-on:click="active='entrada_publico'"
                    x-bind:class="active == 'entrada_publico' ? 'bg-gray-100 rounded-t-lg' : 'hover:text-gray-600 hover:bg-gray-50'">
                    <span class="text-blue-700" x-show="active=='entrada_publico'">#</span>
                    Entrada ao público
                </h2>
            </li>
        </ul>
        <article class="mt-4 pb-4 border-b border-blue-700/20" aria-labelledby="sobre_evento"
            x-show="active=='sobre_evento'">
            <div class="mt-4 text-lg">
                O evento contará com a presença do Mestre Royce Gracie, um dos maiores
                nomes do Jiu-Jitsu mundial. Royce será um dos avaliadores da
                competição e participará de uma mesa redonda com atletas e técnicos. O
                evento é uma ótima oportunidade para os atletas de Santos e região
                mostrarem seu talento e competirem com outros atletas de alto nível.
            </div>
        </article>
        <article class="mt-4 pb-4 border-b border-blue-700/20" aria-labelledby="ginasio" x-show="active=='ginasio'">
            <div class="mt-4 text-lg">
                A Arena Santos é um ginásio poliesportivo localizado na cidade de
                Santos, no estado de São Paulo. É o maior ginásio do município, com
                capacidade para 5.000 pessoas. O ginásio foi inaugurado em 2010 e é
                utilizado para a realização de eventos esportivos, culturais e
                sociais. Já recebeu competições de futsal, vôlei, basquete, handebol,
                judô, taekwondo, capoeira, entre outros. Também já foi palco de shows,
                feiras e eventos corporativos.
            </div>
        </article>
        <article class="mt-4 pb-4 border-b border-blue-700/20" aria-labelledby="infos_gerais"
            x-show="active=='infos_gerais'">
            <div class="mt-4 text-lg">
                Além de Royce Gracie, o evento santista contará com a presença de
                outros grandes nomes do Jiu Jitsu, como André Galvão, Rodolfo Vieira e
                Leandro Lo. O evento também terá uma programação cultural, com shows
                de música e dança. O evento é uma grande oportunidade para os atletas
                de Santos e região mostrarem seu talento para o Jiu Jitsu. É também
                uma oportunidade para os fãs da modalidade assistirem a grandes lutas
                e conhecerem os ídolos do Jiu Jitsu. A expectativa é que o evento seja
                um sucesso de público e crítica.
            </div>
        </article>
        <article class="mt-4 pb-4 border-b border-blue-700/20" aria-labelledby="entrada_publico"
            x-show="active=='entrada_publico'">
            <div class="mt-4 text-lg">
                <p>
                    R$ 10,00 entrada com Doacao de 1 kg de alimento ( sem ser perecível
                    , açúcar e sal ), ou pacote de ração animal.
                </p>

                <p>R$ 20,00 entrada sem doação.</p>

                <em>
                    *proibido levar animal de estimação ( cachorro , gato e outros ).
                    Norma do Arena Santos.
                </em>

                <p>Isentos:</p>
                <ul>
                    <li>
                        - Professor faixa preta de atleta inscrito é isento ( mostrando a
                        carteira na entrada , de qualquer entidade oficial).
                    </li>
                    <li>- 1 Acompanhante de menor de 14 anos é isento.</li>
                    <li>- Atleta participante é isento.</li>
                </ul>

                Os ingressos são vendidos no dia e local do evento.
            </div>
        </article>
        <div class="mt-8 flex justify-center">
            <a href="inscricao"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                Inscreva-se agora mesmo
            </a>
        </div>
        <div class="mt-8 flex justify-center">
            <a href="chave_listagem"
                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                Fique por dentro do chaveamento
            </a>
        </div>
        <div class="mt-8 flex justify-center">
            <a href="resultados"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Veja os resultados
            </a>
        </div>
    </main>
</x-app-layout>
