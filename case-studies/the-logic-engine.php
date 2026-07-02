<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Logic Engine - Lucieno Zandry</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:900');

        :root {
            --bg: #050816;
            --text: #f5f7ff;
            --muted: #9aa4bf;
            --accent: #6ea8ff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, sans-serif;
            overflow-x: hidden;
            width: 100%;
        }

        .sr-only {
            visibility: hidden;
            width: 0;
            height: 0;
            overflow: hidden;
        }

        .text-outline {
            color: transparent;
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.5);
        }

        h1,
        h2,
        h3 {
            font-family: 'Montserrat', sans-serif;
        }

        h1 {
            font-size: clamp(4rem, 10vw, 8rem);
            line-height: 0.9;
            margin: 0;
            font-weight: 900;
        }

        h2 {
            font-size: clamp(3rem, 7.5vw, 5rem);
            line-height: 0.9;
            margin: 0;
            font-weight: 900;
        }

        .eyebrow {
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.3rem;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .description {
            margin: 2rem 0;
            max-width: 700px;
            color: var(--muted);
            line-height: 1.7;
            font-size: 1.1rem;
        }

        .space {
            height: 150px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem clamp(1.5rem, 5vw, 4rem);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .nav-logo {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            font-weight: 900;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo span {
            color: var(--accent);
        }

        section {
            padding: 4rem clamp(1.5rem, 5vw, 4rem);
        }

        .cta-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .primary-btn,
        .secondary-btn {
            padding: 1rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .primary-btn {
            background: var(--accent);
            color: var(--bg);
            border: 2px solid var(--accent);
        }

        .secondary-btn {
            background: transparent;
            color: var(--text);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s cubic-bezier(0.5, 1, 0.89, 1),
                transform 1s cubic-bezier(0.5, 1, 0.89, 1);
            will-change: opacity, transform;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @media screen and (max-width: 760px) {
            .space {
                height: 80px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="/" class="nav-logo">Lucieno<span>.</span></a>
        <a href="mailto:lucienozandry4@gmail.com" class="secondary-btn">Hire me</a>
    </nav>

    <section class="reveal active">
        <div class="eyebrow">Case Study 02</div>
        <h1>The Logic <br><span class="text-outline">Engine</span></h1>
        <div class="description">
            Building a priority-stacked, conflict-free promotion system. Because users shouldn't be able to buy your entire inventory for $0.00.
        </div>
        <div class="cta-group">
            <span class="secondary-btn">Laravel ORM</span>
            <span class="secondary-btn">Algorithms</span>
            <span class="secondary-btn">SQL</span>
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Problem</span></h2>
        <div class="description">
            E-commerce discounts look deceptively simple until Black Friday hits. A user logs in with a 20% tier discount, applies a $15 store credit, and stacks a "HALF_OFF" coupon code from a newsletter.
            <br><br>
            In a basic system, one of three things happens: the discounts overwrite each other, the checkout crashes, or worse—the math applies in the wrong order, and the store ends up owing the customer money for taking an item.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Solution</span></h2>
        <div class="description">
            I engineered a deterministic, rules-based pricing engine. I designed the <code>Promotion</code> schema to handle strict mathematical orchestration on the fly.
            <br><br>
            Instead of running raw calculations blindly, the system checks <code>stackable</code> booleans, sorts by a strict <code>priority</code> index, and obeys explicit <code>apply_order</code> logic (ensuring percentages apply before fixed amounts). It even uses an <code>applies_to</code> scope to physically segregate B2B wholesale prices from retail holiday coupons.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Outcome</span></h2>
        <div class="description">
            Total mathematical certainty. The marketing team can now run 15 overlapping promotional campaigns simultaneously without breaking the checkout. The engine calculates the effective price flawlessly, respects <code>max_discount</code> caps, and never loses a dime to race conditions.
        </div>
        <div class="cta-group" style="margin-top: 3rem;">
            <button class="primary-btn" onclick="window.close()">← Back to Portfolio</button>
        </div>
    </section>

    <div class="space"></div>

    <script>
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.15
        });

        reveals.forEach(el => observer.observe(el));
    </script>
</body>

</html>