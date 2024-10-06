<x-layout>
    <x-slot:heading>
        Bigboard
    </x-slot:heading>
    <x-nav-block></x-nav-block>


    <h2>Bigboard</h2>

    <div class="board"></div>



    <script>
        const users = @json($users);
        const games = @json($games);
        const teams = @json($teams);
        const picks = @json($picks);
        const currentUser = @json($currentUser);
        const numberOfGames = @json($numberOfGames);
        const boardDiv = document.querySelector(".board");
        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


        function bigboard(users, games, teams, picks, numberOfGames){
            const board = []
            const score = 0
            const missed = 0
            const total = {{ $maxPoints }} - missed


            for(let user of users){

                const userPicks = picks.filter(pick=>pick.user === user.id)

                const record = {}
                record.id = user.id
                record.name = `${user.first_name} ${user.last_name.charAt(0)}`
                record.missed = missed
                record.total =total

                for(let i = 1; i<=numberOfGames; i++){
                    record[`pick${i}`] = 0
                }

                for(let pick of picks){
                    record[`pick${pick.points}`] = pick.pick
                }

                record.currentUser = false

                if(currentUser){


                    (user.id === currentUser.id)? record.currentUser = true: record.currentUser = false

                }


                board.push(record)
            }


            return board

        }

        let data = bigboard(users, games, teams, picks, numberOfGames)
        console.log(data)


            //Create Headings
            let headings =    `<div class="headings">
                <span class="name-span">Name</span>
                <span class="total-span">Total</span>
                <span class="miss-span">Miss</span>`

            for(let i = 1; i <= numberOfGames; i++){
                headings += `<span class="head-span">${i}</span>`
            }

            headings += `</div>`


            boardDiv.insertAdjacentHTML('afterbegin', headings)

            //Insert Data
            data.forEach(record=>{

                let userPickDetails = `<div class="data">`

                Object.values(record).forEach(element => {

                     userPickDetails += `<span>${element}</span>`

                });

                userPickDetails += `</div>`

                boardDiv.insertAdjacentHTML('beforeend', userPickDetails)

            })

            const dataDiv = document.querySelectorAll('.data')

            for(let div of dataDiv){

                const spans = div.getElementsByTagName('span')

                spans[spans.length -1].classList.add("hide")

                if(spans[spans.length - 1].innerText === "true") div.classList.add("current-user")


                    for(let i = 0; i < spans.length; i++){
                        if(i === 0){ spans[i].classList.add('hide')}
                        if(i === 1){ spans[i].classList.add('data-name-span')}
                        if(i === 2){ spans[i].classList.add('data-total-span')}
                        if(i === 3){ spans[i].classList.add('data-miss-span')}
                        if(i > 3 && i < spans.length - 1){ spans[i].classList.add('data-pick-span')}
                        if(i === 0 && i === spans.length - 1){ spans[i].classList.add('hide')}
                    }
            }

            const spans = document.querySelectorAll(".data-pick-span")


            function teamShortName(team){
                let val = parseInt(team)
                let res = teams[val - 1]
                if(!res) return "--"
                return res.short_name
            }


            spans.forEach(span=>{
                let value = span.innerText
                span.innerText = teamShortName(value)
            })


            </script>
</x-layout>
