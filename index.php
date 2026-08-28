<?php
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Proxy Checker</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="wrap">
  <header>
    <div>
      <h1>Proxy Checker</h1>
      <p>Upload HTTP/HTTPS proxy lists and test them.</p>
    </div>
  </header>

  <section class="card">
    <form id="uploadForm">
      <label class="drop">
        <input type="file" id="proxyFile" name="proxy_file" accept=".txt,.csv" required>
        <strong>Choose proxy list</strong>
        <span>TXT/CSV • one proxy per line</span>
      </label>
      <button class="primary" type="submit">Start Checking</button>
    </form>
    <div class="progressBox hidden" id="progressBox">
      <div class="progress"><i id="progressBar"></i></div>
      <div class="progressText" id="progressText">0%</div>
    </div>
  </section>

  <section class="stats">
    <div><b id="total">0</b><span>Total</span></div>
    <div><b id="live">0</b><span>Live</span></div>
    <div><b id="blocked">0</b><span>Blocked</span></div>
    <div><b id="checked">0</b><span>Checked</span></div>
  </section>

  <section class="card">
    <div class="toolbar">
      <input id="search" placeholder="Search IP, location, proxy...">
      <select id="filter">
        <option value="all">All</option>
        <option value="live">Live / Unblocked</option>
        <option value="blocked">Blocked / Failed</option>
      </select>
      <button id="saveBtn" class="success" disabled>Save Live / Unblocked</button>
    </div>
    <div class="tableWrap">
      <table>
        <thead><tr>
          <th>Proxy</th><th>Status</th><th>IP</th><th>Location</th><th>ISP / ASN</th><th>Time</th>
        </tr></thead>
        <tbody id="results"><tr><td colspan="6" class="empty">No results yet.</td></tr></tbody>
      </table>
    </div>
  </section>
</div>
<script src="assets/app.js"></script>
</body>
</html>