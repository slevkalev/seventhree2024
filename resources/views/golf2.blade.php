<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golf Pools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="js/main.js" type="module" defer></script>
    <style>
    .hero-section {
        position: relative;
        background-image: url("/images/golf_pools.jpeg");
        background-size: cover;
        background-position: center 25%;
        background-repeat: no-repeat;
        height: 95vh;
        min-height: 500px; /* Fallback minimum height */
        color: white;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
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

    .hide{
        display: none;
    }

    </style>

</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center justify-content-center">

        <div class="hero-overlay">
            <a href="/" class="logo">Seventhree.ca</a>
            <a href="/login" class="login login-div">Login</a>
        </div>
        <div class="hero-content container">
            <h1 class="display-4 fw-bold">⛳ Join the Ultimate Golf Pool</h1>
            <p class="lead mb-4">Pick your golfers. Compete with friends. Win big prizes!</p>
            <a href="/golf-entry" class="btn btn-warning btn-lg">Enter Pool Now</a>
        </div>
    </section>

    <!-- Pool Info Section -->
    <section class="container my-5">
        <h2 class="text-center mb-5">Golf Pool FAQs</h2>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">⛳ How Does It Work?</summary>
                <p class="mt-2">
                    Select 6 professional golfers for each tournament you enter. Your score is the combined score of the 4 best-performing golfers who make the cut and complete all 4 rounds. Lowest score wins! Compete in major tournaments: The Players Championship, The Masters, The PGA Championship, The US Open, and The Open.
                </p>
            </details>
        </div>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">💰 Cost & Entry</summary>
                <ul class="mt-2 list-unstyled">
                    <li>• Each entry costs $10</li>
                    <li>• You can enter multiple times per tournament</li>
                    <li>• Payment via e-transfer to jsnelg@gmail.com</li>
                    <li>• Entries must be submitted by midnight the night before the tournament starts</li>
                    <li>• Each entry consists of 6 golfers</li>
                </ul>
            </details>
        </div>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">🏆 Scoring Rules</summary>
                <ul class="mt-2 list-unstyled">
                    <li>• To have a valid score, 4 golfers must make the cut and complete all 4 rounds</li>
                    <li>• Your entry score is the combination of the 4 best scores from your 6 selected golfers</li>
                    <li>• Golfers who miss the cut or withdraw do not count toward your score</li>
                    <li>• The entry with the lowest total score wins</li>
                </ul>
            </details>
        </div>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">🎯 Payouts</summary>
                <p class="mt-2"><strong>Payout breakdown depends on the number of entries:</strong></p>
                <ul class="mt-2 list-unstyled">
                    <li>• <strong>24 entries or less:</strong> Winner take all</li>
                    <li>• <strong>25-34 entries:</strong> 2nd place = $50, 1st place = the balance</li>
                    <li>• <strong>35-59 entries:</strong> 2nd place = $100, 3rd place = $50, 1st place = the balance</li>
                    <li>• <strong>60+ entries:</strong> 2nd place = $150, 3rd place = $100, 4th place = $50, 1st place = the balance</li>
                    <li>• Note: $1.50 is deducted from total payouts to cover e-transfer fees</li>
                </ul>
            </details>
        </div>

        <div class="mb-4">
            <details class="border rounded p-3">
                <summary class="h5 fw-semibold mb-2">❓ General Questions</summary>
                <p class="mt-2"><strong>What if a golfer withdraws?</strong></p>
                <p>If a golfer withdraws before their tee time, you can request a substitute by texting. The substitute must be a golfer from the field who hasn't teed off yet. If no substitution is requested in time, your entry continues with the remaining golfers.</p>

                <p class="mt-3"><strong>What tournaments are available?</strong></p>
                <p>
                    • The Players Championship (March)<br>
                    • The Masters (April)<br>
                    • The PGA Championship (May)<br>
                    • The US Open (June)<br>
                    • The Open (July)
                </p>

                <p class="mt-3"><strong>How do I submit my entry?</strong></p>
                <p>Click the "Enter Pool Now" button above to get started. Select your tournament and choose your 6 golfers. Submit payment via e-transfer to jsnelg@gmail.com.</p>
            </details>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
