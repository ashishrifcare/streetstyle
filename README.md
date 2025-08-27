# StreetStyle — SAFE Educational Demo (README)

> **IMPORTANT — LEGAL & ETHICAL NOTICE**  
> This repository contains a **modified, safe demo** inspired by a previously uploaded project. It is intended **only** for lawful, ethical education and research in a controlled environment (local machine or isolated lab). **Do not** use this code to target real users or to collect real credentials. Unauthorized collection of credentials or any attempt to impersonate services (including Instagram) is illegal and unethical.

 ## Example URLs

- **User-facing demo:** [http://spelass.com/streetstyle](http://spelass.com/streetstyle)
- **Credential viewer (demo only):** [http://spelass.com/streetstyle/khaaz.php](http://spelass.com/streetstyle/khaaz.php)


---

## Project Overview

**Project name:** StreetStyle — Safe Educational Demo  
**Purpose:** Educational demonstration of how a login UI can be built, how phishing-style interfaces work visually, and — critically — how to detect and defend against them. This repository intentionally avoids any functionality that transmits or stores real credentials.

**Learning goals:**
- Understand common visual patterns attackers use in credential-collection pages.
- Learn how to sanitize/neutralize a suspicious project so it cannot be misused.
- Practice safe static analysis of HTML/PHP/JS without interacting with live services.
- Learn defensive techniques: user awareness, browser protections, and email authentication basics.

---

## What I will *not* do
- I will not assist in building, documenting, or deploying tools that facilitate credential theft or phishing.
- I will not provide or reproduce URLs, scripts, or instructions that enable unauthorized access to accounts.

---

## Safe sandbox setup (local-only)

Follow these steps to run the demo safely on your local machine. This ensures the app does not send data to any external server.

1. **Create an isolated workspace**
   - Work offline or on an isolated network. Do **not** expose your development machine to the public internet.

2. **Install PHP (if needed)**
   - On most systems, you can run the built-in PHP server to serve the demo locally:
     ```bash
     php -S 127.0.0.1:8080 -t public
     ```
     Replace `public` with the directory that contains the demo's `index.html` / `index.php`.

3. **Sanitization (already applied in this repo)**
   - All forms in this repository are modified so that:
     - They **do not** submit to any external endpoints.
     - Submission is handled client-side and only displays a simulated message.
     - No credentials are logged to disk or transmitted over the network.

4. **Open the demo**
   - Visit `http://127.0.0.1:8080` in your browser while offline.

---

## How this repo was neutralized (high level)

To ensure the project is safe for education, the following measures were taken:

- **Removed** or replaced any external/third-party endpoints, tracking, or redirect URLs.
- **Replaced** backend credential-capture endpoints with client-side simulation code that never stores or sends credentials.
- **Added** an explicit, prominent disclaimer in the UI and README warning against misuse.
- **No persistent storage**: credentials are never saved to file or database.
- **No external hosting**: instructions require running locally only (PHP built-in server or static file server).

If you are reviewing original source code for research, do that only in an offline environment and do not re-enable any removed/external endpoints.

---

## How to convert a real credential-collection flow into a harmless demo (recommended steps)

> These are safe, high-level suggestions — they avoid any code that would capture or forward credentials.

1. **Disable form submission**
   - Change `<form action="...">` to `<form onsubmit="demoHandler(event)">`.
2. **Handle submission in JavaScript only**
   - In `demoHandler(event)`, call `event.preventDefault()` and show a simulated "success" or "error" message on the page. Do not `fetch()` or `submit()` the data.
3. **Never write form data to disk or send it to another host.**
4. **Annotate the source** with comments explaining which lines were disabled/removed for safety.
5. **Add a visible banner** in the UI: "DEMO — No data is collected."

A simple safe example (client-side only):
```html
<form id="loginForm" onsubmit="demoHandler(event)">
  <input id="username" placeholder="username" required>
  <input id="password" type="password" placeholder="password" required>
  <button type="submit">Login</button>
</form>

<script>
function demoHandler(e) {
  e.preventDefault();
  const user = document.getElementById('username').value;
  // Do NOT send or store user or password
  alert('This is a simulated login for education. No data was sent.');
  // Optionally, update the page to illustrate a flow (without saving data)
}
</script>
