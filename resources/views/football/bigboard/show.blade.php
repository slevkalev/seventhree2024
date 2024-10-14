<x-layout_dash>
    <x-slot:heading>
        Bigboard
    </x-slot:heading>

    <x-nav-block></x-nav-block>
    <x-nav-week-bigboard></x-nav-week-bigboard>

    <h2>Bigboard - Week {{ $week }}</h2>

    <div class="board">
        <div class="board-left"></div>
        <div class="board-right"></div>
    </div>



    <script>
        const week = @json($week);
        const users = @json($users);
        const games = @json($games);
        const teams = @json($teams);
        const picks = @json($picks);
        const currentUser = @json($currentUser);
        const numberOfGames = @json($numberOfGames);
        const boardDiv = document.querySelector(".board");
        const header = document.querySelector('.header')

        console.log(picks)

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name} ${currentUser.last_name}</div>`)

        const picksForWeek = picks.filter(pick=>{
           if(games[pick.game -1].week === parseInt(week)) return pick
        })



        const gamesWithResult = games.map(game => {
            const homePoints = parseInt(game.home_pts);
            const awayPoints = parseInt(game.away_pts);
            const scoreDifference = homePoints - awayPoints;

            let winner = [];

            if (game.game_status === "6") {
                if (scoreDifference === 0) {
                    winner = [game.home_team, game.away_team]; // Both teams tie
                } else if (scoreDifference > 0) {
                    winner = [game.home_team]; // Home team wins
                } else {
                    winner = [game.away_team]; // Away team wins
                }
            }

            return {
                ...game,
                winner: winner,
            };
        });

        const userPicks = users.map(user => {
            // Filter picks for this user
            let userPicksArray = picksForWeek.filter(pick => pick.user === user.id);

            let userPicksWithResult = userPicksArray.map(pick => {
                let game = gamesWithResult.find(game => game.id === pick.game);


                if(game.game_status !=="6"){

                    return {
                        ...pick,
                        won: 0,
                        missed: 0
                    }

                }else{

                    let won = game.winner.includes(pick.pick) ? pick.points : 0;

                    let missed = !game.winner.includes(pick.pick) ? pick.points : 0


                    return {
                        ...pick,
                       won: won,
                       missed: missed
                    }
                }

            });

            // Sort the picks array

            userPicksWithResult.sort((a, b) => {
                if (a.points < b.points) return -1;
                if (a.points > b.points) return 1;
                return 0;
            });


            return {
                ...user,
                picks: userPicksWithResult

            };
        });



        let usersWithTotal = userPicks.map(user=>{

            let missed = user.picks.reduce((a, c) => {
                return a + c.missed
            },0)


            let total = user.picks.reduce((a, c)=>{
                return a + c.won
            },0)


            return {
                ...user,
                total:total,
                missed:missed,
            }
        })

        console.log( usersWithTotal)





        // add headings to left side of the board

        const leftHeadings =  `<div class="left-headings">
                <span class="name-span">Name</span>
                <span class="total-span">Total</span>
                <span class="miss-span">Miss</span>
                </div>`

        //add user data to left side of the board

        let leftData =`<div class="left-data">`
            usersWithTotal.forEach(user=>{
                let userFlag = user.id === currentUser.id? "current-user" : ""
                leftData += `<div class="row ${userFlag}">
                        <span class="data-name-span">${user.first_name} ${user.last_name.charAt(0)}</span>
                        <span class="data-total-span">${user.total}</span>
                        <span class="data-missed-span">${user.missed}</span>
                    </div>
                `
            })
        leftData += `</div>`

        document.querySelector(".board-left").insertAdjacentHTML('afterbegin', leftHeadings)
        document.querySelector(".board-left").insertAdjacentHTML('beforeend', leftData)

        //add headings to right sid of the board

        let rightHeadings = '<div class="right-headings">'

        for(let x = 0; x<numberOfGames; x++){
            rightHeadings += `<span class="head-span">${x+1}</span>`
        }

        rightHeadings+=`</div>`


        //add user pick data to the right side of the board

        let rightData = `<div class="right-data">`
            usersWithTotal.forEach(user=>{
                let userFlag = user.id === currentUser.id? "current-user" : ""
                rightData += `<div class="row ${userFlag}">`


                for(let i = 0; i < numberOfGames; i++){

                    const pick = user.picks.find(pick=>pick.points -1 === i)

                    const pickValue = !pick?  "--": pick.pick

                    if(pick){

                        let game = gamesWithResult.find(game=>game.id === pick.game)

                        let winLoss = ""
                        if(game.game_status === "6"){

                        winLoss = game.winner.includes(pick.pick)? "win" :"loss"

                        }

                        rightData += `<span class="data-pick-span ${winLoss}">${pickValue}</span>`
                    }else{

                        rightData += `<span class="data-pick-span">${pickValue}</span>`

                    }

                }

                rightData += `</div>`
            })

        rightData += `</div>`

        document.querySelector(".board-right").insertAdjacentHTML('afterbegin', rightHeadings)
        document.querySelector(".board-right").insertAdjacentHTML('beforeend', rightData)

        const spans = document.querySelectorAll(".data-pick-span")

        // convert team id in data-pick-span to team short_name

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
</x-layout_dash>
