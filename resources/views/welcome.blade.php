<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHHEANG Hokleng | DevOps Engineer</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,700|inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --surface: #12121a;
            --border: #1e1e2e;
            --accent: #6c63ff;
            --accent2: #00d4aa;
            --accent3: #ff6b6b;
            --text: #e4e4e7;
            --muted: #71717a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated gradient background */
        .bg-gradient {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(108, 99, 255, 0.15), transparent),
                radial-gradient(ellipse 60% 40% at 80% 50%, rgba(0, 212, 170, 0.08), transparent),
                radial-gradient(ellipse 60% 40% at 20% 80%, rgba(255, 107, 107, 0.06), transparent);
        }

        .content { position: relative; z-index: 1; }

        /* Floating particles */
        .particles {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 0;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            width: 3px; height: 3px;
            background: var(--accent);
            border-radius: 50%;
            opacity: 0;
            animation: float-up 8s infinite;
        }
        .particle:nth-child(2) { left: 20%; animation-delay: 1s; background: var(--accent2); }
        .particle:nth-child(3) { left: 40%; animation-delay: 3s; }
        .particle:nth-child(4) { left: 60%; animation-delay: 2s; background: var(--accent3); }
        .particle:nth-child(5) { left: 75%; animation-delay: 4s; background: var(--accent2); }
        .particle:nth-child(6) { left: 90%; animation-delay: 5s; }
        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }

        @keyframes float-up {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.2; }
            100% { transform: translateY(-10vh) scale(1.5); opacity: 0; }
        }

        /* Hero section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 2rem;
        }

        .greeting {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--accent2);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeInUp 0.8s 0.2s forwards;
        }

        .name {
            font-size: clamp(2.5rem, 7vw, 5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 0.5rem;
            opacity: 0;
            animation: fadeInUp 0.8s 0.4s forwards;
        }

        .name .first { color: var(--text); }
        .name .last {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tagline {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            color: var(--muted);
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s 0.6s forwards;
        }

        .tagline .highlight {
            color: var(--accent);
            font-weight: 600;
        }

        /* Terminal card */
        .terminal {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            width: 100%;
            max-width: 600px;
            text-align: left;
            overflow: hidden;
            opacity: 0;
            animation: fadeInUp 0.8s 0.8s forwards;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .terminal-header {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            background: rgba(255,255,255,0.03);
            border-bottom: 1px solid var(--border);
        }

        .terminal-dot {
            width: 12px; height: 12px;
            border-radius: 50%;
        }
        .terminal-dot.red { background: #ff5f57; }
        .terminal-dot.yellow { background: #febc2e; }
        .terminal-dot.green { background: #28c840; }

        .terminal-title {
            margin-left: auto;
            margin-right: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            color: var(--muted);
        }

        .terminal-body {
            padding: 20px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.8;
        }

        .terminal-line {
            opacity: 0;
            animation: typeIn 0.5s forwards;
        }
        .terminal-line:nth-child(1) { animation-delay: 1.2s; }
        .terminal-line:nth-child(2) { animation-delay: 1.6s; }
        .terminal-line:nth-child(3) { animation-delay: 2.0s; }
        .terminal-line:nth-child(4) { animation-delay: 2.4s; }
        .terminal-line:nth-child(5) { animation-delay: 2.8s; }
        .terminal-line:nth-child(6) { animation-delay: 3.2s; }
        .terminal-line:nth-child(7) { animation-delay: 3.6s; }

        .prompt { color: var(--accent2); }
        .cmd { color: var(--text); }
        .output { color: var(--muted); }
        .val { color: var(--accent); }
        .success { color: var(--accent2); }
        .warn { color: #febc2e; }

        @keyframes typeIn {
            from { opacity: 0; transform: translateX(-10px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Skills section */
        .section {
            padding: 5rem 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title span {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .skill-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .skill-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 10px 40px rgba(108, 99, 255, 0.15);
        }

        .skill-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .skill-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .skill-desc {
            font-size: 0.85rem;
            color: var(--muted);
            line-height: 1.6;
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 20px;
            background: rgba(108, 99, 255, 0.1);
            color: var(--accent);
            border: 1px solid rgba(108, 99, 255, 0.2);
        }

        .tag.green {
            background: rgba(0, 212, 170, 0.1);
            color: var(--accent2);
            border-color: rgba(0, 212, 170, 0.2);
        }

        .tag.red {
            background: rgba(255, 107, 107, 0.1);
            color: var(--accent3);
            border-color: rgba(255, 107, 107, 0.2);
        }

        /* Pipeline section */
        .pipeline {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0;
            margin-top: 2rem;
        }

        .pipeline-step {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1rem 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .pipeline-step:hover {
            border-color: var(--accent2);
            box-shadow: 0 0 20px rgba(0, 212, 170, 0.15);
        }

        .pipeline-step .step-icon { font-size: 1.5rem; margin-bottom: 0.5rem; }
        .pipeline-step .step-label { color: var(--muted); font-size: 0.75rem; }

        .pipeline-arrow {
            color: var(--accent);
            font-size: 1.5rem;
            padding: 0 0.5rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 3rem 2rem;
            border-top: 1px solid var(--border);
            margin-top: 3rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .footer-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-links a:hover { color: var(--accent); }

        .footer-copy {
            font-size: 0.8rem;
            color: var(--muted);
        }

        .footer-copy .heart { color: var(--accent3); }

        /* Status badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(0, 212, 170, 0.1);
            border: 1px solid rgba(0, 212, 170, 0.2);
            border-radius: 20px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            color: var(--accent2);
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s 1s forwards;
        }

        .status-dot {
            width: 8px; height: 8px;
            background: var(--accent2);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 0 0 rgba(0, 212, 170, 0.4); }
            50% { opacity: 0.8; box-shadow: 0 0 0 6px rgba(0, 212, 170, 0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="bg-gradient"></div>

    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="content">
        <!-- Hero -->
        <section class="hero">
            <div class="greeting">👋 Soursdey! Welcome to my space</div>
            <h1 class="name">
                <span class="first">CHHEANG </span><span class="last">Hokleng</span>
            </h1>
            <p class="tagline">
                <span class="highlight">DevOps Engineer</span> &nbsp;·&nbsp; I4C Student &nbsp;·&nbsp; CI/CD Enthusiast
            </p>

            <div class="status-badge">
                <span class="status-dot"></span>
                Pipeline Running — All Systems Operational
            </div>

            <div class="terminal">
                <div class="terminal-header">
                    <span class="terminal-dot red"></span>
                    <span class="terminal-dot yellow"></span>
                    <span class="terminal-dot green"></span>
                    <span class="terminal-title">hokleng@jenkins ~ </span>
                </div>
                <div class="terminal-body">
                    <div class="terminal-line"><span class="prompt">$ </span><span class="cmd">whoami</span></div>
                    <div class="terminal-line"><span class="output">CHHEANG Hokleng — DevOps Student @ I4C GIC</span></div>
                    <div class="terminal-line"><span class="prompt">$ </span><span class="cmd">cat skills.txt</span></div>
                    <div class="terminal-line"><span class="val">Jenkins</span> · <span class="val">Ansible</span> · <span class="val">Docker/Podman</span> · <span class="val">Laravel</span> · <span class="val">Nginx</span></div>
                    <div class="terminal-line"><span class="prompt">$ </span><span class="cmd">kubectl get deployments</span></div>
                    <div class="terminal-line"><span class="success">✓ laravel-app   1/1   Running   178.128.93.188</span></div>
                    <div class="terminal-line"><span class="prompt">$ </span><span class="warn">█</span></div>
                </div>
            </div>
        </section>

        <!-- CI/CD Pipeline -->
        <section class="section fade-in">
            <h2 class="section-title">My <span>CI/CD Pipeline</span></h2>
            <div class="pipeline">
                <div class="pipeline-step">
                    <div class="step-icon">📦</div>
                    <div>Git Push</div>
                    <div class="step-label">GitHub</div>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <div class="step-icon">🔨</div>
                    <div>Build</div>
                    <div class="step-label">Jenkins</div>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <div class="step-icon">🧪</div>
                    <div>Test</div>
                    <div class="step-label">PHPUnit</div>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <div class="step-icon">🚀</div>
                    <div>Deploy</div>
                    <div class="step-label">Ansible</div>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <div class="step-icon">📬</div>
                    <div>Notify</div>
                    <div class="step-label">Telegram</div>
                </div>
            </div>
        </section>

        <!-- Skills -->
        <section class="section fade-in">
            <h2 class="section-title">Tech <span>Stack</span></h2>
            <div class="skills-grid">
                <div class="skill-card">
                    <div class="skill-icon">⚙️</div>
                    <div class="skill-name">CI/CD & Automation</div>
                    <div class="skill-desc">Building automated pipelines with Jenkins for continuous integration and deployment of Laravel applications.</div>
                    <div class="skill-tags">
                        <span class="tag">Jenkins</span>
                        <span class="tag">Jenkinsfile</span>
                        <span class="tag green">Ansible</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🐳</div>
                    <div class="skill-name">Containerization</div>
                    <div class="skill-desc">Running services in containers using Docker and Podman for consistent, reproducible environments.</div>
                    <div class="skill-tags">
                        <span class="tag">Docker</span>
                        <span class="tag">Podman</span>
                        <span class="tag green">Compose</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🌐</div>
                    <div class="skill-name">Web Development</div>
                    <div class="skill-desc">Full-stack development with Laravel, PHP, and modern frontend tools like Vite and Tailwind CSS.</div>
                    <div class="skill-tags">
                        <span class="tag red">Laravel</span>
                        <span class="tag red">PHP</span>
                        <span class="tag">Vite</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🖥️</div>
                    <div class="skill-name">Server & Infrastructure</div>
                    <div class="skill-desc">Managing Nginx web servers, SSH key auth, and deploying to cloud servers with automated provisioning.</div>
                    <div class="skill-tags">
                        <span class="tag green">Nginx</span>
                        <span class="tag green">SSH</span>
                        <span class="tag">Linux</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🔔</div>
                    <div class="skill-name">Monitoring & Alerts</div>
                    <div class="skill-desc">Real-time build notifications via Telegram bot and email alerts on pipeline failures.</div>
                    <div class="skill-tags">
                        <span class="tag">Telegram Bot</span>
                        <span class="tag red">Email Alerts</span>
                    </div>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">📚</div>
                    <div class="skill-name">Version Control</div>
                    <div class="skill-desc">Source code management with Git and GitHub, including automated webhook triggers.</div>
                    <div class="skill-tags">
                        <span class="tag">Git</span>
                        <span class="tag">GitHub</span>
                        <span class="tag green">Webhooks</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Info -->
        <section class="section fade-in">
            <h2 class="section-title">About This <span>Project</span></h2>
            <div class="terminal" style="opacity: 1; max-width: 700px; margin: 0 auto;">
                <div class="terminal-header">
                    <span class="terminal-dot red"></span>
                    <span class="terminal-dot yellow"></span>
                    <span class="terminal-dot green"></span>
                    <span class="terminal-title">project-info.sh</span>
                </div>
                <div class="terminal-body">
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Project:</span> <span class="cmd">TP03 — CI/CD Pipeline with Jenkins & Ansible</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Student:</span> <span class="cmd">CHHEANG Hokleng</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Class:</span> <span class="val">I4C — GIC Institute of Technology</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Year:</span> <span class="val">2026</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Server:</span> <span class="success">178.128.93.188/CHHEANG_Hokleng</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">GitHub:</span> <span class="cmd">github.com/HoklengPro/DevOps2026_2027_Lab-</span></div>
                    <div class="terminal-line" style="opacity:1"><span class="prompt">Status:</span> <span class="success">✓ Deployed & Running</span></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer fade-in">
            <div class="footer-links">
                <a href="https://github.com/HoklengPro/DevOps2026_2027_Lab-" target="_blank">📂 GitHub</a>
                <a href="http://178.128.93.188/CHHEANG_Hokleng" target="_blank">🌐 Live Site</a>
            </div>
            <p class="footer-copy">
                Built with <span class="heart">♥</span> by CHHEANG Hokleng · Deployed via Jenkins + Ansible · {{ date('Y') }}
            </p>
        </footer>
    </div>

    <script>
        // Scroll animation observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>
</body>
</html>
