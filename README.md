PHP Proxy Checker

A simple, fast, and responsive PHP Proxy Checker for testing proxy servers from an uploaded list.

The application checks whether a proxy is reachable through an external IP service and displays useful information such as the returned IP address, location, ISP, ASN, response time, and proxy status.

✨ Features

- 📁 Upload proxy lists using TXT or CSV
- 🔍 Automatically validate "IP:PORT" entries
- ⚡ Check proxies using PHP cURL
- 🟢 Detect LIVE / UNBLOCKED proxies
- 🔴 Detect BLOCKED / FAILED proxies
- 🌐 Display the public IP returned through the proxy
- 📍 Show country and city
- 🏢 Show ISP information
- 🔢 Show ASN
- ⏱️ Display proxy response time in milliseconds
- 📊 Live checking progress bar
- 🔎 Search results by proxy, IP, location, ISP, or ASN
- 🏷️ Filter between:
  - All
  - Live / Unblocked
  - Blocked / Failed
- 💾 Save all working proxies with the Save Live / Unblocked button
- 📱 Fully responsive for mobile devices
- 💻 Desktop/PC compatible
- 🎨 Clean and modern interface
- 🚫 Duplicate proxies are automatically removed
- 🔐 Basic input validation

🛠️ Technologies

- PHP 8+
- HTML5
- CSS3
- JavaScript
- cURL
- ipwho.is for IP geolocation information
- ipify for testing the public IP returned through the proxy

📋 Requirements

Before installing, make sure your server has:

- PHP 8.0 or newer
- PHP cURL extension
- PHP file upload enabled
- Internet access
- Apache, Nginx, XAMPP, WAMP, or another PHP-compatible server

📂 Project Structure

proxy-checker/
│
├── index.php
├── api.php
├── README.md
│
└── assets/
    ├── app.js
    └── style.css

🚀 Installation

1. Download the project

Clone the repository:

git clone https://github.com/ahmadjani/php-proxy-checker.git

Or download the repository as a ZIP file and extract it.

2. XAMPP Installation

For XAMPP, copy the project into:

C:\xampp\htdocs\proxy-checker

Start:

Apache

Then open:

http://localhost/proxy-checker/

3. Enable PHP cURL

Make sure the following extension is enabled in your "php.ini":

extension=curl

Restart Apache after making changes.

📄 Proxy List Format

The simplest supported format is one proxy per line:

1.2.3.4:8080
5.6.7.8:3128
9.10.11.12:80

You can also use:

http://1.2.3.4:8080
https://5.6.7.8:3128

Comments and empty lines are ignored:

# My proxy list

1.2.3.4:8080
5.6.7.8:3128

# Another proxy
9.10.11.12:80

🔎 How Proxy Checking Works

The application performs the following process:

Upload Proxy List
       ↓
Validate IP:PORT
       ↓
Remove Duplicates
       ↓
Connect Through Proxy
       ↓
Request Public IP
       ↓
Check Response
       ↓
Get IP Information
       ↓
Display Result

A proxy is considered LIVE / UNBLOCKED when the request successfully goes through the proxy and a valid public IP is returned.

If the connection fails, times out, or does not return a valid IP, the proxy is marked:

BLOCKED / FAILED

📊 Result Information

For each tested proxy, the application can display:

Field| Description
Proxy| Original proxy address
Status| Live / Unblocked or Blocked / Failed
IP| Public IP returned through the proxy
Location| Country and city
ISP| Internet Service Provider
ASN| Autonomous System Number
Time| Request response time

💾 Save Working Proxies

After checking the list, click:

Save Live / Unblocked

The application creates:

live-unblocked-proxies.txt

Only successfully working proxies are included in this file.

Example:

1.2.3.4:8080
5.6.7.8:3128

📱 Responsive Design

The interface is designed to work on:

- 📱 Android phones
- 📱 iPhone
- 📲 Tablets
- 💻 Laptops
- 🖥️ Desktop computers

The proxy results table becomes horizontally scrollable on smaller screens so that all information remains accessible.

⚙️ Configuration

The main checking settings are located in:

api.php

For example:

const MAX_FILE_SIZE = 5 * 1024 * 1024;
const CONNECT_TIMEOUT = 8;
const REQUEST_TIMEOUT = 12;

You can adjust these values according to your server requirements.

🌐 External Services

This project currently uses:

ipify

Used to determine the public IP returned through the proxy.

https://api.ipify.org

ipwho.is

Used to retrieve IP geolocation and network information such as:

- Country
- City
- ISP
- ASN

https://ipwho.is/

Internet access is therefore required for accurate checking and geolocation.

⚠️ Important Limitations

This version is primarily designed for HTTP/HTTPS proxy testing.

A proxy being marked LIVE / UNBLOCKED means it successfully passed this application's connectivity test. It does not guarantee that the proxy will work with every website or service.

Some websites may block the proxy independently.

IP geolocation is also not guaranteed to be perfectly accurate.

🔒 Security Considerations

If you deploy this application publicly:

- Set a reasonable upload size limit.
- Validate uploaded files.
- Restrict access if the checker is intended for private use.
- Add authentication for public deployments.
- Add rate limiting to prevent abuse.
- Do not allow arbitrary URL fetching from users.
- Keep PHP and server software updated.

📌 Roadmap

Possible future improvements:

- [ ] SOCKS4 support
- [ ] SOCKS5 support
- [ ] HTTP/HTTPS proxy authentication
- [ ] Multi-threaded/concurrent checking
- [ ] Pause and resume checking
- [ ] Export CSV
- [ ] Export JSON
- [ ] Proxy anonymity detection
- [ ] HTTPS support verification
- [ ] Proxy country filtering
- [ ] ISP filtering
- [ ] Response-time filtering
- [ ] Database storage
- [ ] Proxy history
- [ ] API endpoint
- [ ] Dark mode
- [ ] User authentication
- [ ] Admin dashboard

🤝 Contributing

Contributions are welcome.

1. Fork this repository.
2. Create a new branch:

git checkout -b feature/my-feature

3. Make your changes.
4. Commit your changes:

git commit -m "Add new feature"

5. Push the branch:

git push origin feature/my-feature

6. Open a Pull Request.

📜 License

You can add your preferred open-source license to this project.

For example:

MIT License

If you use this project publicly, include the appropriate license file in the repository.

⚠️ Disclaimer

This project is provided for legitimate testing, development, networking, and educational purposes.

Only test proxy servers and networks that you are authorized to test. The author is not responsible for misuse of this software.

---

⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.
