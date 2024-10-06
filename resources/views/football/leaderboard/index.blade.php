<x-layout>
    <x-slot:heading>
        Leaderboard
    </x-slot:heading>
    <x-nav-block></x-nav-block>

    <h2>Leaderboard Page!!!</h2>

    <h4>Current Week {{ $week }}</h4>
    <p>{{ $today }}</p>


    {{-- <section class="leaderboard">
        <div class="lb-head-left">
            <span class="name">Name</span>
            <span class="total">Total</span>
        </div>
        <div class="lb-head-right">
            <span class="week">1</span>
            <span class="week">2</span>
            <span class="week">3</span>
            <span class="week">4</span>
            <span class="week">5</span>
            <span class="week">6</span>
            <span class="week">7</span>
            <span class="week">8</span>
            <span class="week">9</span>
            <span class="week">10</span>
            <span class="week">11</span>
            <span class="week">12</span>
            <span class="week">13</span>
            <span class="week">14</span>
            <span class="week">15</span>
            <span class="week">16</span>
            <span class="week">17</span>
            <span class="week">18</span>
        </div>
    </section> --}}


    <script>
        const week = @json($week);
        const users = @json($users);
        const games = @json($games);
        const picks = @json($picks);
        const user = @json($user);
        const teams =@json($teams);
        const boardDiv = document.querySelector(".leaderboard");
        const boardDataLeft = document.querySelector(".lb-left")
        const boardDataRight = document.querySelector(".lb-right")

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
    const w = this.week
    const user = this.currentUser
    const g = this.games
    const p = this.picks
    const t = this.teams
    const u = this.users

    //utilitiy functions
    function teamById(id) {
      const res = t.find((team) => team.teamid === id)
      return res
    }

    function gameById(id) {
      const res = g.find((game) => game.gameid === id)
      return res
    }

    // utility function to get the array of games for a given week
    function gamesThisWeek(wk) {
      const res = g.filter((game) => game.gameweek === wk)
      return res
    }

    function whoWon(gameid) {
      const game = gameById(gameid)
      const { homepts, awaypts, hometeam, awayteam, gamestatus } = game
      const result = []
      //is game final?
      if (gamestatus === 6) {
        //is game tie?
        if (homepts === awaypts) {
          result.push(hometeam, awayteam)
        }
        //who won?
        if (homepts > awaypts) {
          result.push(hometeam)
        }
        if (awaypts > homepts) {
          result.push(awayteam)
        }
      }
      return result
    }

    function whoLost(gameid) {
      const game = gameById(gameid)
      const { homepts, awaypts, hometeam, awayteam, gamestatus } = game
      const result = []
      //is game final?
      if (gamestatus === 6) {
        //who won?
        if (homepts < awaypts) {
          result.push(hometeam)
        }
        if (awaypts < homepts) {
          result.push(awayteam)
        }
      }
      return result
    }

    for (let game of g) {
      game.winner = whoWon(game.gameid)
      game.loser = whoLost(game.gameid)
    }

    const gameInfo = gamesThisWeek(this.week).map((game) => game)

    const winners = gameInfo.map((game) => game.winner).flat(1)
    const losers = gameInfo.map((game) => game.loser).flat(1)

    const winnersShortname = []
    for (const winner of winners) {
      let sname = teamById(winner).shortname
      winnersShortname.push(sname)
    }

    const losersShortname = []
    for (const loser of losers) {
      let sname = teamById(loser).shortname
      losersShortname.push(sname)
    }

    for (let pick of p) {
      pick.gameInfo = gameById(pick.gameid)
      const { winner } = pick.gameInfo
      winner.includes(pick.pick)
        ? (pick.ptsWon = pick.points)
        : (pick.ptsWon = 0)
    }

    for (let user of u) {
      user.picks = p.filter((pick) => pick.userid === user.userid)
      user.total = 0
      for (let pick of user.picks) {
        user.total += pick.ptsWon
      }
      user.weekly = []
      for (let i = 1; i <= 18; i++) {
        const weeklyPicks = user.picks.filter((pick) => {
          const w = gameById(pick.gameid)
          if (w.gameweek === i) {
            return pick
          }
        })
        let count = 0
        for (let pick of weeklyPicks) {
          count += pick.ptsWon
        }
        user.weekly.push(count)
      }
    }

    // sort userpicks by total

    u.sort((a, b) => {
      const compare = b.total - a.total
      return compare
    })

    console.log(u)

    //display results
    const main = document.querySelector(".container")

    const leaderboardSection = document.createElement("section")
    leaderboardSection.classList.add("leaderboard")

    const board = document.createElement("div")
    board.classList.add("board")

    leaderboardSection.appendChild(board)
    main.appendChild(leaderboardSection)

    const left = document.createElement("div")
    left.classList.add("lb-left")

    const right = document.createElement("div")
    right.classList.add("lb-right")

    // create header

    let leftHead = `
        <div class='lb-head-left'>
            <span class="headname">Name</span>
            <span class="headtotal">Total</span>
        </div>`

    left.insertAdjacentHTML("beforeend", leftHead)

    let rightHead = `
        <div class='lb-head-right'>
            <span class="headwk">1</span>
            <span class="headwk">2</span>
            <span class="headwk">3</span>
            <span class="headwk">4</span>
            <span class="headwk">5</span>
            <span class="headwk">6</span>
            <span class="headwk">7</span>
            <span class="headwk">8</span>
            <span class="headwk">9</span>
            <span class="headwk">10</span>
            <span class="headwk">11</span>
            <span class="headwk">12</span>
            <span class="headwk">13</span>
            <span class="headwk">14</span>
            <span class="headwk">15</span>
            <span class="headwk">16</span>
            <span class="headwk">17</span>
            <span class="headwk">18</span>
        </div>
    `
    right.insertAdjacentHTML("beforeend", rightHead)

    for (let user of u) {
      let cuser = false
      if (user.userid === this.currentUser) {
        cuser = true
      }
      let bodyLeft = `
        <div class="lb-row-left ${cuser === true ? "orange" : ""}">
            <span class="user-name">${user.first_name} ${user.last_name}</span>
            <span class="total">${user.total}</span>
        </div>
        `

      left.insertAdjacentHTML("beforeend", bodyLeft)

      let bodyRight = `
        <div class="lb-row-right ${cuser === true ? "orange" : ""}">
            <span class="lb-wk">${user.weekly[0]}</span>
            <span class="lb-wk">${user.weekly[1]}</span>
            <span class="lb-wk">${user.weekly[2]}</span>
            <span class="lb-wk">${user.weekly[3]}</span>
            <span class="lb-wk">${user.weekly[4]}</span>
            <span class="lb-wk">${user.weekly[5]}</span>
            <span class="lb-wk">${user.weekly[6]}</span>
            <span class="lb-wk">${user.weekly[7]}</span>
            <span class="lb-wk">${user.weekly[8]}</span>
            <span class="lb-wk">${user.weekly[9]}</span>
            <span class="lb-wk">${user.weekly[10]}</span>
            <span class="lb-wk">${user.weekly[11]}</span>
            <span class="lb-wk">${user.weekly[12]}</span>
            <span class="lb-wk">${user.weekly[13]}</span>
            <span class="lb-wk">${user.weekly[14]}</span>
            <span class="lb-wk">${user.weekly[15]}</span>
            <span class="lb-wk">${user.weekly[16]}</span>
            <span class="lb-wk">${user.weekly[17]}</span>
        </div>
     `
      right.insertAdjacentHTML("beforeend", bodyRight)
    }

    board.append(left, right)
  }
}

const l = new Leaderboard(user, games, users, picks, teams)






        // const updatedGames = games.map(game => {
        //     const homePts = parseInt(game.home_pts, 10);
        //     const awayPts = parseInt(game.away_pts, 10);

        // // Initialize winner array
        //     let winner = [];

        //     // Calculate winner if final
        //     if(game.game_status === "6"){
        //         if (homePts > awayPts) {
        //             winner.push(game.home_team);
        //         } else if (homePts < awayPts) {
        //             winner.push(game.away_team);
        //         } else {
        //             winner.push(game.home_team, game.away_team);
        //         }
        //     }



        //     return {
        //     ...game, // Spread operator to keep other properties
        //     home_pts: homePts, // Convert to integer
        //     away_pts: awayPts, // Convert to integer
        //     game_status: parseInt(game.game_status, 10), // Convert to integer
        //     locked: parseInt(game.locked, 10), // Convert to integer
        //     winner: winner // Add the winner array
        //     };
        // });

        // console.log(updatedGames)

        // console.log(users)


        // const updatedPicks = picks.map(pick=>{
        //     const game = updatedGames.find(game=> game.id === pick.game)
        //     let ptsWon = 0
        //     if(game.winner.includes(pick.pick)){
        //         ptsWon = pick.points
        //     }

        //     // const user = users.find(user=> user.id === pick.user)

        //     return {
        //         ...pick,
        //         // userinfo: user,
        //         win: ptsWon
        //     }
        // })

        // console.log(updatedPicks)

        // function getUserPicks(id, picks){
        //     const userPicks = picks.filter(pick => pick.user === id)

        //     return userPicks
        // }

        // const updatedUsers = users.map(user=>{
        //     const picks = updatedPicks.filter(pick=>pick.user === user.id)
        //     return {
        //         ...user,
        //         picks: picks
        //     }
        // })

        // console.log(updatedUsers)



        // const dataLeft = updatedUsers.forEach(user => {
        //     const username = `<span class="playername">${user.first_name} ${user.last_name}</span>`

        //     const total = user.picks.forEach(pick=> {

        //     })
        //     boardDataLeft.insertAdjacentHTML('afterbegin',username)

        // });






    </script>



</x-layout>
