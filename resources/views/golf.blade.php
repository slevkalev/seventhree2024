<x-layout>
    <x-slot:heading>
        Golf Pools
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>

    <style>
        .golf-landing {
            background-image: url('/golf_pools.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            padding: 60px 20px 40px;
        }

        .golf-landing::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .golf-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .golf-title {
            text-align: center;
            color: white;
            margin-bottom: 60px;
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .tournament-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .tournament-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tournament-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .tournament-card-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .tournament-card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .tournament-card-body {
            padding: 30px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .tournament-date {
            text-align: center;
            margin-bottom: 25px;
        }

        .date-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .date-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1e3c72;
        }

        .badge-current {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .entry-button {
            display: inline-block;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            width: 100%;
        }

        .entry-button:hover {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            transform: scale(1.02);
            text-decoration: none;
            color: white;
        }

        .entry-button:active {
            transform: scale(0.98);
        }

        .entry-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        @media (max-width: 768px) {
            .golf-title {
                font-size: 2.5rem;
                margin-bottom: 40px;
            }

            .tournament-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .golf-landing {
                padding: 40px 15px 30px;
            }
        }
    </style>

    <div class="golf-landing">
        <div class="golf-container">
            <h1 class="golf-title">⛳ Golf Pools</h1>

            <div class="tournament-grid">
                <!-- The Players Championship -->
                <div class="tournament-card">
                    <div class="tournament-card-header">
                        <h2>The Players Championship</h2>
                    </div>
                    <div class="tournament-card-body">
                        <div>
                            <div class="badge-current">Current Tournament</div>
                            <div class="tournament-date">
                                <div class="date-label">First Day</div>
                                <div class="date-value">March 20, 2025</div>
                            </div>
                        </div>
                        <a href="/golf-entry" class="entry-button">Enter Pool</a>
                    </div>
                </div>

                <!-- The Masters -->
                <div class="tournament-card">
                    <div class="tournament-card-header">
                        <h2>The Masters</h2>
                    </div>
                    <div class="tournament-card-body">
                        <div class="tournament-date">
                            <div class="date-label">First Day</div>
                            <div class="date-value">April 10, 2025</div>
                        </div>
                        <a href="/golf-entry" class="entry-button">Enter Pool</a>
                    </div>
                </div>

                <!-- The PGA Championship -->
                <div class="tournament-card">
                    <div class="tournament-card-header">
                        <h2>The PGA Championship</h2>
                    </div>
                    <div class="tournament-card-body">
                        <div class="tournament-date">
                            <div class="date-label">First Day</div>
                            <div class="date-value">May 15, 2025</div>
                        </div>
                        <a href="/golf-entry" class="entry-button">Enter Pool</a>
                    </div>
                </div>

                <!-- The US Open -->
                <div class="tournament-card">
                    <div class="tournament-card-header">
                        <h2>The US Open</h2>
                    </div>
                    <div class="tournament-card-body">
                        <div class="tournament-date">
                            <div class="date-label">First Day</div>
                            <div class="date-value">June 12, 2025</div>
                        </div>
                        <a href="/golf-entry" class="entry-button">Enter Pool</a>
                    </div>
                </div>

                <!-- The Open -->
                <div class="tournament-card">
                    <div class="tournament-card-header">
                        <h2>The Open</h2>
                    </div>
                    <div class="tournament-card-body">
                        <div class="tournament-date">
                            <div class="date-label">First Day</div>
                            <div class="date-value">July 10, 2025</div>
                        </div>
                        <a href="/golf-entry" class="entry-button">Enter Pool</a>
                    </div>
                </div>
            </div>

            <div class="rules-section">
                <h2 class="rules-title">Pool Information</h2>

                <div class="rules-grid">
                    <details class="rules-details">
                        <summary class="rules-summary">Pool Rules</summary>
                        <div class="rules-content">
                            <ul>
                                <li>Each entry is $10</li>
                                <li>Payment through e-transfer to jsnelg@gmail.com</li>
                                <li>Multiple entries is encouraged</li>
                                <li>Each entry consists of 6 golfers</li>
                                <li>To have a valid score 4 golfers have to make the cut and complete all 4 rounds</li>
                                <li>Entry score will be the combination of the 4 best scores by selected golfers who make the cut and complete all 4 rounds</li>
                                <li>Entries must be received by midnight the night before the tournament starts</li>
                                <li>In case of a player withdraws from the tournament prior to their tee time:
                                    <ul style="margin-top: 10px;">
                                        <li>A substitute for this golfer can be requested by texting</li>
                                        <li>The requested golfer can be picked from the field as long as they have not teed off</li>
                                        <li>If a request has not been made in time the entry will continue with the remaining golfers</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </details>

                    <details class="rules-details">
                        <summary class="rules-summary">Payouts</summary>
                        <div class="rules-content">
                            <ul>
                                <li>Payout breakdown is dependent on the number of entries</li>
                                <li>$1.50 is deducted from payout to cover e-transfer cost</li>
                                <li><strong>24 entries or less:</strong> Winner take all</li>
                                <li><strong>25-34 entries:</strong> 2nd = $50, 1st = the balance</li>
                                <li><strong>35-59 entries:</strong> 2nd = $100, 3rd = $50, 1st = the balance</li>
                                <li><strong>60 and up:</strong> 2nd = $150, 3rd = $100, 4th = $50, 1st = the balance</li>
                            </ul>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rules-section {
            margin-top: 60px;
            margin-bottom: 40px;
        }

        .rules-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .rules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .rules-details {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .rules-summary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            transition: all 0.3s ease;
        }

        .rules-summary:hover {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        }

        .rules-summary::marker {
            content: '';
        }

        .rules-details[open] .rules-summary {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        }

        .rules-content {
            padding: 25px;
            color: #333;
            line-height: 1.8;
        }

        .rules-content ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }

        .rules-content li {
            margin-bottom: 12px;
        }

        .rules-content strong {
            color: #1e3c72;
        }

        @media (max-width: 768px) {
            .rules-title {
                font-size: 1.5rem;
                margin-bottom: 20px;
            }

            .rules-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .rules-summary {
                font-size: 1rem;
                padding: 15px;
            }

            .rules-content {
                padding: 15px;
            }
        }
    </style>






</x-layout>
