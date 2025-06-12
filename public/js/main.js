
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.includes("golf")) {
        console.log(window.location.href.includes("golf"))
        const loginDiv = document.querySelector('.login-div')
        loginDiv.style.display="none"
    }
})

const golfTournaments =[
    {
        name: "The Players Championship",
        start: "3/11/2025",
        course: "TPC Sawgrass",
        logo: "https://res.cloudinary.com/pgatour-prod/d_tournaments:logos:R000.png/tournaments/logos/R011.png",
        active: 1,
    },
    {
        name: "The Masters 2025",
        start: "4/10/2025",
        course: "Augusta National Golf Club",
        logo: "https://icon2.cleanpng.com/20180510/xtq/avsyhrlrh.webp",
        active: 0,
    },
    {
        name: "PGA Championship 2025",
        start: "5/15/2025",
        course: "Quail Hollow Golf & Country Club",
        logo: "https://cdn.prod.website-files.com/630fbdaf6751e7b380e52e6e/672cf2ffa0c38e6abdcf8f7d_25CH_Quail_Holllow_4C.png",
        active: 0,
    },
    {
        name: "US Open 2025",
        start: "6/12/2025",
        course: "Oakmont Golf Course",
        logo: "https://www.msgpromotions.com/wp-content/uploads/2024/04/2025-USO-Logo-for-MSG-Home-page.png",
        active: 0,
    },
    {
        name: "The Open 2025",
        start: "7/17/2025",
        course: "Royal Port Rush",
        logo: "https://www.theopen.com/-/media/images/logos/TheOpen_Poster.jpg",
        active: 0,
    }
]


const activeTournament = golfTournaments.find(tournament=> tournament.active === 1)



//####### swap the data  .json file below with current tournament data file name

import data from './usopen2025old.json' with {type: "json"};
    // console.log(data); // Your JSON array is now available as 'data'

const field = data.data.field
console.log(field.players)







    function sortByField(obj, fieldName) {
        // Ensure obj is an array
        const array = Array.isArray(obj) ? obj : [obj];

        // Sort the array based on the specified field
        return array.sort((a, b) => {
            if (a[fieldName] < b[fieldName]) return -1;
            if (a[fieldName] > b[fieldName]) return 1;
            return 0;
        });
    }

        function getFieldValues(obj, fieldName) {
        // Ensure obj is an array
        const array = Array.isArray(obj) ? obj : [obj];

        // Map over the array and extract the values of the specified field
        return array.map(item => item[fieldName]);
    }

    // function addArraySortProperty(arrayOfObjects) {
            //     return arrayOfObjects.map(obj => ({
            //       ...obj,
            //       arraySort: obj.last_name ? obj.last_name[0].toUpperCase() : ''
            //     }));
            // }

        function addArraySortProperty(arrayOfObjects) {
            return arrayOfObjects.map(obj => ({
                ...obj,
                arraySort: 1,
                // arraySort: obj.lastName ? obj.lastName[0].toUpperCase() : ''
            }));
        }




    const newField = field.players.map(player=>{
        return {
            alphaSort: player.lastName[0],
            firstName: player.firstName,
            lastName: player.lastName,
            name:player.firstName + " " + player.lastName,
            shortName: player.shortName
        }
    })



    const newFieldSorted = sortByField(newField, "alphaSort")


    const playerList = getFieldValues(newFieldSorted, "name")

    // console.log(newField)


            // console.log(playerList)

            const arrayString = playerList.toString()

            console.log(arrayString)






            // const names = data.players.map(person => `${person.first_name} ${person.last_name}`);
            const names = newFieldSorted.map(person => `${person.firstName} ${person.lastName}`);

            console.log(names.length)

            const jsonString = JSON.stringify(names, null, 2);

            // console.log(jsonString)


            // Ludvig Åberg, Byeong Hun An, Sam Bairstow, Jose Luis Ballester Barrio, Philip Barbaree, Zach Bauchou, Evan Beck, Daniel Berger, Christiaan Bezuidenhout, Akshay Bhatia, Zac Blair, Chandler Blanchet, Richard Bland, Keegan Bradley, Jacob Bridgeman, Jackson Buchanan, Sam Burns, Brady Calkins, Brian Campbell, Laurie Canter, Patrick Cantlay, Bud Cauley, Will Chandler, Wyndham Clark, Trevor Cone, Corey Conners, Cam Davis, Jason Day, Bryson DeChambeau, Thomas Detry, Roberto Díaz, Alistair Docherty, George Duangmanee, Nick Dunlap, Nico Echavarria, Harris English, Tony Finau, Matt Fitzpatrick, Tommy Fleetwood, Ryan Gerard, Lucas Glover, Emilio Gonzalez, Chris Gotterup, Max Greyserman, Ben Griffin, Lanto Griffin, Emiliano Grillo, Trevor Gutschewski, Grant Haefner, James Hahn, Brian Harman, Frankie Harris, Justin Hastings, Tyrrell Hatton, Russell Henley, Joey Herrera, Justin Hicks, Joe Highsmith, Tom Hoge, Rasmus Højgaard, Viktor Hovland, Mason Howell, Mark Hubbard, Mackenzie Hughes, Sungjae Im, Stephan Jaeger, Ben James, Dustin Johnson, Matthew Jordan, Johnny Keefer, Noah Kent, Michael Kim, Si Woo Kim, Tom Kim, Chris Kirk, George Kneiser, Brooks Koepka, Jackson Koivun, Jinichiro Kozuma, Jacques Kruyswijk, Michael La Sasso, Frederic LaCroix, Joakim Lagergren, Thriston Lawrence, Bryan Lee, Min Woo Lee, Marc Leishman, Riley Lewis, Justin Lower, Shane Lowry, Robert MacIntyre, Hideki Matsuyama, Denny McCarthy, Matt McCarty, Ryan McCormick, Rory McIlroy, Maverick McNealy, Phil Mickelson, Guido Migliozzi, Maxwell Moldovan, Edoardo Molinari, Collin Morikawa, Rasmus Neergaard-Petersen, James Nicholas, Joaquin Niemann, Niklas Norgaard, Andrew Novak, Thorbjørn Olesen, Alvaro Ortiz, Carlos Ortiz, Harrison Ott, Andrea Pavan, Matthieu Pavon, Taylor Pendrith, Victor Perez, Trent Phillips, Zachery Pollo, J.T. Poston, Jon Rahm, Aaron Rai, Patrick Reed, Davis Riley, Justin Rose, Xander Schauffele, Scottie Scheffler, Adam Schenk, Adam Scott, Lance Simpson, Cameron Smith, Jordan Smith, J.J. Spaun, Jordan Spieth, Sam Stevens, Sepp Straka, Yuta Sugiura, Preston Summerhays, Cameron Tankersley, Nick Taylor, Justin Thomas, Davis Thompson, Austen Truslow, Jhonattan Vegas, Kevin Velo, Scott Vincent, Matt Vogt, Matt Wallace, Tyler Weaver, Gary Woodland, Cameron Young, Erik van Rooyen
