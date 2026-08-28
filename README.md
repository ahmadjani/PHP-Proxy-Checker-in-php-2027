# PHP Proxy Checker

A responsive PHP-based proxy checker that lets you upload a proxy list and test HTTP/HTTPS proxies for connectivity.

It displays proxy status, returned public IP, country, city, ISP, ASN, and response time. Working proxies can be saved to a TXT file.

---

## Features

- Upload TXT or CSV proxy lists
- Accept `IP:PORT` format
- Remove duplicate proxies automatically
- Test HTTP/HTTPS proxies
- Show LIVE / UNBLOCKED status
- Show BLOCKED / FAILED status
- Show returned public IP
- Show country and city
- Show ISP
- Show ASN
- Show response time
- Live progress bar
- Search and filter results
- Save LIVE / UNBLOCKED proxies
- Mobile responsive design
- Desktop responsive design
- Simple PHP + JavaScript + CSS interface

---

## Technologies

- PHP 8+
- HTML5
- CSS3
- JavaScript
- cURL
- ipify
- ipwho.is

---

# 1. Requirements

You need:

- Windows, Linux, or macOS
- PHP 8.0 or newer
- PHP cURL extension
- Apache/Nginx or another PHP web server
- Internet connection
- Git (optional, only required if you want to upload/update through Git)

For beginners, **XAMPP** is the easiest way to run this project locally.

---

# 2. Project Structure

```text
php-proxy-checker/
├── index.php
├── api.php
├── README.md
└── assets/
    ├── app.js
    └── style.css
```

---

# 3. Install Git on Windows

Git is not required to run the website, but it is recommended for uploading and updating the project on GitHub.

## Step 1: Download Git

Go to the official Git website:

https://git-scm.com/

Download **Git for Windows**.

## Step 2: Install Git

Run the installer.

For most users, you can keep the default options and continue with:

```text
Next → Next → Next → Install
```

After installation, open **Command Prompt** and run:

```bash
git --version
```

If Git is installed correctly, you will see something similar to:

```text
git version 2.x.x
```

---

# 4. Create a GitHub Account

Go to:

https://github.com/

Create an account or log in to your existing GitHub account.

After logging in, click:

```text
+ → New repository
```

Enter a repository name, for example:

```text
php-proxy-checker
```

You can add a description such as:

```text
A responsive PHP proxy checker for testing HTTP/HTTPS proxies and displaying IP, location, ISP, ASN and response time.
```

Choose:

```text
Public
```

if you want the project to be publicly visible.

Then click:

```text
Create repository
```

---

# 5. Upload the Project to GitHub Without Git

If you do not want to install or use Git, you can upload the files directly through the GitHub website.

Open your repository and click:

```text
Add file → Upload files
```

Select these project files:

```text
index.php
api.php
README.md
assets/app.js
assets/style.css
```

Make sure the `assets` folder structure remains:

```text
assets/
├── app.js
└── style.css
```

Scroll down and click:

```text
Commit changes
```

Your project is now available on GitHub.

---

# 6. Upload the Project Using Git

If Git is installed, open **Command Prompt** or **PowerShell**.

Go to your project folder:

```bash
cd C:\path\to\php-proxy-checker
```

Initialize Git:

```bash
git init
```

Add all files:

```bash
git add .
```

Create the first commit:

```bash
git commit -m "Initial release"
```

Rename the branch to `main`:

```bash
git branch -M main
```

Add your GitHub repository:

```bash
git remote add origin https://github.com/ahmadjani/PHP-Proxy-Checker-in-php-2027.git
```

Replace:

```text
YOUR_USERNAME
```

with your actual GitHub username.

Push the project:

```bash
git push -u origin main
```

If GitHub asks you to authenticate, complete the GitHub authentication process.

---

# 7. Update the GitHub Project Later

After changing the PHP, CSS, JavaScript, or other files:

```bash
git add .
```

Then:

```bash
git commit -m "Update proxy checker"
```

Then:

```bash
git push
```

The changes will appear on GitHub.

---

# 8. Run the Website on XAMPP

## Step 1: Install XAMPP

Download XAMPP from:

https://www.apachefriends.org/

Install XAMPP on Windows.

## Step 2: Copy the Project

Copy the project folder to:

```text
C:\xampp\htdocs\php-proxy-checker
```

## Step 3: Start Apache

Open XAMPP Control Panel.

Start:

```text
Apache
```

You do not need MySQL for the current version.

## Step 4: Open the Website

Open your browser and visit:

```text
http://localhost/php-proxy-checker/
```

The Proxy Checker should now open.

---

# 9. Enable PHP cURL

The proxy checker uses cURL to connect through HTTP/HTTPS proxies.

Find your PHP configuration file:

```text
C:\xampp\php\php.ini
```

Open it with Notepad.

Find:

```ini
;extension=curl
```

Remove the semicolon:

```ini
extension=curl
```

Save the file.

Restart Apache from XAMPP.

You can verify cURL by creating a temporary PHP file:

```php
<?php
phpinfo();
?>
```

Open that file in your browser and search for:

```text
cURL
```

After checking, delete the temporary file.

---

# 10. Upload the Website to cPanel Hosting

You can also run the project on a normal PHP hosting account.

You need hosting that supports:

- PHP 8+
- cURL
- File uploads
- HTTPS recommended

## Step 1: Open cPanel

Log in to your hosting cPanel.

Open:

```text
File Manager
```

## Step 2: Open Public Folder

Usually the website folder is:

```text
public_html
```

If you want the checker to open at:

```text
https://example.com/
```

upload the project files directly into:

```text
public_html/
```

If you want:

```text
https://example.com/proxy-checker/
```

create:

```text
public_html/proxy-checker/
```

and upload the project there.

---

# 11. Upload ZIP to cPanel

The easiest method is to create a ZIP file of the project.

In cPanel:

```text
File Manager
→ Upload
→ Select php-proxy-checker.zip
```

After uploading:

```text
Right click ZIP
→ Extract
```

Make sure the final structure is correct.

For example:

```text
public_html/
├── index.php
├── api.php
├── README.md
└── assets/
    ├── app.js
    └── style.css
```

Do not accidentally create:

```text
public_html/php-proxy-checker/php-proxy-checker/index.php
```

unless that is the URL structure you want.

---

# 12. Enable cURL on cPanel

Different hosting companies provide different controls.

Look for:

```text
Select PHP Version
```

or:

```text
PHP Extensions
```

Enable:

```text
curl
```

Other common required PHP modules may already be enabled by default.

If you cannot find the cURL option, contact your hosting provider and ask them to enable PHP cURL.

---

# 13. Open the Live Website

If uploaded directly into `public_html`, open:

```text
https://yourdomain.com/
```

If uploaded into:

```text
public_html/proxy-checker/
```

open:

```text
https://yourdomain.com/proxy-checker/
```

Replace `yourdomain.com` with your actual domain.

---

# 14. Using the Proxy Checker

Open the website.

You will see the upload section.

Create a TXT file containing one proxy per line:

```text
1.2.3.4:8080
5.6.7.8:3128
9.10.11.12:80
```

You can also use:

```text
http://1.2.3.4:8080
https://5.6.7.8:3128
```

Upload the file.

Click:

```text
Start Checking
```

The application will test the proxies one by one.

---

# 15. Understanding the Results

The results table contains:

| Field | Description |
|---|---|
| Proxy | Proxy address |
| Status | LIVE / UNBLOCKED or BLOCKED / FAILED |
| IP | Public IP returned through the proxy |
| Location | Country and city |
| ISP / ASN | Network information |
| Time | Response time in milliseconds |

Example:

```text
Proxy              Status             IP
1.2.3.4:8080       LIVE / UNBLOCKED   1.2.3.4
5.6.7.8:3128       BLOCKED / FAILED   -
```

---

# 16. Save Working Proxies

After checking is complete, click:

```text
Save Live / Unblocked
```

The browser will download:

```text
live-unblocked-proxies.txt
```

The file contains only proxies that passed the connectivity test.

Example:

```text
1.2.3.4:8080
5.6.7.8:3128
```

---

# 17. Search and Filtering

Use the search box to search by:

- Proxy
- IP
- Country
- City
- ISP
- ASN

You can also select:

```text
All
```

```text
Live / Unblocked
```

or:

```text
Blocked / Failed
```

---

# 18. How the Checker Works

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
Display Results
```

A proxy is marked **LIVE / UNBLOCKED** when the test request successfully goes through the proxy and returns a valid public IP.

A failed connection, timeout, or invalid response is marked **BLOCKED / FAILED**.

---

# 19. External Services

## ipify

Used to determine the public IP returned through the proxy.

https://api.ipify.org

## ipwho.is

Used to retrieve:

- Country
- City
- ISP
- ASN

https://ipwho.is/

The server needs Internet access for these services.

---

# 20. Configuration

The main checking configuration is inside:

```text
api.php
```

Example:

```php
const MAX_FILE_SIZE = 5 * 1024 * 1024;
const CONNECT_TIMEOUT = 8;
const REQUEST_TIMEOUT = 12;
```

### MAX_FILE_SIZE

Maximum uploaded file size.

### CONNECT_TIMEOUT

Maximum time allowed to establish a connection.

### REQUEST_TIMEOUT

Maximum time allowed for the complete proxy request.

---

# 21. Important Hosting Consideration

Some shared hosting providers restrict outgoing connections or proxy-related traffic.

If every proxy shows:

```text
BLOCKED / FAILED
```

even though you know the proxies work, test the application locally first.

If it works on XAMPP but not on your hosting server, ask your hosting provider whether outgoing cURL connections are restricted.

---

# 22. Security

If you publish this application publicly:

- Use HTTPS.
- Keep PHP updated.
- Keep the server updated.
- Limit upload file size.
- Validate uploaded files.
- Consider authentication for private use.
- Consider rate limiting.
- Do not expose unnecessary server information.
- Only test proxy servers and networks you are authorized to test.

---

# 23. Limitations

This version is primarily designed for HTTP/HTTPS proxy testing.

A **LIVE / UNBLOCKED** result means the proxy successfully passed this application's connectivity test. It does not guarantee that the proxy will work with every website or service.

Some websites may block a proxy even when the proxy passes this test.

IP geolocation information may also not always be perfectly accurate.

---

# 24. Roadmap

- [ ] SOCKS4 support
- [ ] SOCKS5 support
- [ ] Proxy authentication
- [ ] Concurrent proxy checking
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

---

# 25. Troubleshooting

## cURL error

Make sure PHP cURL is enabled.

On XAMPP:

```text
C:\xampp\php\php.ini
```

Enable:

```ini
extension=curl
```

Then restart Apache.

## Upload does not work

Check:

- PHP upload settings
- File size
- File format
- Folder permissions
- PHP error logs

## All proxies are failing

Check:

- Server Internet connection
- PHP cURL
- Outgoing connections allowed by hosting
- Proxy format
- Proxy availability

## Location shows Unknown

The proxy may not return a usable public IP, or the geolocation service may be unavailable.

---

# 26. Contributing

Contributions are welcome.

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Test the changes.
5. Commit your changes.
6. Push the branch.
7. Open a Pull Request.

---

# 27. License

You can add your preferred open-source license.

For example:

```text
MIT License
```

---

# 28. Disclaimer

This project is provided for legitimate testing, development, networking, and educational purposes.

Only test proxy servers and networks that you are authorized to test.

The author is not responsible for misuse of this software.

---

## ⭐ Support

If you find this project useful, consider giving the GitHub repository a star.
