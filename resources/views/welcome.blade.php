<html lang="en" class="h-full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>Donkeyquiz</title>
        <link id="titleLogo" rel="shortcut icon" href="/img/logo.svg">
    </head>
    <body class="font-poppins h-full">
        
        <div id="background" class="absolute w-screen h-screen -z-10">
            <div class="flex flex-col items-center mt-8 md:absolute md:ml-8">
                <img id="logo" src="/img/logo.svg" class="w-[50px] sm:w-[100px]" alt="">
                <p class="text-20 sm:text-24 font-semibold">donkeyquiz</p>
            </div>

            <svg viewbox="-100 0 200 200" class="absolute top-0 right-0 h-[30%] -z-20">
                <path id="blob-r" class="blob text-purple" fill="currentColor" d=""></path>
            </svg>

            <svg viewbox="100 0 200 200"class="absolute bottom-0 left-0 h-[30%] -z-20">
                <path id="blob-l" class="blob text-purple" fill="currentColor" d=""></path>
            </svg>
        </div>{{-- End of background --}}

        <div id="start" class="flex flex-col justify-center h-full">
            <p class="mx-auto text-black text-center text-black text-48 font-semibold">Svensk mästare i TP?</p>
            <p class="mx-auto max-w-xs sm:max-w-lg text-black text-center text-20 mt-10">Utmana vänner, kollegor och familj på frågesport. Svara på 35 samtida frågor i 7 olika kategorier.</p>
            <div id="init" class="button"><p>Klicka här för att starta</p></div>
        </div>{{-- End of start --}}

        <div id="question" class="hidden mx-auto flex flex-col justify-center h-full">
            <p id="categoryText" class="mx-auto text-center text-purple text-14 font-semibold">category</p>
            <p id="questionText" class="mx-auto text-center w-[70%] max-w-xs md:max-w-5xl mt-5 lg:mt-10 text-black text-16 sm:text-24 md:text-36 lg:text-48 font-semibold">question</p>
            <div id="toAnswer" class="button"><p>Se svar</p></div>
            
            <div class="mx-auto w-[70%] max-w-xs md:max-w-5xl mt-10">
                <hr class="border-purple border rounded-full ">
                <div id="questionBar" class="mt-[-7px] bg-black h-3 rounded-full"></div>
                <p id="questionCount" class="mt-4 text-center">Fråga X av 35</p>
            </div>
        </div>{{-- End of question --}}

        <div id="answer" class="hidden mx-auto flex flex-col justify-center h-full">
            <p class="mx-auto text-white text-14 font-semibold">Rätt svar</p>
            <p id="answerText"class="mx-auto text-center w-[70%] max-w-xs md:max-w-5xl mt-5 text-green text-16 sm:text-24 md:text-36 lg:text-48 font-semibold">"answer"</p>
            <p class="mx-auto mt-5 text-white text-14 font-semibold">svarade du rätt?</p>
            <div class="mx-auto flex mt-5">
                <div id="yes" class="w-32 mr-2 py-4 text-center bg-purple rounded-full border-2 border-white text-white text-16 font-semibold hover:bg-white hover:text-purple hover:cursor-pointer"><p>ja</p></div>
                <div id="no" class="w-32 ml-2 py-4 text-center bg-purple rounded-full border-2 border-white text-white text-16 font-semibold hover:bg-white hover:text-purple hover:cursor-pointer"><p>nej</p></div>
            </div>
            <div class="mx-auto w-[70%] max-w-xs md:max-w-5xl mt-10">
                <hr class="border-white border rounded-full ">
                <div id="answerBar"class="mt-[-7px] bg-white h-3 rounded-full w-[10%]"></div>
                <p id="answerCount" class="mt-4 text-center">Fråga x av 35</p>
            </div>
        </div>{{-- End of answer --}}
        
        <div id="result" class="hidden mx-auto flex flex-col justify-center h-full">
            <p class="mx-auto text-black text-14 font-semibold">Ditt resultat</p>
            <p id="totalCount" class="mx-auto text-center mt-5 text-black text-20 md:text-48 font-semibold">{n} av 35 rätt</p>
            
            <div class="mx-auto mt-5 w-[100%] max-w-[1000px] flex flex-row justify-evenly">
                <div id="film" class="flex flex-col items-center">
                    <ul id="filmList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Film & tv</p>
                </div>
                <div id="geografi" class="flex flex-col items-center">
                    <ul id="geografiList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Geografi</p>
                </div>
                <div id="historia" class="flex flex-col items-center">
                    <ul id="historiaList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Historia</p>
                </div>
                <div id="musik" class="flex flex-col items-center">
                    <ul id="musikList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Musik</p>
                </div>
                <div id="övrigt" class="flex flex-col items-center">
                    <ul id="övrigtList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Övrigt</p>
                </div>
                <div id="vetenskap" class="flex flex-col items-center">
                    <ul id="vetenskapList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Vetenskap</p>
                </div>
                <div id="sport" class="flex flex-col items-center">
                    <ul id="sportList">
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                        <li class="li"></li>
                    </ul>
                        <p class="mt-4 text-10 md:text-16">Sport</p>
                </div>
            </div>
            <div id="toStart" class="button"><p>en runda till</p></div>
        </div>{{-- End of result --}}

        <script type="module" crossorigin src="http://localhost:3000/@@vite/client"></script>
        <script type="module" crossorigin src="http://localhost:3000/resources/js/app.js"></script>
    </body>
</html>
