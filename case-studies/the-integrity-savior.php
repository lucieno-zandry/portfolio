<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Integrity Savior - Lucieno Zandry</title>
    <style>
        /* Base styles from the provided CSS */
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

        /* Adjusted Nav from Portfolio Template */
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

        /* Buttons */
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

        /* Reveal Animations */
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

    <!-- Navigation matched to your main portfolio flow -->
    <nav>
        <a href="/" class="nav-logo">Lucieno<span>.</span></a> <!--[cite: 1] -->
        <a href="mailto:lucienozandry4@gmail.com" class="secondary-btn">Hire me</a> <!--[cite: 1] -->
    </nav>

    <section class="reveal active">
        <div class="eyebrow">Case Study 01</div>
        <h1>The Integrity <br><span class="text-outline">Savior</span></h1>
        <div class="description">
            Designing an audit-safe checkout engine with immutable historical snapshots. Because data shouldn't rewrite itself.
        </div>
        <div class="cta-group">
            <span class="secondary-btn">Laravel</span>
            <span class="secondary-btn">MySQL</span>
            <span class="secondary-btn">TypeScript</span>
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Problem</span></h2>
        <div class="description">
            Imagine diagnosing an electrical short on your Motorbike, mapping out the wiring, and repairing it. Then, a week later, the publisher of the service manual retroactively changes the wiring diagram in your physical book while you sleep.
            <br><br>
            That is exactly what happens in a naive e-commerce database. A standard relational database relies strictly on foreign keys. If <code>Order #1042</code> simply points to <code>product_id: 99</code>, updating that product's price today will dynamically—and disastrously—alter last year's receipt. The accounting team is furious, and the system’s financial integrity is completely broken.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Solution</span></h2>
        <div class="description">
            We don't let history rewrite itself.
            <br><br>
            Instead of linking IDs in the cart, I engineered an immutable snapshot architecture. At the exact moment of checkout, the system serializes a deep copy of the <code>Product</code>, <code>Variant</code>, <code>Address</code>, and <code>ShippingMethod</code>.
            <br><br>
            These objects are saved as isolated snapshots (e.g., <code>ProductSnapshot</code>, <code>VariantSnapshot</code>) embedded directly into the <code>Order</code> record.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Outcome</span></h2>
        <div class="description">
            Bulletproof legal and financial compliance. Store administrators can now confidently delete obsolete variants, overhaul pricing brackets, and tweak shipping formulas without ever altering a single historical transaction.
            <br><br>
            It’s a defensive, predictable backend that doesn't wake anyone up with a database crisis at 2 AM. <!--[cite: 1] -->
        </div>
        <div class="cta-group" style="margin-top: 3rem;">
            <button class="primary-btn" onclick="window.close()">← Back to Portfolio</button>
        </div>
    </section>

    <div class="space"></div>

    <script>
        // Intersection Observer for scroll reveal animations
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active'); //[cite: 2]
                }
            });
        }, {
            threshold: 0.15
        });

        reveals.forEach(el => observer.observe(el));
    </script>
</body>

</html>