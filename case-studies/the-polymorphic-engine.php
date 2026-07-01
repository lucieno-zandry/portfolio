<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Polymorphic Engine - Lucieno Zandry</title>
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
        <a href="index.html" class="nav-logo">Lucieno<span>.</span></a>
        <a href="mailto:lucienozandry4@gmail.com" class="secondary-btn">Hire me</a>
    </nav>

    <section class="reveal active">
        <div class="eyebrow">Case Study 03</div>
        <h1>Polymorphic <br><span class="text-outline">Engine</span></h1>
        <div class="description">
            Engineering a dynamic CMS for high-converting landing pages. Because developers shouldn't be pushing code just to update a marketing banner.
        </div>
        <div class="cta-group">
            <span class="secondary-btn">React</span>
            <span class="secondary-btn">Tsup</span>
            <span class="secondary-btn">Morph Relations</span>
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Problem</span></h2>
        <div class="description">
            Marketing wants to swap out a hero banner for Black Friday. Then they want to insert a "Featured Products" row right above the footer.
            <br><br>
            If the frontend layout is hardcoded, every marketing whim requires a developer, a pull request, and a production deployment. It creates a massive bottleneck where engineers are effectively acting as highly-paid content editors.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Solution</span></h2>
        <div class="description">
            I built a polymorphic layout engine using Laravel's Morph Relations (<code>landing_able_type</code> and <code>landing_able_id</code>) paired with a custom React component library bundled via <code>tsup</code>.
            <br><br>
            Instead of static page templates, the frontend consumes an ordered array of <code>LandingBlock</code> objects. A single generic database row can resolve dynamically into a specific <code>Product</code>, an entire <code>Category</code>, or custom JSON structures like <code>TestimonialsContent</code> or <code>FaqContent</code>. The React frontend simply maps over the blocks and renders the corresponding strict-typed component.
        </div>
    </section>

    <div class="space"></div>

    <section class="reveal">
        <h2>The <span class="text-outline">Outcome</span></h2>
        <div class="description">
            True decoupling. Marketing teams can assemble, reorder, and publish rich, diverse landing pages on the fly without touching a single line of React. The frontend remains strictly typed, the database stays relational, and engineers can go back to solving actual architectural problems instead of tweaking margin CSS.
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