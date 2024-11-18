<x-layout>
    <x-slot:heading>
        Leaderboard
    </x-slot:heading>
    <x-nav-block></x-nav-block>

    <h2>Leaderboard Page!!!</h2>

    <h4>Current Week {{ $week }}</h4>



    <div class="board">
        <div class="board-left"></div>
        <div class="board-right"></div>
    </div>







    <script>
        const week = @json($week);
        const users = @json($users);
        const games = @json($games);
        const picks = @json($picks);
        const user = @json($user);
        const teams =@json($teams);
        const boardDiv = document.querySelector(".baord");
        const boardLeft = document.querySelector(".board-left")
        const boardRight = document.querySelector(".board-right")

        const header = document.querySelector('.header')
        header.insertAdjacentHTML('afterend', `<div class="logged-user">${user.first_name?? ""} ${user.last_name?? ""}</div>`)


        class Leaderboard {
            constructor(currentUser, games, users, picks, teams) {
                this.currentUser = currentUser
                this.games = games
                this.picks = picks
                this.users = users
                this.teams = teams
                this._refresh()
            }


            _refresh() {
                // const w = this.week
                const user = this.currentUser
                const g = this.games
                const p = this.picks
                const t = this.teams
                const u = this.users


                // Add game results to all game objects
                const gamesWithResult = g.map(game => {
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


                //utilitiy functions
                function teamById(id) {
                    const res = t.find((team) => team.id === id)
                    return res
                }

                function gameById(id) {
                    const res = gamesWithResult.find((game) => game.id === id)
                    return res
                }

                // utility function to get the array of games for a given week
                function gamesThisWeek(wk) {
                    const res = g.filter((game) => game.week === wk)
                    return res
                }



                // Create user weekly total array and add to all user objects
                const usersWithTotal = u.map(user=>{

                    const weekly=[]

                    for( let wk=1; wk<=18; wk++){
                        const picksForWeek = p.filter(pick=>{
                        if(g[pick.game -1].week === wk && user.id === pick.user) return pick
                        })


                        const results = picksForWeek.reduce((total, pick)=> {
                            const game = gameById(pick.game)

                            const res = game.winner.includes(pick.pick)? pick.points : 0
                            return res + total
                        },0)

                        weekly.push(results)


                    }

                    const total = weekly.reduce((a, c)=>{
                        return c + a
                    },0)

                    return {
                            ...user,
                            weekly: weekly,
                            total: total

                    }

                })

                console.log(usersWithTotal)

                usersWithTotal.sort((a, b) => {
                if (a.total > b.total) return -1;
                if (a.total < b.total) return 1;
                return 0;
            });



                //display results
                let leftHead = `
                    <div class='left-headings'>
                        <span class="name-span a-left">Name</span>
                        <span class="total-span">Total</span>
                    </div>`

                boardLeft.insertAdjacentHTML("beforeend", leftHead)

                let rightHead = `
                        <div class='right-headings'>
                            <span class="head-span">1</span>
                            <span class="head-span">2</span>
                            <span class="head-span">3</span>
                            <span class="head-span">4</span>
                            <span class="head-span">5</span>
                            <span class="head-span">6</span>
                            <span class="head-span">7</span>
                            <span class="head-span">8</span>
                            <span class="head-span">9</span>
                            <span class="head-span">10</span>
                            <span class="head-span">11</span>
                            <span class="head-span">12</span>
                            <span class="head-span">13</span>
                            <span class="head-span">14</span>
                            <span class="head-span">15</span>
                            <span class="head-span">16</span>
                            <span class="head-span">17</span>
                            <span class="head-span">18</span>
                        </div>
                    `
                boardRight.insertAdjacentHTML("beforeend", rightHead)



                let leftData = `<div class="left-data">`

                for (let poolUser of usersWithTotal) {
                    let userFlag = poolUser.id===user.id? "current-user" : ""
                    leftData+= `
                        <div class="row ${userFlag}">
                            <span class="data-name-span a-left">${poolUser.first_name} ${poolUser.last_name.charAt(0)}</span>
                            <span class="data-total-span">${poolUser.total}</span>
                        </div>
                        `

                }
                leftData += `</div>`

                boardLeft.insertAdjacentHTML("beforeend", leftData)


                let rightData = `<div class="right-data">`

                for (let poolUser of usersWithTotal) {

                    let userFlag = poolUser.id===user.id? "current-user" : ""


                        let bodyRight = `
                            <div class="lb-row-right ${userFlag}">
                                <span class="lb-wk">${poolUser.weekly[0]}</span>
                                <span class="lb-wk">${poolUser.weekly[1]}</span>
                                <span class="lb-wk">${poolUser.weekly[2]}</span>
                                <span class="lb-wk">${poolUser.weekly[3]}</span>
                                <span class="lb-wk">${poolUser.weekly[4]}</span>
                                <span class="lb-wk">${poolUser.weekly[5]}</span>
                                <span class="lb-wk">${poolUser.weekly[6]}</span>
                                <span class="lb-wk">${poolUser.weekly[7]}</span>
                                <span class="lb-wk">${poolUser.weekly[8]}</span>
                                <span class="lb-wk">${poolUser.weekly[9]}</span>
                                <span class="lb-wk">${poolUser.weekly[10]}</span>
                                <span class="lb-wk">${poolUser.weekly[11]}</span>
                                <span class="lb-wk">${poolUser.weekly[12]}</span>
                                <span class="lb-wk">${poolUser.weekly[13]}</span>
                                <span class="lb-wk">${poolUser.weekly[14]}</span>
                                <span class="lb-wk">${poolUser.weekly[15]}</span>
                                <span class="lb-wk">${poolUser.weekly[16]}</span>
                                <span class="lb-wk">${poolUser.weekly[17]}</span>
                            </div>
                        `
                        boardRight.insertAdjacentHTML("beforeend", bodyRight)
                    }
            }

        }

        const l = new Leaderboard(user, games, users, picks, teams)

    </script>



</x-layout>
