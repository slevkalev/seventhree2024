
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




const field = []




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




            const newField = field.map(player=>{
                return {
                    alphaSort:player.alphaSort,
                    firstName: player.firstName,
                    lastName: player.lastName,
                    name:player.firstName + " " + player.lastName,
                    shortName: player.shortName
                }
            })

            const newFieldSorted = sortByField(newField, "alphaSort")


            const playerList = getFieldValues(newFieldSorted, "name")



            // console.log(playerList)

            const arrayString = playerList.toString()

            // console.log(arrayString)

            import data from './masters.json' with {type: "json"};
            // console.log(data); // Your JSON array is now available as 'data'





            function addArraySortProperty(arrayOfObjects) {
                return arrayOfObjects.map(obj => ({
                  ...obj,
                  arraySort: obj.last_name ? obj.last_name[0].toUpperCase() : ''
                }));
            }

            const mastersPlayers=addArraySortProperty(data.players)


            const names = data.players.map(person => `${person.first_name} ${person.last_name}`);



            const jsonString = JSON.stringify(names, null, 2);

            // console.log(jsonString)