# PHP Proxy Checker

A simple, fast, and responsive PHP Proxy Checker for testing proxy servers from an uploaded list.

## Features

- Upload TXT or CSV proxy lists
- Validate IP:PORT entries
- Check HTTP/HTTPS proxies using PHP cURL
- Detect LIVE / UNBLOCKED proxies
- Detect BLOCKED / FAILED proxies
- Show public IP, country, city, ISP, ASN and response time
- Live checking progress bar
- Search and filter results
- Save live/unblocked proxies as a TXT file
- Responsive design for mobile, tablet and desktop
- Automatically remove duplicate proxies

## Technologies

- PHP 8+
- HTML5
- CSS3
- JavaScript
- cURL
- ipify
- ipwho.is

## Requirements

- PHP 8.0 or newer
- PHP cURL extension
- Internet access
- Apache, Nginx, XAMPP, WAMP, or another PHP-compatible server

## Installation

### XAMPP

Copy the project to:

```text
C:\xampp\htdocs\proxy-checker
```

Start Apache and open:

```text
http://localhost/proxy-checker/
```

Make sure cURL is enabled in `php.ini`:

```ini
extension=curl
```

Restart Apache after changing PHP settings.

## Proxy List Format

Use one proxy per line:

```text
1.2.3.4:8080
5.6.7.8:3128
9.10.11.12:80
```

HTTP/HTTPS prefixes are also accepted:

```text
http://1.2.3.4:8080
https://5.6.7.8:3128
```

## How It Works

```text
Upload Proxy List
       |
       v
Validate IP:PORT
       |
       v
Remove Duplicates
       |
       v
Connect Through Proxy
       |
       v
Request Public IP
       |
       v
Check Response
       |
       v
Get IP Information
       |
       v
Display Result
```

A proxy is marked **LIVE / UNBLOCKED** when the request successfully goes through the proxy and returns a valid public IP.

Failed connections or timeouts are marked **BLOCKED / FAILED**.

## Result Information

| Field | Description |
|---|---|
| Proxy | Original proxy address |
| Status | Live / Unblocked or Blocked / Failed |
| IP | Public IP returned through the proxy |
| Location | Country and city |
| ISP | Internet Service Provider |
| ASN | Autonomous System Number |
| Time | Response time |

## Save Live Proxies

After checking the list, click **Save Live / Unblocked**.

The application downloads:

```text
live-unblocked-proxies.txt
```

Only successfully working proxies are included.

## Project Structure

```text
proxy-checker/
├── index.php
├── api.php
├── README.md
└── assets/
    ├── app.js
    └── style.css
```

## External Services

### ipify

Used to determine the public IP returned through the proxy.

https://api.ipify.org

### ipwho.is

Used for country, city, ISP and ASN information.

https://ipwho.is/

## Configuration

Checking settings are located in `api.php`:

```php
const MAX_FILE_SIZE = 5 * 1024 * 1024;
const CONNECT_TIMEOUT = 8;
const REQUEST_TIMEOUT = 12;
```

## Limitations

This version is primarily designed for HTTP/HTTPS proxy testing.

LIVE / UNBLOCKED means the proxy passed this application's connectivity test. It does not guarantee that the proxy will work with every website or service.

IP geolocation may not always be perfectly accurate.

## Roadmap

- [ ] SOCKS4 support
- [ ] SOCKS5 support
- [ ] Proxy authentication
- [ ] Concurrent checking
- [ ] Pause and resume
- [ ] CSV export
- [ ] JSON export
- [ ] Proxy anonymity detection
- [ ] HTTPS verification
- [ ] Country filtering
- [ ] ISP filtering
- [ ] Response-time filtering
- [ ] Database storage
- [ ] Proxy history
- [ ] API endpoint
- [ ] Dark mode
- [ ] User authentication
- [ ] Admin dashboard

## Security

If deployed publicly:

- Use a reasonable upload size limit.
- Validate uploaded files.
- Add authentication if needed.
- Add rate limiting.
- Keep PHP and server software updated.
- Only test proxies and networks you are authorized to test.

## Contributing

Contributions are welcome.

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Commit your changes.
5. Push the branch.
6. Open a Pull Request.

## License

You can use your preferred open-source license, such as MIT.

## Disclaimer

This project is provided for legitimate testing, development, networking, and educational purposes.

Only test proxy servers and networks that you are authorized to test. The author is not responsible for misuse of this software.
