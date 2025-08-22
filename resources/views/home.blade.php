<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Pool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
    .hero-section {
        position: relative;
        background-image: url("/images/football_pool_2025.jpeg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 95vh;
        min-height: 500px; /* Fallback minimum height */
        color: white;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 2rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .logo {
        position: absolute;
        left: 1em;
        font-family: "Kanit";
        font-size: 1.5rem;
        font-weight: 700;
        text-decoration: none;
        color: white;
        margin-top: .5em;

    }

    .login{
        position: absolute;
        right: 1em;
        text-decoration: none;
        color: white;
        border: 2px solid white;
        border-radius: 20px;
        padding: .25rem 1rem;
        margin-top: 1em;
    }

    .login:hover{
        background-color:rgba(244, 240, 240, 0.3);
    }

    ul{
      line-height: 2rem;
    }

    /* Optional: Tune height for very small mobile screens */
    @media (max-width: 576px) {
        .hero-section {
            height: 55vh;
        }
    }


</style>

</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center justify-content-center">

        <div class="hero-overlay">
            <a href="/" class="logo">Seventhree.ca</a>
            <a href="/login" class="login">Login</a>
        </div>
         {{-- <img src="/images/seventhree_ca_football_pool_2025.jpeg" alt="Football Pool Hero" class="absolute inset-0 w-full h-full object-cover z-0"> --}}
        <div class="hero-content container">
            <h1 class="display-4 fw-bold">Join the Ultimate Football Pool</h1>
            <p class="lead mb-4">Compete with friends. Predict matches. Win bragging rights (or prizes!).</p>
            <a href="/register" class="btn btn-warning btn-lg">Register Now</a>
        </div>
    </section>

    <!-- Pool Info Section -->
    <section class="container my-5">
        <h2 class="text-center mb-5">How It Works</h2>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">🏆 Pool Structure</summary>
                <p class="mt-2">
                    This is a confidence pool.  Picks consist of a team and a wager of 1-16 if there are 16 games in the week. In a perfect week with 16 games the max score is 136 points. The pool runs through the full season. Players submit picks for all games each week. Points are awarded for correct results. Ties count as correct. Weekly leaders and overall champions will be tracked.
                </p>
            </details>
        </div>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">📋 Rules</summary>
                <ul class="mt-2 list-unstyled">
                    <li>• Make a pick for every game.</li>
                    <li>• Rank all games 1-16 (depending on number of games in the week).</li>
                    <li>• Submit picks for all Thursday, Friday, Saturday and Sunday moning games prior to kickoff.</li>
                    <li>• Submit forms lock 1PM Sunday.  Make all Sunday and Monday picks before 1PM Sunday.</li>
                    <li>• Tie scores in NFL games result in a winning pick.</li>
                    <li>• Highest total weekly score wins for the week.  (Ties split the prize).</li>
                    <li>• Highest season total wins prize  (Ties split the prize).</li>
                </ul>
            </details>
        </div>

        <div>
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">💬 FAQs</summary>
                <p class="mt-2">
                    Still have questions? Contact the admin or visit our full rules page for more info.
                </p>
                <p>COST? - $75 for the season.  Payable prior to Week 1 Game 1 Kickoff (September 4th 8PM)</p>
                <p>PAYOUT? - To be determined.  It depends on the number of entries.  A table of prizes will be added after the season starts.  each weekly prize is $75 minus $1.50 for etransfer</p>
                <p>POOL FEE? - etransfer entry fee to jsnelg@gmail.com</p>
                <p>Provide a valid cell phone number and email address.   Upon winning a week you be texted to confirm the email to e-transfer.</p>
                <p>All new entrants will be contacted by text to confirm your entry</p>
            </details>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
